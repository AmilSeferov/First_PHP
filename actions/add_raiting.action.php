<?php
require_once __DIR__ . '/../config/db.php';

if(isset($_POST['blog_id'])&&isset($_POST['rating_value'])){
$blog_id=$_POST['blog_id'];
$rating_value=$_POST['rating_value'];
$rating_comment=$_POST['rating_comment'];
$user_id=$_SESSION['user_id'];
 $stmt=$pdo->prepare("INSERT INTO ratings (user_id,blog_id,rating_value,rating_comment) VALUES (:user_id,:blog_id,:rating_value,:rating_comment)");
 $stmt->execute([
    ':user_id'=>$user_id,
    ':blog_id'=>$blog_id,
    ':rating_value'=>$rating_value,
    ':rating_comment'=>$rating_comment
 ]);
 header("Location:?page=show&id=$blog_id");


}else{
    echo "Xeta bas verdi...";
    header("Location:?page=home");
    exit();
}



?>