<?php session_start();?>
<?php require 'connect.php';?>

<?php
  
  //パラメーターから取得
  $sent_id = issset($_GET['sent_id']) ? $_GET['sent_id'] : null;

  try{
    $pdo = new PDO($connect,USER,PASS);
    $ssql = "delete from Sents where sent_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$sent_id]);

    //削除成功
    header("Location: admin_message.php");
    exit();
  }catch(PDOException $e){
    //エラー発生
    echo 'エラー：' ,$e->getMessage();
  }
  ?>
  
  