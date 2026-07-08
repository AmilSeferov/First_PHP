<?php 
// $pdo=require_once __DIR__ . '/db.php';
function get_by_id($table ,$id){
    $stmt=$pdo->prepare("SELECT * FROM $table WHERE id=:id");
    $stmt->execute(['id'=>$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function redirect($page,$msg=null){
  if($msg!=null){
    echo $msg;
  }
    header("Location: ?page=$page");
    exit();
}
?>