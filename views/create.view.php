<?php include __DIR__ . '/../includes/header.php'; ?>

<section class="form-container">
    
    <div class="form-header">
        <h2>Yeni Bloq Yazısı Yarat</h2>
        <a href="?page=home" class="btn btn-secondary">← Geri Qayıt</a>
    </div>

    <form action="index.php?page=create" method="POST" class="blog-form">
        
        <div class="form-group">
            <label for="title">Bloq Başlığı</label>
            <input type="text" id="title" name="title" placeholder="Başlığı daxil edin..." required>
        </div>

        <div class="form-group">
            <label for="excerpt">Qısa Təsvir</label>
            <input type="text" id="excerpt" name="excerpt" placeholder="Ana səhifədə görünəcək qısa mətn..." required>
        </div>

        <div class="form-group">
            <label for="content">Bloq Mətni</label>
            <textarea id="content" name="content" rows="8" placeholder="Bloq məzmununu bura yazın..." required></textarea>
        </div>

        <div class="form-actions">
            <button type="reset" class="btn btn-reset">Təmizlə</button>
            <button type="submit" class="btn btn-success">Dərc et (Paylaş)</button>
        </div>

    </form>
</section>

<style>
    .form-container {
        max-width: 800px;
        margin: 30px auto;
        padding: 0 20px;
        font-family: Arial, sans-serif;
    }
    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }
    .blog-form {
        background: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
        font-size: 14px;
    }
    .form-group input[type="text"],
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 15px;
        box-sizing: border-box;
        font-family: inherit;
    }
    .form-group input[type="text"]:focus,
    .form-group textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0,123,255,0.2);
    }
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 25px;
        border-top: 1px solid #f0f0f0;
        padding-top: 20px;
    }
    /* Butonların Stilləri */
    .btn {
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s;
        border: none;
    }
    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }
    .btn-secondary:hover { background-color: #5a6268; }

    .btn-success {
        background-color: #28a745;
        color: white;
    }
    .btn-success:hover { background-color: #218838; }

    .btn-reset {
        background-color: #e0e0e0;
        color: #333;
    }
    .btn-reset:hover { background-color: #d4d4d4; }
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>