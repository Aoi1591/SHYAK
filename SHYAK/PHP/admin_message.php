<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>

<link rel="stylesheet" href="../CSS/admin_message.css">
<?php
  
  //admin_input.phpからIDを取得
  $user_id = isset($_GET['id']) ? $_GET['id'] : null;
  $icon = isset($_GET['icon']) ? $_GET['icon'] : null;
  $name = isset($_GET['name']) ? $_GET['name']  : null;
  $country = isset($_GET['country']) ? $_GET['country'] : null;

  echo '</head>';
  echo '<body>';
  echo '<div class=title>';
  echo '<p><font color=#fff>通報メッセージ一覧</font></p>';
  echo '</div>';
  echo 'div class="a">';
  echo '<a href="admin-input.php">';
  echo'<img src="../image/back-btn.png" alt="return">';
  echo '</a>';
  echo'</div>';
  if($user_id){
    echo '<div class="container">';
        echo '<div class="image">';
            echo '<img class="c" src="'.htmlspecialchars($icon, ENT_QUOTES, 'UTF-8') . '" alt="icon" style="width:50px;height:50px;"></img>';
        echo '</div>';
        echo '<div class="text">';
            echo '<h4>ユーザーID:',$user_id,'　　ユーザー:',$name,'　　国籍:',$country,'</h4>';
        echo '</div>';
    echo '</div>';

    //DBの接続
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo -> prepare('select * from Sents WHERE user_name=? AND flag = 1');
    $sql -> execute([$name]);
    //$stmt = $sql->fetch(PDO::FETCH_ASSOC);
   
    


    //テーブルで表示
    echo '<table>';
    echo '<tr><th>ID</th><th>メッセージ内容</th><th>削除</th><th>却下</th></tr>';

    foreach($sql as $row){
      $sent_id = $row['sent_id'];
      echo '<tr>';
      echo '<td>',$row['sent_id'],'</td>';
      echo '<td>',$row['sent_message'],'</td>';
      echo '<td><a class="a" href = "delete_message.php?sent_id='.urlencode($sent_id).'&id='.urlencode($user_id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">削除</a></td>';
      echo '<td><a class="a" href = "rejected_message.php?sent_id='.urlencode($sent_id).'&id='.urlencode($user_id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">却下</a></td>';
      echo '</tr>';
    }
    
    echo '</table>';


  }else{
    echo '<p>必要な情報が指定されていません。</p>';
  }

  ?>
  <?php require 'footer.php';?>
  