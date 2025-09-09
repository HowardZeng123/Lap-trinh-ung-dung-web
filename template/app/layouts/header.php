<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?=asset($setting['icon'])?>">
    <!-- Meta Description -->
    <meta name="description" content="<?=$setting['description']?>">
    <!-- Meta Keyword -->
    <meta name="keywords" content="<?=$setting['keywords']?>">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title><?=$setting['title']?></title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="<?=asset('public/app/css/linearicons.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/magnific-popup.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/nice-select.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/animate.min.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/owl.carousel.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/main.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/custom-improvements.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/font-fix.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/icon-fix.css')?>">
    <link rel="stylesheet" href="<?=asset('public/app/css/fix-progress-bar.css')?>">
    
    <!-- Font Loading Optimization -->
    <style>
        /* Critical font loading */
        html { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; 
            overflow-x: hidden !important;
            max-width: 100vw !important;
        }
        
        body {
            overflow-x: hidden !important;
            max-width: 100vw !important;
        }
        
        .font-loaded html { font-family: 'Inter', 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
        
        /* Force no horizontal scroll */
        * {
            box-sizing: border-box;
        }
        
        .container, .container-fluid {
            overflow-x: hidden !important;
            max-width: 100% !important;
        }
        
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            max-width: 100% !important;
        }
    </style>
    
    <!-- Font Loading Script -->
    <script>
        // Add font-loaded class when fonts are ready
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(function() {
                document.documentElement.classList.add('font-loaded');
            });
        } else {
            // Fallback for browsers that don't support Font Loading API
            setTimeout(function() {
                document.documentElement.classList.add('font-loaded');
            }, 100);
        }
    </script>
</head>

<body>
    <header>
        <!-- Top Navigation Bar -->
        <div class="header-top" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 12px 0;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left side - Main Navigation -->
                    <div class="col-md-6">
                        <nav class="main-nav">
                            <ul class="nav justify-content-start">
                                <?php if(isset($menus) && !empty($menus)) { ?>
                                    <?php foreach ($menus as $menu) { ?>
                                    <li class="nav-item me-1">
                                        <a href="<?=$menu['url']?>" class="nav-link text-white px-3 py-2 rounded hover-bg-light">
                                            <?=$menu['name']?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                <?php } else { ?>
                                    <li class="nav-item me-1">
                                        <a href="<?= url('/') ?>" class="nav-link text-white px-3 py-2 rounded hover-bg-light">
                                            Trang chủ
                                        </a>
                                    </li>
                                    <li class="nav-item me-1">
                                        <a href="<?= url('admin') ?>" class="nav-link text-white px-3 py-2 rounded hover-bg-light">
                                            Quản trị
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    
                    <!-- Center - Brand Logo -->
                    <div class="col-md-3 text-center">
                        <div class="header-brand">
                            <span class="text-white fw-bold fs-5">ONLINE NEWS</span>
                        </div>
                    </div>
                    
                    <!-- Right side - Auth Links & Search -->
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-end">
                            <div class="auth-links me-3">
                                <a href="<?= url('login') ?>" class="text-white text-decoration-none me-3 hover-text-light">
                                    <i class="lnr lnr-enter-down me-1"></i>Login
                                </a>
                                <a href="<?= url('register') ?>" class="text-white text-decoration-none hover-text-light">
                                    <i class="lnr lnr-user me-1"></i>Register
                                </a>
                            </div>
                            <div class="search-toggle">
                                <button class="btn btn-outline-light btn-sm" type="button" id="searchToggle">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Search Bar (Hidden by default) -->
                <div class="row mt-3" id="searchBar" style="display: none;">
                    <div class="col-12">
                        <form class="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm tin tức..." name="search">
                                <button class="btn btn-light" type="submit">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo and Banner Section -->
        <div class="logo-banner-section py-3" style="background: #f8f9fa;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <a href="<?= url('/') ?>">
                            <?php if(isset($setting['logo']) && !empty($setting['logo'])) { ?>
                                <img class="img-fluid" src="<?=asset($setting['logo'])?>" alt="Logo" style="max-height: 60px;">
                            <?php } else { ?>
                                <h3 class="text-primary">Online News</h3>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <?php if(!empty($bodyBanner)) { ?>
                        <div class="banner-ad text-end">
                            <img class="img-fluid rounded" src="<?=asset($bodyBanner['image'])?>" alt="Advertisement" style="max-height: 60px;">
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
