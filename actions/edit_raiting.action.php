<?php 
require_once __DIR__ . '/../config/db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){

    $rating_id=$_GET['id'];
    $stmt=$pdo->prepare('SELECT * FROM ratings WHERE id=:id');
    $stmt->execute(['id'=>$rating_id]);
    $rating=$stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($rating)){
        header("Location:?page=home");
        exit();
    }
    if($_SESSION['user_id']!=$rating['user_id']){
        header("Location:?page=home");
        exit();
    }
    $rating_value=trim($_POST['rating_value']);
    $rating_comment=trim($_POST['rating_comment']);
    $stmt=$pdo->prepare('UPDATE ratings SET rating_value=:rating_value, rating_comment=:rating_comment WHERE id=:id');
    $stmt->execute(['rating_value'=>$rating_value,'rating_comment'=>$rating_comment,'id'=>$rating_id]);
    header("Location:?page=show&id=".$rating['blog_id']);
    exit();

} else {

    $rating_id=$_GET['id'] ?? null;
    if(!$rating_id){
        header("Location:?page=home");
        exit();
    }
    $stmt=$pdo->prepare('SELECT * FROM ratings WHERE id=:id');
    $stmt->execute(['id'=>$rating_id]);
    $rating=$stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($rating)){
        header("Location:?page=home");
        exit();
    }
    if($_SESSION['user_id']!=$rating['user_id']){
        header("Location:?page=home");
        exit();
    }

}
    

