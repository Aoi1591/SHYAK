<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>



   <link rel="stylesheet" href="../CSS/humburger.css">
   </head>
   <body>
   <?php require 'menu-humburger.php';?>
   <?php
      
      echo '<img src = "">'; //friendマークの画僧挿入

      $pdo = new PDO($connect,USER,PASS);
      $sql = $pdo-> prepare('select admin_name from Admins WHERE admin_id = ?');
      $sql -> execute([$_SESSION['Admins']['admin_id']]);
      $row = $sql->fetch(PDO::FEATCH_ASSOC);

      //フレンド一覧の表示
      echo '<div class = uzer>';
      try{
        $User_sql = 'select * from '//フレンド探す
        $stmt = $pdo -> query($User_sql);
        foreach($stmt as $row)
      }



