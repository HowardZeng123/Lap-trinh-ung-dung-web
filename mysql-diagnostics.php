<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🔧 MySQL Connection Diagnostics</h1>";

// Database configuration from index.php
define('DB_HOST', 'localhost');
define('DB_NAME', 'news-project');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

echo "<div style='background: #e3f2fd; padding: 15px; border-left: 4px solid #2196F3; margin: 20px 0;'>";
echo "<h3>📋 Database Configuration:</h3>";
echo "<ul>";
echo "<li><strong>Host:</strong> " . DB_HOST . "</li>";
echo "<li><strong>Database:</strong> " . DB_NAME . "</li>";
echo "<li><strong>Username:</strong> " . DB_USERNAME . "</li>";
echo "<li><strong>Password:</strong> " . (empty(DB_PASSWORD) ? '(empty)' : '***') . "</li>";
echo "</ul>";
echo "</div>";

// Test 1: Check if MySQL port is open
echo "<h2>🔌 Step 1: Port Connection Test</h2>";
$connection = @fsockopen('localhost', 3306, $errno, $errstr, 5);
if ($connection) {
    echo "<div class='success'>✅ Port 3306 is open and accessible</div>";
    fclose($connection);
} else {
    echo "<div class='error'>❌ Cannot connect to port 3306</div>";
    echo "<p><strong>Error:</strong> $errstr ($errno)</p>";
    echo "<div class='warning'>";
    echo "<h4>💡 Solutions:</h4>";
    echo "<ol>";
    echo "<li>Start XAMPP Control Panel</li>";
    echo "<li>Click 'Start' button next to MySQL</li>";
    echo "<li>Make sure Apache is also running</li>";
    echo "<li>Check if any other software is using port 3306</li>";
    echo "</ol>";
    echo "</div>";
}

// Test 2: PDO Connection Test
echo "<h2>🗄️ Step 2: PDO Connection Test</h2>";
try {
    $dsn = "mysql:host=" . DB_HOST . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='success'>✅ PDO connection successful</div>";
    
    // Test 3: Database existence
    echo "<h2>🏗️ Step 3: Database Check</h2>";
    try {
        $pdo->exec("USE " . DB_NAME);
        echo "<div class='success'>✅ Database '" . DB_NAME . "' exists and accessible</div>";
        
        // Test 4: Table structure check
        echo "<h2>📊 Step 4: Table Structure Check</h2>";
        $tables = ['websetting', 'menus', 'posts', 'categories', 'users', 'comments', 'banners'];
        $existingTables = [];
        
        foreach($tables as $table) {
            try {
                $stmt = $pdo->query("SHOW TABLES LIKE '$table'");
                if($stmt->rowCount() > 0) {
                    echo "<div class='success'>✅ Table '$table' exists</div>";
                    $existingTables[] = $table;
                } else {
                    echo "<div class='warning'>⚠️ Table '$table' missing</div>";
                }
            } catch(Exception $e) {
                echo "<div class='error'>❌ Error checking table '$table': " . $e->getMessage() . "</div>";
            }
        }
        
        // Test 5: Sample data check
        if(count($existingTables) > 0) {
            echo "<h2>📈 Step 5: Sample Data Check</h2>";
            foreach($existingTables as $table) {
                try {
                    $stmt = $pdo->query("SELECT COUNT(*) as count FROM $table");
                    $result = $stmt->fetch();
                    $count = $result['count'];
                    if($count > 0) {
                        echo "<div class='success'>✅ Table '$table' has $count records</div>";
                    } else {
                        echo "<div class='warning'>⚠️ Table '$table' is empty</div>";
                    }
                } catch(Exception $e) {
                    echo "<div class='error'>❌ Error counting records in '$table': " . $e->getMessage() . "</div>";
                }
            }
        }
        
    } catch(PDOException $e) {
        echo "<div class='error'>❌ Database '" . DB_NAME . "' does not exist</div>";
        echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
        
        echo "<div class='info'>";
        echo "<h4>🔨 Create Database:</h4>";
        echo "<p>You can create the database by running:</p>";
        echo "<code>CREATE DATABASE `news-project` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;</code>";
        echo "</div>";
    }
    
} catch (PDOException $e) {
    echo "<div class='error'>❌ PDO connection failed</div>";
    echo "<p><strong>Error:</strong> " . $e->getMessage() . "</p>";
    
    echo "<div class='warning'>";
    echo "<h4>🔧 Troubleshooting Steps:</h4>";
    echo "<ol>";
    echo "<li><strong>Start XAMPP:</strong> Open XAMPP Control Panel and start MySQL service</li>";
    echo "<li><strong>Check Port:</strong> Make sure MySQL is running on port 3306</li>";
    echo "<li><strong>Check Username/Password:</strong> Default is root with no password</li>";
    echo "<li><strong>Restart Services:</strong> Stop and start MySQL service</li>";
    echo "</ol>";
    echo "</div>";
}

// Test 6: Quick Fix Suggestions
echo "<h2>⚡ Step 6: Quick Fix Options</h2>";
echo "<div class='info'>";
echo "<h4>Option 1: XAMPP Control Panel</h4>";
echo "<ol>";
echo "<li>Open XAMPP Control Panel</li>";
echo "<li>Click 'Start' next to MySQL (should turn green)</li>";
echo "<li>Click 'Start' next to Apache if not running</li>";
echo "<li>Refresh this page</li>";
echo "</ol>";

echo "<h4>Option 2: Alternative Ports</h4>";
echo "<p>If port 3306 is busy, try changing MySQL port in XAMPP config to 3307 or 3308</p>";

echo "<h4>Option 3: Reset XAMPP</h4>";
echo "<ol>";
echo "<li>Stop all XAMPP services</li>";
echo "<li>Restart XAMPP as Administrator</li>";
echo "<li>Start MySQL and Apache</li>";
echo "</ol>";
echo "</div>";

// Current system info
echo "<h2>💻 System Information</h2>";
echo "<div style='background: #f5f5f5; padding: 10px; border-radius: 4px;'>";
echo "<strong>PHP Version:</strong> " . phpversion() . "<br>";
echo "<strong>OS:</strong> " . php_uname() . "<br>";
echo "<strong>Server Software:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "<strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "</div>";

?>

<style>
body { 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    margin: 20px; 
    line-height: 1.6; 
}
h1 { color: #333; border-bottom: 3px solid #2196F3; padding-bottom: 10px; }
h2 { color: #555; margin-top: 30px; }
h3 { color: #666; }

.success { 
    background: #d4edda; 
    color: #155724; 
    padding: 8px 12px; 
    border-left: 4px solid #28a745; 
    margin: 5px 0; 
    border-radius: 4px;
}

.error { 
    background: #f8d7da; 
    color: #721c24; 
    padding: 8px 12px; 
    border-left: 4px solid #dc3545; 
    margin: 5px 0; 
    border-radius: 4px;
}

.warning { 
    background: #fff3cd; 
    color: #856404; 
    padding: 8px 12px; 
    border-left: 4px solid #ffc107; 
    margin: 5px 0; 
    border-radius: 4px;
}

.info { 
    background: #d1ecf1; 
    color: #0c5460; 
    padding: 8px 12px; 
    border-left: 4px solid #17a2b8; 
    margin: 5px 0; 
    border-radius: 4px;
}

code { 
    background: #f8f9fa; 
    padding: 2px 6px; 
    border-radius: 3px; 
    font-family: 'Courier New', monospace; 
    border: 1px solid #e9ecef;
}

ol, ul { margin: 10px 0; padding-left: 20px; }
li { margin: 5px 0; }
</style>
