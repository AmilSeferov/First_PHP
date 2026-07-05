<?php include __DIR__ . '/../includes/header.php'; ?>

<section class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Qeydiyyat</h2>
            <p>Yeni hesab yaradaraq bizə qoşulun.</p>
        </div>

        <form action="index.php?page=register" method="POST" class="auth-form">
            <div class="form-group">
                <label for="name">Ad və Soyad</label>
                <input type="text" id="name" name="name" placeholder="Adınızı daxil edin" required>
            </div>

            <div class="form-group">
                <label for="email">E-poçt Ünvanı</label>
                <input type="email" id="email" name="email" placeholder="nümunə@email.com" required>
            </div>

            <div class="form-group">
                <label for="password">Şifrə</label>
                <input type="password" id="password" name="password" placeholder="Şifrə təyin edin" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirm">Şifrənin Təkrarı</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="Şifrəni təkrar daxil edin" required>
            </div>

            <div class="auth-actions">
                <button type="submit" class="btn btn-success btn-block">Hesab Yarat</button>
            </div>
        </form>

        <div class="auth-footer">
            <p>Artıq hesabınız var? <a href="?page=login">Giriş edin</a></p>
        </div>
    </div>
</section>

<style>
    .auth-container {
        min-height: calc(100vh - 200px);
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        background-color: #f8f9fa;
    }
    .auth-card {
        background: #fff;
        width: 100%;
        max-width: 450px;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #eaeaea;
    }
    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .auth-header h2 {
        margin: 0 0 10px;
        color: #333;
        font-size: 28px;
    }
    .auth-header p {
        color: #6c757d;
        margin: 0;
        font-size: 15px;
    }
    .auth-form .form-group {
        margin-bottom: 20px;
    }
    .auth-form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
        font-size: 14px;
    }
    .auth-form input[type="email"],
    .auth-form input[type="password"],
    .auth-form input[type="text"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .auth-form input:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
    .auth-actions {
        margin-top: 30px;
    }
    .btn-block {
        display: block;
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-success {
        background-color: #198754;
        color: white;
        transition: background-color 0.2s;
    }
    .btn-success:hover {
        background-color: #157347;
    }
    .auth-footer {
        margin-top: 25px;
        text-align: center;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }
    .auth-footer p {
        margin: 0;
        color: #6c757d;
        font-size: 14.5px;
    }
    .auth-footer a {
        color: #0d6efd;
        text-decoration: none;
        font-weight: 600;
    }
    .auth-footer a:hover {
        text-decoration: underline;
    }
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
