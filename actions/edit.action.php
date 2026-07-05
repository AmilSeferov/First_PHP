<?php
include_once __DIR__ . '/../config/db.php';

if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    // POST: məlumatları yenilə
    $stmt = $pdo->prepare('UPDATE blogs SET title=:title, excerpt=:excerpt, content=:content WHERE id=:id');
    $stmt->execute([
        'title'   => $_POST['title'],
        'excerpt' => $_POST['excerpt'],
        'content' => $_POST['content'],
        'id'      => $_GET['id']
    ]);
    header('Location:../?page=home');
    exit();

} elseif(isset($_GET['id'])) {
    // GET: veritabanından mövcud məlumatları oxu
    $stmt = $pdo->prepare('SELECT * FROM blogs WHERE id=:id');
    $stmt->execute(['id' => $_GET['id']]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    if($_SESSION['user_id']!=$blog['user_id']){
        header('Location:?page=home');
        exit();
    }
    if(!$blog){
        header('Location:../?page=home');
        exit();
    }
}

?>
