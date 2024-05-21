<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>

<link rel="stylesheet" href="../CSS/humburger.css">
<title> 管理者画面 </title>
</head>

<body>
<?php require 'admin-humburger.php';?>
<?php
  echo '<div class = title>';
  echo  '<p>管理者ページ</p>';
  echo '</div>';
  
  $pdo = new PDO($connect,USER,PASS);
  $sql = $pdo -> prepare('select admin_name from Admins WHERE admin_id=? ');
  $sql -> execute([$_SESSION['Admin']['admin_id']]);
  $row = $sql->fetch(PDO::FETCH_ASSOC);

  echo '<p>',$row['admin_name'],'</p>';




?>