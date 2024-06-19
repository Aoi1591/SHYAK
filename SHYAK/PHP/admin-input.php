<?php session_start();?>
<?php 
  require 'connect.php';
  require 'header.php';
  require 'api.php';
?>

<link rel="stylesheet" href="../CSS/humburger.css">
<link rel="stylesheet" href="../CSS/admin_input.css">
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


    echo "<table borber='1'>";
    echo '<tr>';
      echo '<th>ID</th>';
      echo '<th>アイコン</th>';
      echo '<th>国籍</th>';
      echo '<th>名前</th>';
      echo '<th> </th>';
      echo '</tr>';
    foreach( $stmt as $row){
      $id = $row['user_id'];
      $icon = $row['icon'];
      $name = $row['user_name'];
      $country = $row['country_id'];
      echo '<th>';
       echo '<td>'.htmlspecialchars($row['user_id'],ENT_QUOTES,'UTF-8').'</td>';
       echo '<td><img src="'.htmlspecialchars($row['icon'], ENT_QUOTES, 'UTF-8') . '" alt="icon" style="width:50px;height:50px;"></td>';
       echo '<td>' . htmlspecialchars($row['user_name'], ENT_QUOTES, 'UTF-8') . '</td>';
       echo '<td>' . htmlspecialchars($row['country_id'], ENT_QUOTES, 'UTF-8') . '</td>';
       echo '<div class = user-info>';
       //echo $row['user_id'];//ID
       //echo $row['icon'];//アイコン
       //echo $row['country_id'];//国籍
       //echo $row['user_name'];//名前
       /*echo $row[''];//報告件数*/
       //報告されたメッセージの確認ボタン
       //urlencodeでadmin_messageにIDを飛ばしている
       echo '<a href="admin_message.php?id='.urlencode($id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">確認</a>';
       echo '</div>';
       echo '</tr>';
    }



  }catch(PDOException $e){
   exit('データベースに接続できませんでした' .$e -> getMessage());
  }
  echo '</div>';


?>