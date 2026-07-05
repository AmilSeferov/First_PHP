<?php
require_once __DIR__ . '/../../config/db.php';

$search = trim($_GET['search'] ?? '');

if ($search !== '') {
    $stmt = $pdo->prepare("SELECT users.*, roles.role_name as role_name FROM users JOIN roles ON users.role_id = roles.id WHERE users.name LIKE :search OR users.email LIKE :search");
    $stmt->execute([':search' => "%$search%"]);
} else {
    $stmt = $pdo->prepare("SELECT users.*, roles.role_name as role_name FROM users JOIN roles ON users.role_id = roles.id");
    $stmt->execute();
}
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Bütün rolları bazadan çəkirik (select dropdown üçün)
$rolesStmt = $pdo->query("SELECT * FROM roles");
$all_roles = $rolesStmt->fetchAll(PDO::FETCH_ASSOC);