<?php 
require_once __DIR__ . '/../config/db.php';

if(isset($_GET['id'])){
$id=$_GET['id'];
$blog_id=$_GET['blog_id'];
$stmt=$pdo->prepare("DELETE FROM ratings WHERE id=:id");
$stmt->execute([':id'=>$id]);
header("Location:?page=show&id={$blog_id}");
}

    