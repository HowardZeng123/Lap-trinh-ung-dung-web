<div class="col-lg-4">
    <div class="sidebars-area">
        <!-- Editor's Choice -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header py-3" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                <h5 class="mb-0 fw-bold text-white">
                    <i class="lnr lnr-star me-2"></i>Lựa chọn của biên tập viên
                </h5>
            </div>
            <div class="card-body p-0">
                <?php if(isset($topSelectedPosts[0]) && !empty($topSelectedPosts[0])) { ?>
                <div class="p-3">
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100 rounded" src="<?= asset($topSelectedPosts[0]['image']) ?>" alt="<?= $topSelectedPosts[0]['title'] ?>" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-2">
                            <span class="badge" style="background: linear-gradient(45deg, #667eea, #764ba2);">
                                <a href="<?= url('show-category/' . $topSelectedPosts[0]['cat_id']) ?>" class="text-white text-decoration-none"><?= $topSelectedPosts[0]['category'] ?></a>
                            </span>
                        </div>
                    </div>
                    <h5 class="mb-3">
                        <a href="<?= url('show-post/' . $topSelectedPosts[0]['id']) ?>" class="text-dark text-decoration-none"><?= $topSelectedPosts[0]['title'] ?></a>
                    </h5>
                    <div class="d-flex align-items-center text-muted small">
                        <span class="me-3"><i class="lnr lnr-user me-1" style="color: #667eea;"></i><?= $topSelectedPosts[0]['username'] ?></span>
                        <span class="me-3"><i class="lnr lnr-calendar-full me-1" style="color: #667eea;"></i><?= $topSelectedPosts[0]['created_at'] ?></span>
                        <span><i class="lnr lnr-bubble me-1" style="color: #667eea;"></i><?= $topSelectedPosts[0]['comments_count'] ?></span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="p-3 text-center">
                    <i class="lnr lnr-star" style="font-size: 32px; color: #667eea;"></i>
                    <p class="mt-2 mb-0">Chưa có bài viết được chọn</p>
                    <small class="text-muted">Hãy thêm bài viết và đánh dấu là "Được chọn"</small>
                </div>
                <?php } ?>
            </div>
        </div>

        <!-- Advertisement Banner -->
        <?php if(isset($sidebarBanner)) { ?>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-0">
                <a href="<?= $sidebarBanner['url'] ?>" class="d-block">
                    <img class="img-fluid w-100 rounded" src="<?= asset($sidebarBanner['image']) ?>" alt="Advertisement" style="height: 250px; object-fit: cover;">
                </a>
            </div>
        </div>
        <?php } ?>

        <!-- Most Controversial Posts -->
        <div class="card border-0 shadow-sm">
            <div class="card-header py-3" style="background: linear-gradient(45deg, #f093fb, #fa709a);">
                <h5 class="mb-0 fw-bold text-white">
                    <i class="lnr lnr-fire me-2"></i>Tin gây tranh cái nhất
                </h5>
            </div>
            <div class="card-body p-0">
                <?php if(isset($mostCommentsPosts) && !empty($mostCommentsPosts)) { ?>
                <?php foreach($mostCommentsPosts as $index => $mostCommentsPost) { ?>
                <div class="border-bottom p-3 <?= $index === array_key_last($mostCommentsPosts) ? 'border-0' : '' ?>">
                    <div class="row g-3">
                        <div class="col-4">
                            <img src="<?= asset($mostCommentsPost['image']) ?>" alt="<?= $mostCommentsPost['title'] ?>" class="img-fluid rounded" style="height: 70px; width: 100%; object-fit: cover;">
                        </div>
                        <div class="col-8">
                            <h6 class="mb-2">
                                <a href="<?= url('show-post/' . $mostCommentsPost['id']) ?>" class="text-dark text-decoration-none"><?= $mostCommentsPost['title'] ?></a>
                            </h6>
                            <div class="d-flex align-items-center text-muted small">
                                <span class="me-2"><i class="lnr lnr-calendar-full me-1" style="color: #fa709a;"></i><?= $mostCommentsPost['created_at'] ?></span>
                                <span><i class="lnr lnr-bubble me-1" style="color: #fa709a;"></i><?= $mostCommentsPost['comments_count'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } else { ?>
                <div class="p-3 text-center">
                    <i class="lnr lnr-bubble" style="font-size: 32px; color: #fa709a;"></i>
                    <p class="mt-2 mb-0">Chưa có bài viết nào</p>
                    <small class="text-muted">Khi có bình luận sẽ hiển thị ở đây</small>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>