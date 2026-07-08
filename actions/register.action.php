<?php
 require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $password=password_hash(trim($_POST['password']),PASSWORD_BCRYPT);
   $stmt=$pdo->prepare("INSERT INTO users(name,email,password) VALUES (:name,:email,:password)");
   $stmt->execute([
    "name"=>$name,
    "email"=>$email,
    "password"=>$password
   ]);
  redirect('login','Qeydiyyatdan keçdiniz');
    
}
?>
