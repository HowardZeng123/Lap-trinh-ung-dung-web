<?php
require_once(BASE_PATH . "/template/admin/layouts/head-tag.php");
?>

<!-- Page Header -->
<div class="page-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard</h1>
            <p class="text-muted mb-0">Welcome to your admin dashboard</p>
        </div>
        <div>
            <button class="btn btn-outline-primary" onclick="refreshStats()">
                <i class="fas fa-refresh me-1"></i>Refresh Stats
            </button>
        </div>
    </div>
</div>

<!-- Statistics Overview -->
<div class="row mb-4 fade-in">
    <div class="col-sm-6 col-lg-3 mb-4">
        <a href="<?= url('admin/category') ?>" class="text-decoration-none">
            <div class="card border-0 bg-primary text-white h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-1 opacity-75">Categories</h6>
                            <h2 class="mb-0 fw-bold"><?= $categoryCount['COUNT(*)']; ?></h2>
                            <small class="opacity-75">
                                <i class="fas fa-clipboard-list me-1"></i>Manage Categories
                            </small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <small>View Details</small>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3 mb-4">
        <a href="<?= url('admin/user') ?>" class="text-decoration-none">
            <div class="card border-0 bg-warning text-white h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-1 opacity-75">Users</h6>
                            <h2 class="mb-0 fw-bold"><?= $userCount['COUNT(*)'] + $adminCount['COUNT(*)']; ?></h2>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="opacity-75">
                                    <i class="fas fa-users-cog me-1"></i>Admins: <?= $adminCount['COUNT(*)']; ?>
                                </small>
                                <small class="opacity-75">
                                    <i class="fas fa-user me-1"></i>Users: <?= $userCount['COUNT(*)']; ?>
                                </small>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <small>Manage Users</small>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3 mb-4">
        <a href="<?= url('admin/post') ?>" class="text-decoration-none">
            <div class="card border-0 bg-success text-white h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-1 opacity-75">Articles</h6>
                            <h2 class="mb-0 fw-bold"><?= $postCount['COUNT(*)']; ?></h2>
                            <small class="opacity-75">
                                <i class="fas fa-eye me-1"></i>Total Views: <?= number_format($postsViews['SUM(view)']); ?>
                            </small>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-newspaper fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <small>Manage Posts</small>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-lg-3 mb-4">
        <a href="<?= url('admin/comment') ?>" class="text-decoration-none">
            <div class="card border-0 bg-info text-white h-100 hover-lift">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h6 class="card-title mb-1 opacity-75">Comments</h6>
                            <h2 class="mb-0 fw-bold"><?= $commentsCount['COUNT(*)']; ?></h2>
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <small class="opacity-75">
                                    <i class="fas fa-eye-slash me-1"></i>Pending: <?= $commentsUnseenCount['COUNT(*)']; ?>
                                </small>
                                <small class="opacity-75">
                                    <i class="fas fa-check-circle me-1"></i>Approved: <?= $commentsApprovedCount['COUNT(*)']; ?>
                                </small>
                            </div>
                        </div>
                        <div class="ms-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                                <i class="fas fa-comments fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white bg-opacity-10 border-0 py-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <small>Review Comments</small>
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- Analytics Section -->
<div class="row fade-in">
    <div class="col-lg-6 mb-4">
        <div class="card border-0 h-100">
            <div class="card-header bg-transparent border-0 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-fire text-danger me-2"></i>Most Viewed Posts
                    </h5>
                    <a href="<?= url('admin/post') ?>" class="btn btn-sm btn-outline-primary">
                        View All
                    </a>
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">#</th>
                                <th class="border-0">Title</th>
                                <th class="border-0 text-center">Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($postsWithView as $key => $post) {?>
                            <tr class="hover-highlight">
                                <td class="fw-medium text-primary"><?=  $key += 1 ?></td>
                                <td>
                                    <a href="<?= url('admin/post') ?>" class="text-decoration-none text-dark fw-medium">
                                        <?=  strlen($post['title']) > 40 ? substr($post['title'], 0, 40) . '...' : $post['title'] ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-danger rounded-pill px-3 py-2">
                                        <i class="fas fa-eye me-1"></i><?=  number_format($post['view']) ?>
                                    </span>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card border-0 h-100">
            <div class="card-header bg-transparent border-0 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-comments text-info me-2"></i>Most Commented Posts
                    </h5>
                    <a href="<?= url('admin/post') ?>" class="btn btn-sm btn-outline-primary">
                        View All
                    </a>
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">#</th>
                                <th class="border-0">Title</th>
                                <th class="border-0 text-center">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($postsComments as $key => $post) {?>
                            <tr class="hover-highlight">
                                <td class="fw-medium text-primary"><?=  $key +=1 ?></td>
                                <td>
                                    <a href="<?= url('admin/post') ?>" class="text-decoration-none text-dark fw-medium">
                                        <?=  strlen($post['title']) > 40 ? substr($post['title'], 0, 40) . '...' : $post['title'] ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-info rounded-pill px-3 py-2">
                                        <i class="fas fa-comments me-1"></i><?=  $post['comment_count'] ?>
                                    </span>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="row fade-in">
    <div class="col-12">
        <div class="card border-0">
            <div class="card-header bg-transparent border-0 pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock text-warning me-2"></i>Recent Comments
                    </h5>
                    <a href="<?= url('admin/comment') ?>" class="btn btn-sm btn-outline-primary">
                        Manage All
                    </a>
                </div>
            </div>
            <div class="card-body pt-2">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="border-0">#</th>
                                <th class="border-0">User</th>
                                <th class="border-0">Comment</th>
                                <th class="border-0 text-center">Status</th>
                                <th class="border-0 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lastComments as $key => $comment) {?>
                            <tr class="hover-highlight">
                                <td class="fw-medium text-primary"><?=  $key += 1 ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-2 me-2">
                                            <i class="fas fa-user text-muted"></i>
                                        </div>
                                        <div>
                                            <div class="fw-medium"><?=  $comment['username'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="comment-preview">
                                        <?=  strlen($comment['comment']) > 50 ? substr($comment['comment'], 0, 50) . '...' : $comment['comment'] ?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if($comment['status'] == 0) { ?>
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                            <i class="fas fa-clock me-1"></i>Pending
                                        </span>
                                    <?php } else { ?>
                                        <span class="badge bg-success rounded-pill px-3 py-2">
                                            <i class="fas fa-check me-1"></i>Approved
                                        </span>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="<?= url('admin/comment') ?>" class="btn btn-sm btn-outline-primary" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <?php if($comment['status'] == 0) { ?>
                                        <button class="btn btn-sm btn-outline-success" title="Approve">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <?php } ?>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Dashboard Functionality -->
<script>
function refreshStats() {
    location.reload();
}

// Add fade-in animation to elements
document.addEventListener('DOMContentLoaded', function() {
    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>

<style>
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.hover-highlight:hover {
    background-color: var(--bs-light);
}

.comment-preview {
    font-size: 0.9rem;
    color: var(--bs-gray-700);
    line-height: 1.4;
}

.page-header {
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--bs-gray-200);
}

.card {
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
}
</style>
    <?php
require_once(BASE_PATH . "/template/admin/layouts/footer.php");
?>