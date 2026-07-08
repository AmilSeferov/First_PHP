<?php
require_once __DIR__ . '/../config/db.php';
$stmt = $pdo->prepare('SELECT SUM(rating_value) as total_rating, count(rating_value) as total_count,blogs.* FROM blogs left JOIN ratings ON blogs.id=ratings.blog_id  GROUP BY blogs.id ORDER BY id DESC');
$stmt->execute();
$blogs = $stmt->fetchAll();
