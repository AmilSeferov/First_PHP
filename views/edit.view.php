<?php include __DIR__ . '/../includes/header.php'; ?>

<section class="form-container">
    
    <div class="form-header">
        <h2>Bloq Yazısını Redaktə Et</h2>
        <a href=" <?php echo $_SERVER['HTTP_REFERER'] ?? '?page=home'; ?>" class="btn btn-back">← Geri Qayıt</a>
    </div>

    <form action="actions/edit.action.php?id=<?php echo $blog['id'] ?? ''; ?>" method="POST" class="blog-form">
        
        <input type="hidden" name="id" value="<?php echo $blog['id'] ?? ''; ?>">
        
        <div class="form-group">
            <label for="title">Bloq Başlığı</label>
            <input type="text" id="title" name="title" value="<?php echo $blog['title'] ?? 'Köhnə Başlıq Nümunəsi'; ?>" required>
        </div>

        <div class="form-group">
            <label for="excerpt">Qısa Təsvir</label>
            <input type="text" id="excerpt" name="excerpt" value="<?php echo $blog['excerpt'] ?? 'Köhnə qısa təsvir nümunəsi'; ?>" required>
        </div>

        <div class="form-group">
            <label for="content">Bloq Mətni</label>
            <textarea id="content" name="content" rows="8" required><?php echo $blog['content'] ?? 'Köhnə əsas bloq mətni bura gələcək...'; ?></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning ">Dəyişiklikləri Yadda Saxla</button>
        </div>

    </form>
</section>

<style>
    .form-container { max-width: 800px; margin: 30px auto; padding: 0 20px; font-family: Arial, sans-serif; }
    .form-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; }
    .blog-form { background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; margin-bottom: 8px; font-weight: bold; color: #333; font-size: 14px; }
    .form-group input[type="text"], .form-group textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px; box-sizing: border-box; font-family: inherit; }
    .form-group input[type="text"]:focus, .form-group textarea:focus { border-color: #ffc107; outline: none; box-shadow: 0 0 5px rgba(255,193,7,0.2); }
    .form-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 25px; border-top: 1px solid #f0f0f0; padding-top: 20px; }
    
    .btn { padding: 10px 20px; border-radius: 4px; text-decoration: none; font-size: 14px; font-weight: bold; cursor: pointer; transition: background 0.2s; border: none; }
    .btn-secondary { background-color: #6c757d; color: white; }
    .btn-secondary:hover { background-color: #5a6268; }
    
    .btn-warning { background-color: #ffc107; color: #212529; }
    .btn-warning:hover { background-color: #e0a800; }
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>