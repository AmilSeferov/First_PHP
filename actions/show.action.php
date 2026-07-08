<?php 
include_once __DIR__ . '/../config/db.php';
if(isset($_GET['id'])){

    $stmt = $pdo->prepare("SELECT b.*,u.name FROM blogs b LEFT JOIN users u ON b.user_id=u.id WHERE b.id=:id");
    $stmt->execute(['id'=>$_GET['id']]);
    $blog=$stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($blog)){
      redirect('home','Bloq tapılmadı!');
    }
    $comments= $pdo->prepare("SELECT c.*,u.name FROM ratings c LEFT JOIN users u ON c.user_id=u.id WHERE c.blog_id=:blog_id");
    $comments->execute(['blog_id'=>$_GET['id']]);
    $comments=$comments->fetchAll(PDO::FETCH_ASSOC);
    
    $has_rated = false;
    if (isset($_SESSION['user_id'])) {
        $check_rating = $pdo->prepare("SELECT COUNT(*) FROM ratings WHERE blog_id=:blog_id AND user_id=:user_id");
        $check_rating->execute(['blog_id'=>$_GET['id'], 'user_id'=>$_SESSION['user_id']]);
        $has_rated = $check_rating->fetchColumn() > 0;
    }
}else{
    $referer = $_SERVER['HTTP_REFERER'] ?? '?page=home';
    header("Location: $referer");
    exit();
}
