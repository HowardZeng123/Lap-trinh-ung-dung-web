<?php 
require_once(BASE_PATH . '/template/app/layouts/header.php');
?>

<div class="site-main-container">
    <!-- Start Hero/Featured Posts Area -->
    <section class="hero-area py-5">
        <div class="container">
            <!-- Welcome Message -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <h2 class="mb-0">!Chào mừng đến với Echo News</h2>
                        <p class="mb-0">Trang tin tức trực tuyến của bạn</p>
                    </div>
                </div>
            </div>

            <!-- Featured Posts Grid -->
            <div class="row g-4">
                <!-- Main Featured Post -->
                <div class="col-lg-8">
                    <?php if(isset($topSelectedPosts[0]) && !empty($topSelectedPosts[0])) { ?>
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
                    <?php } else { ?>
                    <!-- No Featured Post Available -->
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 text-center">
                            <i class="lnr lnr-layers" style="font-size: 48px; color: #667eea;"></i>
                            <h2 class="card-title h3 mt-3 mb-3">Chưa có bài viết nổi bật</h2>
                            <p class="text-muted">Hiện tại chưa có bài viết nào được chọn làm bài viết nổi bật. Hãy quay lại sau!</p>
                            <a href="<?= url('admin') ?>" class="btn btn-primary">Vào trang quản trị</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <!-- Side Featured Posts -->
                <div class="col-lg-4">
                    <?php if(isset($topSelectedPosts[1]) && !empty($topSelectedPosts[1])) { ?>
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="row g-0">
                            <div class="col-5">
                                <img src="<?= asset($topSelectedPosts[1]['image']) ?>" class="img-fluid rounded-start h-100" alt="<?= $topSelectedPosts[1]['title'] ?>" style="object-fit: cover;">
                            </div>
                            <div class="col-7">
                                <div class="card-body p-3">
                                    <span class="badge bg-secondary small mb-2">
                                        <a href="<?= url('show-category/' . $topSelectedPosts[1]['cat_id']) ?>" class="text-white text-decoration-none"><?= $topSelectedPosts[1]['category'] ?></a>
                                    </span>
                                    <h6 class="card-title">
                                        <a href="<?= url('show-post/' . $topSelectedPosts[1]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[1]['title'] ?></a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="lnr lnr-calendar-full me-1"></i><?= $topSelectedPosts[1]['created_at'] ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if(isset($topSelectedPosts[2]) && !empty($topSelectedPosts[2])) { ?>
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
                                    <h6 class="card-title">
                                        <a href="<?= url('show-post/' . $topSelectedPosts[2]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[2]['title'] ?></a>
                                    </h6>
                                    <small class="text-muted">
                                        <i class="lnr lnr-calendar-full me-1"></i><?= $topSelectedPosts[2]['created_at'] ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- If no side posts, show placeholder -->
                    <?php if(!isset($topSelectedPosts[1]) && !isset($topSelectedPosts[2])) { ?>
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center p-4">
                            <i class="lnr lnr-book" style="font-size: 32px; color: #764ba2;"></i>
                            <h6 class="mt-2">Chưa có tin tức phụ</h6>
                            <small class="text-muted">Đang cập nhật...</small>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="latest-news-area py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="section-header mb-4">
                        <h3 class="section-title">Tin tức mới nhất</h3>
                    </div>
                    
                    <div class="row g-4">
                        <?php if(isset($lastPosts) && !empty($lastPosts)) { ?>
                            <?php foreach($lastPosts as $lastPost) { ?>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm h-100">
                                    <img src="<?= asset($lastPost['image']) ?>" class="card-img-top" alt="<?= $lastPost['title'] ?>" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <span class="badge bg-primary mb-2">
                                            <a href="<?= url('show-category/' . $lastPost['cat_id']) ?>" class="text-white text-decoration-none"><?= $lastPost['category'] ?></a>
                                        </span>
                                        <h5 class="card-title">
                                            <a href="<?= url('show-post/' . $lastPost['id']) ?>" class="text-dark text-decoration-none"><?= $lastPost['title'] ?></a>
                                        </h5>
                                        <p class="card-text text-muted"><?= substr(strip_tags($lastPost['body']), 0, 100) ?>...</p>
                                        <div class="d-flex align-items-center text-muted small">
                                            <span class="me-3"><i class="lnr lnr-user me-1"></i><?= $lastPost['username'] ?></span>
                                            <span class="me-3"><i class="lnr lnr-calendar-full me-1"></i><?= $lastPost['created_at'] ?></span>
                                            <span><i class="lnr lnr-bubble me-1"></i><?= $lastPost['comments_count'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-12">
                                <div class="alert alert-warning text-center">
                                    <i class="lnr lnr-warning" style="font-size: 24px;"></i>
                                    <h5 class="mt-2">Chưa có tin tức mới nhất</h5>
                                    <p class="mb-0">Hiện tại chưa có bài viết nào trong hệ thống. <a href="<?= url('admin/post/create') ?>">Thêm bài viết mới</a>.</p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <?php require_once(BASE_PATH . '/template/app/layouts/sidebar.php'); ?>
            </div>
        </div>
    </section>

    <!-- Breaking News Ticker (if available) -->
    <?php if(isset($breakingNews) && !empty($breakingNews)) { ?>
    <section class="breaking-news-area py-3" style="background: linear-gradient(45deg, #ff6b6b, #ffa726);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <span class="badge bg-danger fs-6">NÓNG</span>
                </div>
                <div class="col-md-10">
                    <div class="breaking-news-text text-white">
                        <a href="<?= url('show-post/' . $breakingNews['id']) ?>" class="text-white text-decoration-none fw-bold">
                            <?= $breakingNews['title'] ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</div>

<?php require_once(BASE_PATH . '/template/app/layouts/footer.php'); ?>

<script>
// Remove annoying progress bars and fix horizontal scroll
function removeProgressBars() {
    // Remove all progress elements
    const progressElements = document.querySelectorAll('progress, .progress, .progress-bar, [role="progressbar"]');
    progressElements.forEach(el => {
        el.style.display = 'none';
        el.remove();
    });
    
    // Remove any fixed bottom elements that look like progress bars
    const fixedBottomElements = document.querySelectorAll('*');
    fixedBottomElements.forEach(el => {
        const style = window.getComputedStyle(el);
        if (style.position === 'fixed' && 
            (style.bottom === '0px' || style.bottom === '0') && 
            (style.height === '4px' || style.height === '6px' || style.height === '8px') &&
            style.background.includes('gradient')) {
            el.style.display = 'none';
            el.remove();
        }
    });

    // Remove reading progress indicators
    const readingProgress = document.querySelectorAll('.reading-progress, .scroll-progress, .page-progress');
    readingProgress.forEach(el => {
        el.style.display = 'none';
        el.remove();
    });
}

function fixHorizontalScroll() {
    // Force remove horizontal scroll
    document.documentElement.style.overflowX = 'hidden';
    document.body.style.overflowX = 'hidden';
    document.documentElement.style.maxWidth = '100vw';
    document.body.style.maxWidth = '100vw';
    
    // Check for elements causing overflow
    const allElements = document.querySelectorAll('*');
    allElements.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.width > window.innerWidth) {
            el.style.maxWidth = '100%';
            el.style.overflowX = 'hidden';
        }
    });
    
    // Fix container classes
    const containers = document.querySelectorAll('.container, .container-fluid, .row');
    containers.forEach(container => {
        container.style.maxWidth = '100%';
        container.style.overflowX = 'hidden';
    });
}

// Add some interactive effects
document.addEventListener('DOMContentLoaded', function() {
    // Remove progress bars immediately
    removeProgressBars();
    fixHorizontalScroll();
    
    // Keep checking and removing them
    setInterval(() => {
        removeProgressBars();
        fixHorizontalScroll();
    }, 1000);
    
    // Card hover effects
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Breaking news ticker animation
    const breakingText = document.querySelector('.breaking-news-text');
    if (breakingText) {
        breakingText.style.animation = 'marquee 15s linear infinite';
    }
});

// Also check when window loads
window.addEventListener('load', () => {
    removeProgressBars();
    fixHorizontalScroll();
});

// Check when scrolling
window.addEventListener('scroll', () => {
    removeProgressBars();
    fixHorizontalScroll();
});

// Check when window resizes
window.addEventListener('resize', fixHorizontalScroll);
</script>

<style>
/* Hide browser progress bar */
progress::-webkit-progress-bar {
    display: none !important;
}

progress::-webkit-progress-value {
    display: none !important;
}

progress::-moz-progress-bar {
    display: none !important;
}

progress {
    display: none !important;
}

/* Remove horizontal scrollbar completely */
html, body {
    overflow-x: hidden !important;
    max-width: 100vw !important;
}

/* Fix any container overflow */
.container, .container-fluid, .row {
    max-width: 100% !important;
    overflow-x: hidden !important;
}

/* Fix wide elements */
img, video, iframe, table {
    max-width: 100% !important;
    height: auto !important;
}

/* Additional styles for homepage */
.section-title {
    position: relative;
    padding-bottom: 10px;
    color: #333;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(45deg, #667eea, #764ba2);
}

.card {
    transition: all 0.3s ease;
}

@keyframes marquee {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

.breaking-news-text {
    white-space: nowrap;
    overflow: hidden;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero-area .col-lg-4 .card {
        margin-bottom: 1rem;
    }
}
</style>
