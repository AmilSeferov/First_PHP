<?php
require_once __DIR__ . '/../config/db.php';

$user_id = $_SESSION['user_id'];
if (isset($_GET['id']) && $user_id) {
    $stms=$pdo->prepare('SELECT * FROM blogs WHERE id=:id');
    $stms->execute(['id' => $_GET['id']]);
    $blog = $stms->fetch(PDO::FETCH_ASSOC);
    if($_SESSION['user_id']!=$blog['user_id']){
        header('Location:?page=home');
        exit();
    }
    $stms=$pdo->prepare('DELETE FROM blogs where id=:id and user_id=:user_id');
    $stms->execute(['id'=>$_GET['id'], 'user_id'=>$user_id]);
    header('Location: ?page=dashboard');
    exit();








}