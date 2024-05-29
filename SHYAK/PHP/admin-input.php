<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>

<link rel="stylesheet" href="../CSS/humburger.css">
<title> 管理者画面 </title>
</head>

<body>
<?php //require 'admin-humburger.php';?>
<?php
  echo '<div class = title>';
  echo  '<p>管理者ページ</p>';
  echo '</div>';
  
  $pdo = new PDO($connect,USER,PASS);
  $sql = $pdo -> prepare('select admin_name from Admins WHERE admin_id=? ');
  $sql -> execute([$_SESSION['Admin']['admin_id']]);
  $row = $sql->fetch(PDO::FETCH_ASSOC);
  
  //名前の表示
  echo '<div class = name>';
  echo '<p>',$row['admin_name'],'</p>';
  echo '</div>';

  //ユーザー一覧の表示
  echo '<div calss = uzer >';
  echo '<p>ユーザー一覧</p>';
  try{
    $pdo = new PDO($connect,USER,PASS);
    $sql = 'select * from Users'; 
    $stmt = $pdo -> query($sql);

    foreach( $stmt as $row){
       echo $row['user_id'];//ID
       /*echo $row['icon'];//アイコン*/
       echo $row['countyr_id'];//国籍
       echo $row['user_name'];//名前
       /*echo $row[''];//報告件数*/
       echo '<a href="admin_message.php">確認</a>';//報告されたメッセージの確認ボタン
    }
  }catch(PDOException $e){
   exit('データベースに接続できませんでした' .$e -> getMessage());
  }
  echo '</div>';





?>