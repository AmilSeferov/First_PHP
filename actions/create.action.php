<?php
require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("INSERT INTO blogs(user_id,title, excerpt, content) VALUES (:user_id,:title, :excerpt, :content)");

    
    $stmt->execute([
        "user_id" => $user_id,
        "title"   => trim($_POST['title']),
        "excerpt" => trim($_POST['excerpt']),
        "content" => trim($_POST['content']),
    ]);


    header("Location: ?page=dashboard");
    exit;
}