<?php 
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="site-main-container">
    <!-- Start Hero/Featured Posts Area -->
    <section class="hero-area py-5">
        <div class="container">
            <!-- Featured Posts Grid -->
            <div class="row g-4">
                <!-- Main Featured Post -->
                <div class="col-lg-8">
                    <?php if(isset($topSelectedPosts[0])) { ?>
                    <div class="card border-0 shadow-sm h-100">
                        <div class="position-relative overflow-hidden rounded-top">
                            <img class="card-img-top" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="<?= $topSelectedPosts[0]['title'] ?>" style="height: 400px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary fs-6">
                                    <a href="<?= url('show-category/' . $topSelectedPosts[0]['cat_id']) ?>" class="text-white text-decoration-none"><?= $topSelectedPosts[0]['category'] ?></a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h2 class="card-title h3 mb-3">
                                <a href="<?= url('show-post/' . $topSelectedPosts[0]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[0]['title'] ?></a>
                            </h2>
                            <div class="d-flex align-items-center text-muted small mb-2">
                                <span class="me-3"><i class="lnr lnr-user me-1"></i><?= $topSelectedPosts[0]['username'] ?></span>
                                <span class="me-3"><i class="lnr lnr-calendar-full me-1"></i><?= $topSelectedPosts[0]['created_at'] ?></span>
                                <span><i class="lnr lnr-bubble me-1"></i><?= $topSelectedPosts[0]['comments_count'] ?> bình luận</span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <!-- Side Featured Posts -->
                <div class="col-lg-4">
                    <div class="row g-3 h-100">
                        <?php if(isset($topSelectedPosts[1])) { ?>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-5">
                                        <img src="<?= asset($topSelectedPosts[1]['image']) ?>" class="img-fluid rounded-start h-100" alt="<?= $topSelectedPosts[1]['title'] ?>" style="object-fit: cover;">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body p-3">
                                            <span class="badge bg-secondary small mb-2">
                                                <a href="<?= url('show-category/' . $topSelectedPosts[1]['cat_id']) ?>" class="text-white text-decoration-none"><?= $topSelectedPosts[1]['category'] ?></a>
                                            </span>
                                            <h5 class="card-title small mb-2">
                                                <a href="<?= url('show-post/' . $topSelectedPosts[1]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[1]['title'] ?></a>
                                            </h5>
                                            <p class="card-text small text-muted mb-1">
                                                <i class="lnr lnr-user me-1"></i><?= $topSelectedPosts[1]['username'] ?>
                                            </p>
                                            <p class="card-text small text-muted">
                                                <i class="lnr lnr-calendar-full me-1"></i><?= $topSelectedPosts[1]['created_at'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <?php if(isset($topSelectedPosts[2])) { ?>
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-5">
                                        <img src="<?= asset($topSelectedPosts[2]['image']) ?>" class="img-fluid rounded-start h-100" alt="<?= $topSelectedPosts[2]['title'] ?>" style="object-fit: cover;">
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body p-3">
                                            <span class="badge bg-secondary small mb-2">
                                                <a href="<?= url('show-category/' . $topSelectedPosts[2]['cat_id']) ?>" class="text-white text-decoration-none"><?= $topSelectedPosts[2]['category'] ?></a>
                                            </span>
                                            <h5 class="card-title small mb-2">
                                                <a href="<?= url('show-post/' . $topSelectedPosts[2]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[2]['title'] ?></a>
                                            </h5>
                                            <p class="card-text small text-muted mb-1">
                                                <i class="lnr lnr-user me-1"></i><?= $topSelectedPosts[2]['username'] ?>
                                            </p>
                                            <p class="card-text small text-muted">
                                                <i class="lnr lnr-calendar-full me-1"></i><?= $topSelectedPosts[2]['created_at'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- Breaking News Alert -->
            <?php if(!empty($breakingNews)) { ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="alert alert-danger border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center">
                            <span class="badge bg-danger me-3 px-3 py-2">Tin nóng</span>
                            <h6 class="mb-0">
                                <a href="<?= url('show-post/' . $breakingNews['id']) ?>" class="text-dark text-decoration-none fw-bold"><?= $breakingNews['title'] ?></a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Content Area -->
    <section class="content-area py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Latest News Section -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="section-title mb-0 border-bottom border-primary border-3 pb-2">Tin tức mới nhất</h3>
                        </div>
                        
                        <div class="row g-4">
                            <?php foreach ($lastPosts as $index => $lastPost) { ?>
                            <div class="col-12">
                                <div class="card border-0 shadow-sm hover-shadow-lg transition-all">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <div class="position-relative">
                                                <img src="<?= asset($lastPost['image']) ?>" class="img-fluid rounded-start h-100" alt="<?= $lastPost['title'] ?>" style="object-fit: cover; height: 200px;">
                                                <div class="position-absolute top-0 start-0 m-2">
                                                    <span class="badge bg-primary">
                                                        <a href="<?= url('show-category/' . $lastPost['cat_id']) ?>" class="text-white text-decoration-none"><?= $lastPost['category'] ?></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <h4 class="card-title mb-3">
                                                    <a href="<?= url('show-post/' . $lastPost['id']) ?>" class="text-dark text-decoration-none"><?= $lastPost['title'] ?></a>
                                                </h4>
                                                <p class="card-text text-muted mb-3"><?= $lastPost['summary'] ?></p>
                                                <div class="d-flex align-items-center text-muted small">
                                                    <span class="me-3"><i class="lnr lnr-user me-1"></i><?= $lastPost['username'] ?></span>
                                                    <span class="me-3"><i class="lnr lnr-calendar-full me-1"></i><?= $lastPost['created_at'] ?></span>
                                                    <span><i class="lnr lnr-bubble me-1"></i><?= $lastPost['comments_count'] ?> bình luận</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- Banner Advertisement -->
                    <?php if(!empty($bodyBanner)) { ?>
                    <div class="mb-5">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-0">
                                <a href="<?= $bodyBanner['url'] ?>" class="d-block">
                                    <img class="img-fluid w-100 rounded" src="<?= asset($bodyBanner['image']) ?>" alt="Advertisement" style="height: 200px; object-fit: cover;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- Popular Posts Section -->
                    <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h3 class="section-title mb-0 border-bottom border-success border-3 pb-2">Tin phổ biến</h3>
                        </div>
                        
                        <?php if(isset($popularPosts[0])) { ?>
                        <!-- Featured Popular Post -->
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="position-relative">
                                <img class="card-img-top" src="<?= asset($popularPosts[0]['image']) ?>" alt="<?= $popularPosts[0]['title'] ?>" style="height: 300px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-success fs-6">
                                        <a href="<?= url('show-category/' . $popularPosts[0]['cat_id']) ?>" class="text-white text-decoration-none"><?= $popularPosts[0]['category'] ?></a>
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h3 class="card-title mb-3">
                                    <a href="<?= url('show-post/' . $popularPosts[0]['id']) ?>" class="text-dark text-decoration-none"><?= $popularPosts[0]['title'] ?></a>
                                </h3>
                                <div class="d-flex align-items-center text-muted small">
                                    <span class="me-3"><i class="lnr lnr-user me-1"></i><?= $popularPosts[0]['username'] ?></span>
                                    <span class="me-3"><i class="lnr lnr-calendar-full me-1"></i><?= $popularPosts[0]['created_at'] ?></span>
                                    <span><i class="lnr lnr-bubble me-1"></i><?= $popularPosts[0]['comments_count'] ?> bình luận</span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <!-- Other Popular Posts Grid -->
                        <div class="row g-4">
                            <?php if(isset($popularPosts[1])) { ?>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="position-relative">
                                        <img class="card-img-top" src="<?= asset($popularPosts[1]['image']) ?>" alt="<?= $popularPosts[1]['title'] ?>" style="height: 200px; object-fit: cover;">
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge bg-success">
                                                <a href="<?= url('show-category/' . $popularPosts[1]['cat_id']) ?>" class="text-white text-decoration-none"><?= $popularPosts[1]['category'] ?></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">
                                            <a href="<?= url('show-post/' . $popularPosts[1]['id']) ?>" class="text-dark text-decoration-none"><?= $popularPosts[1]['title'] ?></a>
                                        </h5>
                                        <p class="card-text text-muted small mb-2"><?= $popularPosts[1]['summary'] ?></p>
                                        <div class="d-flex align-items-center text-muted small">
                                            <span class="me-2"><i class="lnr lnr-user me-1"></i><?= $popularPosts[1]['username'] ?></span>
                                            <span class="me-2"><i class="lnr lnr-calendar-full me-1"></i><?= $popularPosts[1]['created_at'] ?></span>
                                            <span><i class="lnr lnr-bubble me-1"></i><?= $popularPosts[1]['comments_count'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                            <?php if(isset($popularPosts[2])) { ?>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <div class="position-relative">
                                        <img class="card-img-top" src="<?= asset($popularPosts[2]['image']) ?>" alt="<?= $popularPosts[2]['title'] ?>" style="height: 200px; object-fit: cover;">
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge bg-success">
                                                <a href="<?= url('show-category/' . $popularPosts[2]['cat_id']) ?>" class="text-white text-decoration-none"><?= $popularPosts[2]['category'] ?></a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-2">
                                            <a href="<?= url('show-post/' . $popularPosts[2]['id']) ?>" class="text-dark text-decoration-none"><?= $popularPosts[2]['title'] ?></a>
                                        </h5>
                                        <p class="card-text text-muted small mb-2"><?= $popularPosts[2]['summary'] ?></p>
                                        <div class="d-flex align-items-center text-muted small">
                                            <span class="me-2"><i class="lnr lnr-user me-1"></i><?= $popularPosts[2]['username'] ?></span>
                                            <span class="me-2"><i class="lnr lnr-calendar-full me-1"></i><?= $popularPosts[2]['created_at'] ?></span>
                                            <span><i class="lnr lnr-bubble me-1"></i><?= $popularPosts[2]['comments_count'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <?php require_once(BASE_PATH . '/template/app/layouts/sidebar.php'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content Area -->
</div>

<!-- start footer Area -->
<?php 
require_once(BASE_PATH . '/template/app/layouts/footer.php');
?>