<?php include __DIR__ . '/../includes/header.php'; ?>

<section class="show-container">

    <div class="show-header">
        <a href="?page=home" class="btn btn-back">← Geri Qayıt</a>
        <div class="show-header-actions">
            <?php 
            if($blog['user_id'] == $_SESSION['user_id'] || $_SESSION['role_name'] == 'admin'){
                ?>
            <a href="?page=edit&id=<?php echo $blog['id'] ?? ''; ?>" class="btn btn-edit">Redaktə et</a>
            <a href="?page=delete&id=<?php echo $blog['id'] ?? ''; ?>" class="btn btn-delete"
               onclick="return confirm('Bu bloqu silmək istədiyinizdən əminsiniz?')">Sil</a>
              <?php }
            
            ?>
        </div>
    </div>

    <article class="show-card">
        <h1 class="show-title"><?php echo htmlspecialchars($blog['title'] ?? ''); ?></h1>

        <!-- Premium Author Block -->
        <div class="author-block">
            <div class="author-avatar"><?php echo strtoupper(substr($blog['name'] ?? 'U', 0, 1)); ?></div>
            <div class="author-info">
                <span class="author-name"><?php echo htmlspecialchars($blog['name'] ?? 'Naməlum Müəllif'); ?></span>
                <?php if (!empty($blog['created_at'])): ?>
                <span class="author-date"><?php echo htmlspecialchars(date('d M Y, H:i', strtotime($blog['created_at']))); ?></span>
                <?php endif; ?>
            </div>
        </div>

        <p class="show-excerpt"><?php echo htmlspecialchars($blog['excerpt'] ?? ''); ?></p>

        <hr class="show-divider">

        <div class="show-content">
            <?php echo nl2br(htmlspecialchars($blog['content'] ?? '')); ?>
        </div>

        <!-- Meta silindi, yuxarıda müəllif blokunda göstərilir -->
    </article>

    <!-- Rəylər və Qiymətləndirmələr Bölməsi -->
    <div class="comments-section">
        <h2 class="comments-title">Rəylər və Qiymətləndirmələr</h2>
        
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != $blog['user_id'] && !$has_rated): ?>
        <div class="comment-form-card">
            <form action="?page=add_raiting" method="POST">
                <input type="hidden" name="blog_id" value="<?php echo $blog['id']; ?>">
                <div class="form-group">
                    <label>Qiymətləndirin (1-5)</label>
                    <select name="rating_value" required class="form-control rating-select">
                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                        <option value="4">⭐⭐⭐⭐ (4)</option>
                        <option value="3">⭐⭐⭐ (3)</option>
                        <option value="2">⭐⭐ (2)</option>
                        <option value="1">⭐ (1)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rəyiniz</label>
                    <textarea name="rating_comment" rows="3" required class="form-control" placeholder="Fikirlərinizi bölüşün..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Göndər</button>
            </form>
        </div>
        <?php elseif(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $blog['user_id']): ?>
        <div class="login-prompt">
            <p>Öz bloqunuza rəy yazmaq ixtiyarınız yoxdur.</p>
        </div>
        <?php elseif(isset($_SESSION['user_id']) && $has_rated): ?>
        <div class="login-prompt">
            <p>Siz artıq bu bloqa rəy yazmısınız.</p>
        </div>
        <?php else : ?>
        <div class="login-prompt">
            <p>Rəy yazmaq üçün <a href="?page=login">daxil olun</a>.</p>
        </div>
        <?php endif; ?>


        <div class="comments-list">
             <?php foreach($comments as $comment): ?>
            <div class="comment-card">
                <div class="comment-header">
                    <div class="comment-author">
                        <div class="comment-avatar"  style="background-color:<?php
                        $colors=["#ff0000","#00ff00","#0000ff","#ffff00","#ff00ff","#00ffff"];
                        $color=$colors[array_rand($colors)];
                        echo $color;?>"><?php echo strtoupper(substr($comment['name'] ?? 'U', 0, 1)); ?></div>
                        <div class="comment-info">
                            <span class="comment-name "style='color:<?php if($_SESSION['user_id']==$comment['user_id']) echo "green";else echo ""; ?>'><?php echo $comment['name']??"Anonim Istifadeci"?></span>
                            <span class="comment-date"><?php echo $comment['created_at']??""?></span>
                        </div>
                    </div>
                    <div class="comment-rating">
                        <span class="stars"><?php echo str_repeat('⭐', $comment['rating_value']); ?><?php echo str_repeat('☆', 5 - ($comment['rating_value'])); ?></span>
                        <span class="rating-value">(<?php echo $comment['rating_value']??"----";?>/5)</span>
                    </div>
                </div>
                <div style="display: inline-block; width:85%" class="comment-body">
                    <p><?php echo $comment['rating_comment']??"----";?></p>
                </div>
                <?php if($_SESSION['user_id']==$comment['user_id']){ ?>
                <a style="display: inline-block; width:10% ; text-align: center;" href="?page=delete_raiting&id=<?php echo $comment['id']; ?>&blog_id=<?php echo $blog['id']; ?>" class="btn btn-delete"
                    onclick="return confirm('Bu rəyi silmək istədiyinizdən əminsiniz?')">Sil</a>
                <?php } ?>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>

