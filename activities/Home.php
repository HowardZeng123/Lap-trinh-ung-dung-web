<?php

namespace App;

use Database\DataBase;

class Home{

        public function index()
        {
                $db = new DataBase();

                $setting = $db->select('SELECT * FROM websetting')->fetch();

                $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();

                $topSelectedPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE posts.selected = 2 ORDER BY created_at DESC LIMIT 0, 3')->fetchAll();

                $breakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 2 ORDER BY created_at DESC LIMIT 0,1')->fetch();

                $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY created_at DESC LIMIT 0, 6')->fetchAll();
                
                $bodyBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
                $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();

                $popularPosts =$db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY view DESC LIMIT 0, 3')->fetchAll();

                $mostCommentsPosts =$db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();


                require_once (BASE_PATH . '/template/app/index-simple.php');
        }


        public function show($id)
        {
                $db = new DataBase();

                $post = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE id = ?', [$id])->fetch();

                // Check if post exists
                if(!$post) {
                    // Set empty data for template
                    $post = null;
                    $comments = [];
                } else {
                    $comments = $db->select("SELECT *, (SELECT username FROM users WHERE users.id = comments.user_id) AS username FROM comments WHERE post_id = ? AND status = 'approved'", [$id])->fetchAll();
                    
                    // Update view count
                    $db->update('posts', $id, ['view'], [$post['view'] + 1]);
                }

                // Get other required data with error handling
                try {
                    $setting = $db->select('SELECT * FROM websetting')->fetch();
                    if(!$setting) {
                        $setting = [
                            'title' => 'Online News Site',
                            'description' => 'News Website',
                            'keywords' => 'news',
                            'icon' => 'public/setting/logo.png',
                            'logo' => 'public/setting/logo.png'
                        ];
                    }
                } catch(Exception $e) {
                    $setting = [
                        'title' => 'Online News Site',
                        'description' => 'News Website',
                        'keywords' => 'news',
                        'icon' => 'public/setting/logo.png',
                        'logo' => 'public/setting/logo.png'
                    ];
                }

                try {
                    $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();
                    if(!$menus) $menus = [];
                } catch(Exception $e) {
                    $menus = [];
                }

                try {
                    $sidebarBanner = $db->select('SELECT * FROM banners ORDER BY created_at DESC LIMIT 0,1')->fetch();
                } catch(Exception $e) {
                    $sidebarBanner = null;
                }

                try {
                    $popularPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY view DESC LIMIT 0, 3')->fetchAll();
                    if(!$popularPosts) $popularPosts = [];
                } catch(Exception $e) {
                    $popularPosts = [];
                }

                try {
                    $mostCommentsPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username, (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts ORDER BY comments_count DESC LIMIT 0, 4')->fetchAll();
                    if(!$mostCommentsPosts) $mostCommentsPosts = [];
                } catch(Exception $e) {
                    $mostCommentsPosts = [];
                }

                // Set required variables for sidebar
                $topSelectedPosts = [];
                
                require_once (BASE_PATH . '/template/app/show-post.php');

        }


        public function commentStore($request){
               
                if(isset($_SESSION['user']))
                {
                        if($_SESSION['user'] != null)
                        {
                                $db = new DataBase();
                                $db->insert('comments', ['user_id', 'post_id', 'comment'], [$_SESSION['user'], $request['post_id'], $request['comment']]);
                                $this->redirectBack();
                        }
                        else{
                                $this->redirectBack();
                        }
                }
                else{
                        $this->redirectBack();
                }

        }



        public function category($id)
        {
            $db = new DataBase();
            
            // Get category with error handling
            try {
                $category = $db->select("SELECT * FROM `categories` WHERE `id` = ? ORDER BY `id` DESC ;", [$id])->fetch();
                if(!$category) {
                    $category = ['id' => $id, 'name' => 'Unknown Category'];
                }
            } catch(Exception $e) {
                $category = ['id' => $id, 'name' => 'Unknown Category'];
            }

            // Get other data with error handling
            try {
                $topSelectedPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts where posts.selected = 2 ORDER BY `created_at` DESC LIMIT 0,1 ;")->fetchAll();
                if(!$topSelectedPosts) $topSelectedPosts = [];
            } catch(Exception $e) {
                $topSelectedPosts = [];
            }
            
            try {
                $categoryPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts WHERE cat_id = ?  ORDER BY `created_at` DESC LIMIT 0,6 ;", [$id])->fetchAll();
                if(!$categoryPosts) $categoryPosts = [];
            } catch(Exception $e) {
                $categoryPosts = [];
            }
    
            try {
                $popularPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY `view` DESC LIMIT 0,3 ;")->fetchAll();
                if(!$popularPosts) $popularPosts = [];
            } catch(Exception $e) {
                $popularPosts = [];
            }
    
            try {
                $breakingNews = $db->select("SELECT * FROM posts WHERE breaking_news = 2 ORDER BY `created_at` DESC LIMIT 0,1 ;")->fetch();
            } catch(Exception $e) {
                $breakingNews = null;
            }
    
            try {
                $mostCommentsPosts = $db->select("SELECT posts.*, (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comments_count, (SELECT username FROM users WHERE users.id = posts.user_id) AS username  , (SELECT name FROM categories WHERE categories.id = posts.cat_id) AS category FROM posts  ORDER BY `comments_count` DESC LIMIT 0,4 ;")->fetchAll();
                if(!$mostCommentsPosts) $mostCommentsPosts = [];
            } catch(Exception $e) {
                $mostCommentsPosts = [];
            }
            
            try {
                $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ;')->fetchAll();
                if(!$menus) $menus = [];
            } catch(Exception $e) {
                $menus = [];
            }

            try {
                $setting = $db->select("SELECT * FROM `websetting`;")->fetch();
                if(!$setting) {
                    $setting = [
                        'title' => 'Online News Site',
                        'description' => 'News Website',
                        'keywords' => 'news',
                        'icon' => 'public/setting/logo.png',
                        'logo' => 'public/setting/logo.png'
                    ];
                }
            } catch(Exception $e) {
                $setting = [
                    'title' => 'Online News Site',
                    'description' => 'News Website',
                    'keywords' => 'news',
                    'icon' => 'public/setting/logo.png',
                    'logo' => 'public/setting/logo.png'
                ];
            }
    
            try {
                $sidebarBanner = $db->select("SELECT * FROM `banners` LIMIT 0,1;")->fetch();
            } catch(Exception $e) {
                $sidebarBanner = null;
            }
            
            try {
                $bodyBanner = $db->select("SELECT * FROM `banners` ORDER BY created_at DESC LIMIT 0,1;")->fetch();
            } catch(Exception $e) {
                $bodyBanner = null;
            }
    
            require_once (BASE_PATH . "/template/app/show-category.php");
        }


        protected function redirectBack(){
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit;
        }

}