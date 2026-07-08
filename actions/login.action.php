<?php

require_once __DIR__ . '/../config/db.php';
// login.action.php
// İstifadəçi daxil olma əməliyyatları burada yazılacaq
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$stmt=$pdo->prepare('SELECT Users.*,roles.role_name as role_name FROM Users JOIN roles ON Users.role_id=roles.id WHERE email=:email');
$stmt->execute(['email'=>$_POST['email']]);
$user=$stmt->fetch();


if($user){
   if(password_verify($_POST['password'], $user['password'])){
   $_SESSION['user_id']=$user['id'];
   $_SESSION['name']=$user['name'];
   $_SESSION['email']=$user['email'];
   $_SESSION['role_name']=$user['role_name'];
   $_SESSION['is_logged_in']=true;
 redirect("home");
   }else{
    $message='Şifrə yalnışdır';
   }
}else {
    $message='Bu email tapılmadı';
}

}

?>
