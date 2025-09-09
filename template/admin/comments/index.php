<?php
require_once(BASE_PATH . '/template/admin/layouts/head-tag.php');
?>

<!-- Page Header -->
<div class="page-header fade-in">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-comments text-primary me-2"></i>Comments Management</h1>
            <p class="text-muted mb-0">Manage and moderate user comments</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-primary" onclick="refreshData()">
                <i class="fas fa-refresh me-1"></i>Refresh
            </button>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-filter me-1"></i>Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-filter="all">All Comments</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="approved">Approved</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="pending">Pending</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4 fade-in">
    <div class="col-md-3">
        <div class="card border-0 bg-primary text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-0">Total Comments</h6>
                        <h3 class="mb-0"><?= isset($comments) && is_array($comments) ? count($comments) : 0 ?></h3>
                    </div>
                    <div class="ms-3">
                        <i class="fas fa-comments fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-success text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-0">Approved</h6>
                        <h3 class="mb-0"><?= count(array_filter($comments, function($c) { return $c['status'] == 'approved'; })) ?></h3>
                    </div>
                    <div class="ms-3">
                        <i class="fas fa-check-circle fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-warning text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-0">Pending</h6>
                        <h3 class="mb-0"><?= count(array_filter($comments, function($c) { return $c['status'] == 'seen'; })) ?></h3>
                    </div>
                    <div class="ms-3">
                        <i class="fas fa-clock fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 bg-info text-white">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="card-title mb-0">This Month</h6>
                        <h3 class="mb-0"><?= count($comments) ?></h3>
                    </div>
                    <div class="ms-3">
                        <i class="fas fa-calendar fa-2x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comments Table -->
<div class="card fade-in">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-list me-2"></i>Comments List</h5>
            <div class="d-flex gap-2">
                <div class="input-group" style="width: 300px;">
                    <input type="text" class="form-control" placeholder="Search comments..." id="searchInput">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0" id="commentsTable">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 150px;">User</th>
                        <th style="width: 200px;">Post</th>
                        <th>Comment</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comments as $key => $comment) { ?>
                    <tr data-comment-id="<?= $comment['id'] ?>" data-status="<?= $comment['status'] ?>">
                        <td>
                            <span class="badge bg-secondary"><?= $key + 1 ?></span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold"><?= htmlspecialchars($comment['email']) ?></div>
                                    <small class="text-muted">User</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-semibold text-primary" title="<?= htmlspecialchars($comment['post_title']) ?>">
                                <?= strlen($comment['post_title']) > 30 ? htmlspecialchars(substr($comment['post_title'], 0, 30)) . '...' : htmlspecialchars($comment['post_title']) ?>
                            </div>
                            <small class="text-muted">Blog Post</small>
                        </td>
                        <td>
                            <div class="comment-text" title="<?= htmlspecialchars($comment['comment']) ?>">
                                <?= strlen($comment['comment']) > 100 ? htmlspecialchars(substr($comment['comment'], 0, 100)) . '...' : htmlspecialchars($comment['comment']) ?>
                            </div>
                        </td>
                        <td>
                            <?php if ($comment['status'] == 'approved') { ?>
                                <span class="badge bg-success">
                                    <i class="fas fa-check me-1"></i>Approved
                                </span>
                            <?php } else { ?>
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>Pending
                                </span>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <?php if ($comment['status'] == 'seen') { ?>
                                    <a href="<?= url('admin/comment/change-status/' . $comment['id']) ?>" 
                                       class="btn btn-sm btn-success" 
                                       title="Approve Comment">
                                        <i class="fas fa-check"></i>
                                        Approve
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= url('admin/comment/change-status/' . $comment['id']) ?>" 
                                       class="btn btn-sm btn-warning text-dark" 
                                       title="Mark as Pending">
                                        <i class="fas fa-clock"></i>
                                        Pending
                                    </a>
                                <?php } ?>
                                <button class="btn btn-sm btn-outline-primary" 
                                        onclick="viewComment(<?= $comment['id'] ?>)" 
                                        title="View Full Comment">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" 
                                        onclick="deleteComment(<?= $comment['id'] ?>)" 
                                        title="Delete Comment">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php if (empty($comments)) { ?>
    <div class="card-body text-center py-5">
        <div class="empty-state">
            <i class="fas fa-comments fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">No Comments Found</h5>
            <p class="text-muted">There are no comments to display at the moment.</p>
        </div>
    </div>
    <?php } ?>
</div>

<!-- Comment View Modal -->
<div class="modal fade" id="commentModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-comment me-2"></i>Comment Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="commentContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function viewComment(commentId) {
        // Find comment data from the table
        const row = document.querySelector(`tr[data-comment-id="${commentId}"]`);
        const email = row.cells[1].querySelector('.fw-semibold').textContent;
        const postTitle = row.cells[2].querySelector('.fw-semibold').textContent;
        const comment = row.cells[3].querySelector('.comment-text').title;
        const status = row.querySelector('.badge').textContent.trim();
        
        const content = `
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">User Email:</label>
                    <p class="form-control-plaintext">${email}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Status:</label>
                    <p class="form-control-plaintext">${status}</p>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-semibold">Post Title:</label>
                    <p class="form-control-plaintext">${postTitle}</p>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label fw-semibold">Comment:</label>
                    <div class="border rounded p-3 bg-light">
                        ${comment}
                    </div>
                </div>
            </div>
        `;
        
        document.getElementById('commentContent').innerHTML = content;
        new bootstrap.Modal(document.getElementById('commentModal')).show();
    }

    function deleteComment(commentId) {
        if (confirm('Are you sure you want to delete this comment?')) {
            // Add delete functionality here
            console.log('Delete comment:', commentId);
        }
    }

    function refreshData() {
        window.location.reload();
    }

    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#commentsTable tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    // Filter functionality
    document.querySelectorAll('[data-filter]').forEach(filterBtn => {
        filterBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.dataset.filter;
            const rows = document.querySelectorAll('#commentsTable tbody tr');
            
            rows.forEach(row => {
                const status = row.dataset.status;
                if (filter === 'all') {
                    row.style.display = '';
                } else if (filter === 'approved' && status === 'approved') {
                    row.style.display = '';
                } else if (filter === 'pending' && status === 'seen') {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

<style>
    .avatar-sm {
        width: 32px;
        height: 32px;
        font-size: 12px;
    }
    
    .comment-text {
        line-height: 1.4;
        color: #6b7280;
    }
    
    .empty-state i {
        opacity: 0.5;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .btn-group .btn {
        border-radius: 6px;
        margin: 0 1px;
    }
</style>

<?php
require_once(BASE_PATH . '/template/admin/layouts/footer.php');
?>