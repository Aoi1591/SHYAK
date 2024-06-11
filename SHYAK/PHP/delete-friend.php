<?php session_start();?>
<?php require 'connect.php';?>

<?php
  
  //パラメーターから取得
  $Fid = issset($_GET['Fid']) ? $_GET['Fid'] : null;

  try{
    $pdo = new PDO($connect,USER,PASS);
    $ssql = "delete from Friends where id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$Fid]);

    //削除成功
    header("Location: friend-request.php");
    exit();
  }catch(PDOException $e){
    //エラー発生
    echo 'エラー：' ,$e->getMessage();
  }
  ?>
  