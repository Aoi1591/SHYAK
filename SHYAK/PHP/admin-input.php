<?php session_start();?>
<?php 
  require 'connect.php';
  require 'header.php';
  require 'api.php';
?>

<link rel="stylesheet" href="../CSS/humburger.css">
<title> 管理者画面 </title>
<link rel="stylesheet" href="../css/admin_input.css">
</head>

<body>
<?php //require 'admin-humburger.php';?>
<?php
  echo '<div class = title>';
  echo  '<p>管理者ページ</p>';
  echo '</div>';
  
  $pdo = new PDO($connect,USER,PASS);
  $sql = $pdo -> prepare('select admin_name from Admins WHERE admin_id=? ');
  $sql -> execute([$_SESSION['Admin']['id']]);
  $row = $sql->fetch(PDO::FETCH_ASSOC);
  
  //管理者の名前の表示
  echo '<div class = name>';
  echo '<p>',$row['admin_name'],'</p>';
  echo '</div>';

  //ユーザー一覧の表示
  echo '<div calss = uzer >';
  echo '<p>ユーザー一覧</p>';
  try{
    $User_sql = 'select * from Users'; 
    $stmt = $pdo -> query($User_sql);


    echo "<div table=table='1'>";
    foreach( $stmt as $row){
      echo '<tr>';
      echo '<th>ID</th>','<th>アイコン</th>','<th>国籍</th>',
           '<th>名前</th>','<th></th>';
      echo "</div class=table>";
      echo '<tr>';
      echo '<th>';
       $id = $row['user_id'];
      echo '</th>';
      echo '<th>';
       $icon = $row['icon'];
      echo '</th>';
      echo '<th>';
       $name = $row['user_name'];
      echo '</th>';
      echo '<th>';
       $country = $row['country_id'];
      echo '</th>';
       echo '<div class = user-info>';
       echo $row['user_id'];//ID
       echo $row['icon'];//アイコン
       echo $row['country_id'];//国籍
       echo $row['user_name'];//名前
       /*echo $row[''];//報告件数*/
       //報告されたメッセージの確認ボタン
       //urlencodeでadmin_messageにIDを飛ばしている
       echo '<a href="admin_message.php?id='.urlencode($id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">確認</a>';
       echo '</div>';
    }



  }catch(PDOException $e){
   exit('データベースに接続できませんでした' .$e -> getMessage());
  }
  echo '</div>';


?>