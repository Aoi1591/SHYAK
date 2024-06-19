<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>

<?php
  
  //admin_input.phpからIDを取得
  $user_id = isset($_GET['id']) ? $_GET['id'] : null;
  $icon = isset($_GET['icon']) ? $_GET['icon'] : null;
  $name = isset($_GET['name']) ? $_GET['name']  : null;
  $country = isset($_GET['country']) ? $_GET['country'] : null;

  echo '</head>';
  echo '<body>';
  echo '<p>ID',$id,'</p>';
  if($user_id){
    echo '<p>',$user_id,'  ',$icon,'  ',$name,'  ',$country,'</p>';
    
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
      echo '<td><a href = "delete_message.php?sent_id='.urlencode($sent_id).'&id='.urlencode($user_id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">削除</a></td>';
      echo '<td><a href = "rejected_message.php?sent_id='.urlencode($sent_id).'&id='.urlencode($user_id).'&icon='.urlencode($icon).'&name='.urlencode($name).'&country='.urlencode($country).'">却下</a></td>';
      echo '</tr>';
    }
    
    echo '</table>';


  }else{
    echo '<p>必要な情報が指定されていません。</p>';
  }

  ?>
  <?php require 'footer.php';?>


  