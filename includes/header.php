<?php
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mənim Bloq Layihəm</title>
    <link rel="stylesheet" href="http://localhost/blog/assets/css/style.css">
</head>
<body>

<header>
    <nav>
        <a href="?page=home" style=" color:<?php if($_GET['page']==='home'){echo "green";}else{echo "black";}?>">🏠 Ana Səhifə</a> | 
        <?php if (isset($_SESSION['user_id'])): ?>
            <?php if (($_SESSION['role_name'] ?? $_SESSION['role'] ?? '') === 'admin'): ?>
                <a href="?page=admin_users">👥 İstifadəçilər (Admin)</a> | 
            <?php endif; ?>
                <a href="?page=dashboard">👥Admin Panel</a> | 
            <strong>Sifarişçi: <?php echo htmlspecialchars($_SESSION['name'] ?? ''); ?> (<?php echo htmlspecialchars($_SESSION['role_name'] ?? ''); ?>)</strong> |
            <a href="?page=logout" style="color: red;">❌ Çıxış</a>
        <?php else: ?>
            <a href="?page=login">🔑 Giriş</a> | 
            <a href="?page=register">📝 Qeydiyyat</a>
        <?php endif; ?>
    </nav>
</header>
<hr>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    color: #333;
    line-height: 1.6;
}

/* ==========================================================================
   Header və Naviqasiya Menyusu (Nav) Stilləri
   ========================================================================== */
header {
    background-color: #ffffff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    position: sticky;
    top: 0;
    z-index: 1000;
    padding: 15px 0;
}

header nav {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between; /* Elementləri sağa və sola paylayır */
    gap: 15px;
}

/* Linklərin Ümumi Görünüşü */
header nav a {
    color: #495057;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    padding: 8px 14px;
    border-radius: 6px;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

/* Linklərin Üzərinə Gələndə (Hover) Effekti */
header nav a:hover {
    background-color: #f1f3f5;
    color: #007bff;
}

/* Aktiv İstifadəçi Məlumatı Bloku */
header nav strong {
    font-size: 14px;
    color: #212529;
    background-color: #e9ecef;
    padding: 6px 12px;
    border-radius: 20px;
    font-weight: 600;
    border: 1px solid #dee2e6;
}

/* Admin Düymələrinə Xüsusi Rəng Vurğusu */
header nav a[href*="admin"] {
    color: #6f42c1;
    border: 1px solid rgba(111, 66, 193, 0.2);
}
header nav a[href*="admin"]:hover {
    background-color: #f3f0fc;
    color: #5a32a3;
}

/* Yeni Post Əlavə Et Düyməsi */
header nav a[href*="create-post"] {
    background-color: #28a745;
    color: #ffffff;
}
header nav a[href*="create-post"]:hover {
    background-color: #218838;
    color: #ffffff;
    box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);
}

/* Çıxış Düyməsi */
header nav a[href*="logout"] {
    border: 1px solid rgba(220, 53, 69, 0.2);
}
header nav a[href*="logout"]:hover {
    background-color: #fff5f5;
    color: #dc3545 !important;
}

/* Giriş və Qeydiyyat Düymələri (Qonaqlar üçün) */
header nav a[href*="login"] {
    color: #007bff;
    border: 1px solid #007bff;
}
header nav a[href*="login"]:hover {
    background-color: #007bff;
    color: #ffffff;
}

header nav a[href*="register"] {
    background-color: #007bff;
    color: #ffffff;
}
header nav a[href*="register"]:hover {
    background-color: #0056b3;
}

/* ==========================================================================
   Xırda Kosmetik Düzəlişlər
   ========================================================================== */
/* Köhnə HTML-də qalan şaquli xətləri (|) və <hr> teqini gizlədirik, 
   çünki flexbox dizaynında onlara ehtiyac yoxdur və görünüşü pozurlar */
header nav {
    color: transparent; /* Mətndəki "|" xətlərini görünməz edir */
}
header nav a, header nav strong {
    color: #495057; /* Linklərin və mətnlərin rəngini bərpa edir */
}
body > hr {
    display: none; /* Menyudan sonrakı <hr> xəttini ləğv edir */
}

/* ==========================================================================
   Mobil Uyğunluq (Responsive Design)
   ========================================================================== */
@media (max-width: 768px) {
    header nav {
        flex-direction: column; /* Mobildə menyu elementləri alt-alta düzülür */
        text-align: center;
        justify-content: center;
        padding: 10px;
    }
    header nav a, header nav strong {
        width: 100%; /* Düymələr mobildə tam eni tutur */
        justify-content: center;
    }
}
</style>