</section>

<style>
    .show-container {
        max-width: 820px;
        margin: 30px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
    }

    .show-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        padding-bottom: 16px;
        border-bottom: 2px solid #f0f0f0;
    }

    .show-header-actions {
        display: flex;
        gap: 10px;
    }

    .show-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 36px 40px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .show-title {
        font-size: 28px;
        color: #222;
        margin: 0 0 16px 0;
        line-height: 1.3;
    }

    /* Author Block Styles */
    .author-block {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
        padding: 12px 16px;
        background: #f8fafc;
        border-radius: 8px;
        border-left: 4px solid #3b82f6;
    }

    .author-avatar {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .author-info {
        display: flex;
        flex-direction: column;
    }

    .author-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 15px;
    }

    .author-date {
        font-size: 13px;
        color: #64748b;
        margin-top: 2px;
    }

    .show-excerpt {
        font-size: 16px;
        color: #555;
        font-style: italic;
        margin: 0 0 20px 0;
        line-height: 1.6;
    }

    .show-divider {
        border: none;
        border-top: 1px solid #ececec;
        margin: 20px 0;
    }

    .show-content {
        font-size: 15px;
        color: #444;
        line-height: 1.8;
        white-space: pre-wrap;
    }

    .show-meta {
        margin-top: 30px;
        font-size: 13px;
        color: #aaa;
    }

    /* Comments Section */
    .comments-section {
        margin-top: 40px;
        padding-top: 20px;
        border-top: 2px solid #f0f0f0;
    }
    
    .comments-title {
        font-size: 22px;
        color: #222;
        margin-bottom: 20px;
    }

    .comment-card {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }

    .comment-author {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .comment-avatar {
        width: 36px;
        height: 36px;
        background: #64748b;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 16px;
    }

    .comment-info {
        display: flex;
        flex-direction: column;
    }

    .comment-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 14px;
    }

    .comment-date {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 2px;
    }

    .comment-rating {
        font-size: 14px;
        color: #ffc107;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .comment-rating .rating-value {
        color: #64748b;
        font-weight: bold;
        font-size: 13px;
    }

    .comment-body {
        font-size: 15px;
        color: #475569;
        line-height: 1.5;
    }

    /* Comment Form Styles */
    .comment-form-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #334155;
        font-size: 14px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #cbd5e1;
        border-radius: 4px;
        font-family: inherit;
        font-size: 14px;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
    }

    .rating-select {
        width: auto;
        min-width: 150px;
    }

    .login-prompt {
        background: #f1f5f9;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 25px;
        color: #475569;
    }

    .login-prompt a {
        color: #3b82f6;
        text-decoration: none;
        font-weight: bold;
    }


    /* Butonlar */
    .btn {
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        transition: background 0.2s;
        display: inline-block;
        border: none;
        cursor: pointer;
    }
    .btn-back    { background-color: #6c757d; color: #fff; }
    .btn-back:hover { background-color: #5a6268; }
    .btn-edit    { background-color: #007bff; color: #fff; }
    .btn-edit:hover { background-color: #0069d9; }
    .btn-delete  { background-color: #dc3545; color: #fff; }
    .btn-delete:hover { background-color: #c82333; }
    .btn-primary { background-color: #28a745; color: #fff; }
    .btn-primary:hover { background-color: #218838; }
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
