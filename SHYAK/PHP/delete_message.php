<?php session_start();?>
<?php require 'connect.php';?>

<?php
  
  //パラメーターから取得
  $message_id = issset($_GET['id']) ? $_GET['id'] : null;

  try{
    $pdo = new PDO($connect,USER,PASS);
    $ssql = "delete from Sents where sent_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$message_id]);

    //削除成功
    header("Location: admin_message.php")
    exit();
  }catch(PDOException $e){
    //エラー発生
    echo 'エラー：' ,$e->getMessage();
  }
  ?>
  
  