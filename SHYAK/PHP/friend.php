<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>



   <link rel="stylesheet" href="../CSS/humburger.css">
   </head>
   <body>
   <?php require 'menu-humburger.php';?>
   <?php
      
      echo '<img src = "">'; //friendマークの画僧挿入
      echo '<a href = "friend.php">フレンドリスト</a>';
      echo '<a href = "friend-requset.php">フレンドリクエスト</a>';


      //フレンド一覧の表示
        echo '<div class = uzer>';
        $pdo = new PDO($connect,USER,PASS);
        $User_sql = $pdo -> prepare ('select friend_id from Friend WHERE user_id = ?');//フレンド探す
        $User_sql -> execute([$_SESSION['Users']['user_id']]);
        $stmt = $pdo -> query($User_sql);

          foreach($stmt as $row){
            $sql =  $pdo -> prepare('select * from Users WHERE user_id = ? && state = ?');
            $sql->execute($row['friend_id'],1);
            $friend_stmt = $pdo -> query($friend_sql);

            echo '<table>';
            echo '<tr><th></th><th>名前</th><th>国籍</th></tr>';
            foreach($friend_stmt as $row){

            $id = $row['user_id'];
            $name = $row['user_name'];

            echo '<tr>';
            /*echo $row['icon'];//アイコン*/
            echo '</tr>';
            echo '<tr>';
            //名前の部分を押したらユーザーページへ遷移
            echo  '<a href = "user.php?id=',urldecode($id),'&name=',urldecode($name),'">',$row['user_name'],'</a>';
            echo '</tr>';
            echo '<tr>';
;           echo $row['countyr_id'];//国籍
            echo '</tr>';
            }
            echo '</table>';
      }



