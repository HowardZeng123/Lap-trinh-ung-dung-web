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
                        <h1 class="text-white">News Details</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->

    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <?php if(isset($post) && !empty($post)) { ?>
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="<?= url('show-category/' . $post['cat_id']) ?>"><?= $post['category'] ?></a></li>
                            </ul>
                            <a href="#">
                                <h3><?= $post['title'] ?></h3>
                            </a>
                            <ul class="meta pb-20">
                                <li><a href="#"><span class="lnr lnr-user"></span><?= $post['username'] ?></a></li>
                                <li><a href="#"><?= $post['created_at'] ?><span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"><?= $post['comments_count'] ?><span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                            <div class="single-post-content">
                                <?= $post['body'] ?>
                            </div>

                            <!-- Comment Section -->
                            <div class="comment-sec-area pt-80">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h6>Comments (<?= isset($comments) ? count($comments) : 0 ?>)</h6>
                                        <?php if(isset($comments) && !empty($comments)) { ?>
                                            <?php foreach ($comments as $comment) { ?>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="<?= asset('public/app/img/avatar.png') ?>" alt="<?= $comment['username'] ?>" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#"><?= $comment['username'] ?></a></h5>
                                                            <p class="date"><?= $comment['created_at'] ?></p>
                                                            <p class="comment">
                                                                <?= $comment['comment'] ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="no-comments">
                                                <p class="text-muted">Chưa có bình luận nào. Hãy là người đầu tiên bình luận!</p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Form -->
                            <?php if(isset($_SESSION['user']) && $_SESSION['user']) { ?>
                            <div class="comment-form pt-30">
                                <h4>Leave a Comment</h4>
                                <form class="form-contact comment_form" action="<?= url('comment-store') ?>" method="post">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="hidden" name="post_id" value="<?= isset($post['id']) ? $post['id'] : '' ?>">
                                                <textarea class="form-control w-100" name="comment" cols="30" rows="9" placeholder="Viết bình luận của bạn..." required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="primary-btn">Gửi bình luận</button>
                                    </div>
                                </form>
                            </div>
                            <?php } else { ?>
                            <div class="comment-form pt-30">
                                <div class="alert alert-info">
                                    <p class="mb-0">
                                        Bạn cần <a href="<?= url('login') ?>" class="btn btn-sm btn-primary">Đăng nhập</a> 
                                        để có thể bình luận. Chưa có tài khoản? 
                                        <a href="<?= url('register') ?>" class="btn btn-sm btn-outline-primary">Đăng ký ngay</a>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                        <?php } else { ?>
                        <!-- No Post Found -->
                        <div class="no-post-found text-center py-80">
                            <div class="container">
                                <div class="alert alert-warning">
                                    <i class="lnr lnr-warning" style="font-size: 48px;"></i>
                                    <h3 class="mt-20">Không tìm thấy bài viết</h3>
                                    <p class="mb-30">Bài viết bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
                                    <a href="<?= url('/') ?>" class="primary-btn">Về trang chủ</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <!-- End single-post Area -->
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
