<?php
require_once __DIR__ . '/../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? null;
    $role_id = $_POST['role_id'] ?? null;

    if ($user_id && $role_id) {
        try {
            $stmt = $pdo->prepare("UPDATE users SET role_id = :role_id WHERE id = :user_id");
            $stmt->execute([
                ':role_id' => $role_id,
                ':user_id' => $user_id
            ]);
        } catch (PDOException $e) {

        }
    }
}
header('Location: ?page=admin_users');
exit;
