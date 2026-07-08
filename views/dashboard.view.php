<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="blog-container">
    
    <div class="blog-header">
        <h2>Mənim Bloq Yazılarım</h2>
        <a href="?page=create" class="btn btn-primary">+ Yeni Bloq Əlavə Et</a>
    </div>

    <div class="blog-grid">
        <?php foreach($blogs as $blog): ?>
        <div class="blog-card">
            <div class="blog-body">
                <h3>
                    <a href="?page=show&id=<?php echo $blog['id'] ?? ''; ?>" style="text-decoration: none; color: inherit;">
                        <?php echo htmlspecialchars($blog['title']) ?? ''; ?>
                    </a>
                </h3>
                <div class="blog-rating">
                    <?php if ($blog['total_count'] > 0): ?>
                        <span class="stars"><?php echo str_repeat('⭐', floor($blog['total_rating'] / $blog['total_count'])); ?><?php echo str_repeat('☆', 5 - floor($blog['total_rating'] / $blog['total_count'])); ?></span>
                        <span class="rating-score">(<?php echo round($blog['total_rating'] / $blog['total_count'], 1); ?>)</span>
                    <?php else: ?>
                        <span class="stars">Henüz qiymətləndirilməyib</span>
                    <?php endif; ?>
                </div>
                <p><?php echo htmlspecialchars($blog['excerpt']) ?? ''; ?></p>
            </div>
            <div class="blog-actions">
                <a href="?page=show&id=<?php echo $blog['id'] ?? ''; ?>" class="btn btn-primary" style="margin-right: auto;">Ətraflı oxu</a>
                <?php if ($blog['user_id'] == $_SESSION['user_id']): ?>
                    <a href="?page=edit&id=<?php echo $blog['id'] ?? ''; ?>" class="btn btn-edit">Redaktə et</a>
                    <a href="?page=delete&id=<?php echo $blog['id'] ?? ''; ?>" class="btn btn-delete" onclick="return confirm('Bu bloqu silmək istədiyinizdən əminsiniz?')">Sil</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</section>

<style>
    .blog-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
    }
    .blog-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    .blog-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .blog-body h3 {
        margin-top: 0;
        color: #333;
    }
    .blog-body p {
        color: #666;
        font-size: 14px;
        line-height: 1.5;
    }
    .blog-rating {
        margin: 10px 0 5px 0;
        font-size: 14px;
        color: #ffc107;
    }
    .blog-rating .rating-score {
        color: #666;
        margin-left: 5px;
        font-weight: bold;
    }
    .blog-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }
    /* Butonların Stilləri */
    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        transition: background 0.2s;
    }
    .btn-primary {
        background-color: #28a745;
        color: white;
    }
    .btn-primary:hover { background-color: #218838; }
    
    .btn-edit {
        background-color: #007bff;
        color: white;
    }
    .btn-edit:hover { background-color: #0069d9; }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
    .btn-delete:hover { background-color: #c82333; }
</style>
<?php include __DIR__ . '/../includes/footer.php'; ?>