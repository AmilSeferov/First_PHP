<?php
require_once __DIR__ . "/../../config/db.php";
if(isset($_GET['id'])){
    $stmt= $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute(['id'=>$_GET['id']]);
}
header("Location:?page=admin_users");