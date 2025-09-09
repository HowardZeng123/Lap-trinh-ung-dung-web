<?php 
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="site-main-container">
    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-nav-area">
                        <h1 class="text-white"><?= isset($category['name']) ? $category['name'] : 'Category' ?> News</h1>
                    </div>
                </div>
                <?php if(isset($breakingNews) && !empty($breakingNews)) { ?>
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>Breaking News:</span> <a href="<?= url('show-post/' . $breakingNews['id']) ?>"><?= $breakingNews['title'] ?></a></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->

    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">Latest Posts in <?= isset($category['name']) ? $category['name'] : 'Category' ?></h4>

                        <?php if(isset($categoryPosts) && !empty($categoryPosts)) { ?>
                            <?php foreach ($categoryPosts as $categoryPost) { ?>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($categoryPost['image']) ?>" alt="<?= $categoryPost['title'] ?>">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= url('show-category/' . $categoryPost['cat_id']) ?>"><?= $categoryPost['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="<?= url('show-post/' . $categoryPost['id']) ?>">
                                        <h4><?= $categoryPost['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $categoryPost['username'] ?></a></li>
                                        <li><a href="#"><?= $categoryPost['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"> <?= $categoryPost['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?= isset($categoryPost['summary']) ? substr($categoryPost['summary'], 0, 120) . '...' : substr(strip_tags($categoryPost['body']), 0, 120) . '...' ?>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="no-posts-found text-center py-80">
                                <div class="alert alert-info">
                                    <i class="lnr lnr-layers" style="font-size: 48px; color: #2196F3;"></i>
                                    <h4 class="mt-20">Chưa có bài viết nào trong danh mục này</h4>
                                    <p class="mb-30">Hãy quay lại sau để xem thêm tin tức mới!</p>
                                    <a href="<?= url('/') ?>" class="primary-btn">Về trang chủ</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start banner-ads Area -->
                    <?php if(isset($bodyBanner) && !empty($bodyBanner))  { ?>
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <a href="<?= $bodyBanner['url'] ?>"><img class="img-fluid" src="<?= asset($bodyBanner['image']) ?>" alt="Advertisement"></a>
                    </div>
                    <?php } ?>
                    <!-- End banner-ads Area -->

                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">Popular Posts</h4>
                        
                        <?php if (isset($popularPosts[0]) && !empty($popularPosts[0])) { ?>
                        <div class="feature-post relative">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?= asset($popularPosts[0]['image']) ?>" alt="<?= $popularPosts[0]['title'] ?>">
                            </div>
                            <div class="details">
                                <ul class="tags">
                                    <li><a href="<?= url('show-category/' . $popularPosts[0]['cat_id']) ?>"><?= $popularPosts[0]['category'] ?></a></li>
                                </ul>
                                <a href="<?= url('show-post/' . $popularPosts[0]['id']) ?>">
                                    <h3><?= $popularPosts[0]['title'] ?></h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[0]['username'] ?></a></li>
                                    <li><a href="#"><?= $popularPosts[0]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"><?= $popularPosts[0]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="row mt-20 medium-gutters">
                            <?php if (isset($popularPosts[1]) && !empty($popularPosts[1])) { ?>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($popularPosts[1]['image']) ?>" alt="<?= $popularPosts[1]['title'] ?>">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= url('show-category/' . $popularPosts[1]['cat_id']) ?>"><?= $popularPosts[1]['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="<?= url('show-post/' . $popularPosts[1]['id']) ?>">
                                        <h4><?= $popularPosts[1]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[1]['username'] ?></a></li>
                                        <li><a href="#"><?= $popularPosts[1]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"> <?= $popularPosts[1]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?= isset($popularPosts[1]['summary']) ? substr($popularPosts[1]['summary'], 0, 80) . '...' : substr(strip_tags($popularPosts[1]['body']), 0, 80) . '...' ?>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php if (isset($popularPosts[2]) && !empty($popularPosts[2])) { ?>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="<?= asset($popularPosts[2]['image']) ?>" alt="<?= $popularPosts[2]['title'] ?>">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?= url('show-category/' . $popularPosts[2]['cat_id']) ?>"><?= $popularPosts[2]['category'] ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="<?= url('show-post/' . $popularPosts[2]['id']) ?>">
                                        <h4><?= $popularPosts[2]['title'] ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?= $popularPosts[2]['username'] ?></a></li>
                                        <li><a href="#"><?= $popularPosts[2]['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"><?= $popularPosts[2]['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?= isset($popularPosts[2]['summary']) ? substr($popularPosts[2]['summary'], 0, 80) . '...' : substr(strip_tags($popularPosts[2]['body']), 0, 80) . '...' ?>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>

                            <?php if((!isset($popularPosts[1]) || empty($popularPosts[1])) && (!isset($popularPosts[2]) || empty($popularPosts[2]))) { ?>
                            <div class="col-12 text-center">
                                <p class="text-muted">Chưa có đủ bài viết phổ biến để hiển thị.</p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- End popular-post Area -->
                </div>

                <!-- Start sidebar Area -->
                <?php require_once(BASE_PATH . '/template/app/layouts/sidebar.php'); ?>
                <!-- End sidebar Area -->
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>

<!-- start footer Area -->
<?php require_once(BASE_PATH . '/template/app/layouts/footer.php'); ?>
