<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>

<?php
  
  //admin_input.phpからIDを取得
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  $name = isset($_GET['name']) ? $_GET['name']  : null;
  $country = isset($_GET['country']) ? $_GET['country'] : null;

  echo '</head>';
  echo '<body>';
  
  if($id){
    echo '<p>',$id,'  ',$name,'  ',$country,'</p>';
    
    //DBの接続
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo -> prepare('select * from Sents WHERE user_name=? ');
    $sql -> execute([$name]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $stmt = $pdo -> query($sql);
    


    //テーブルで表示
    echo '<table>';
    echo '<tr><th>ID</th><th>メッセージ内容</th><th>削除</th><th>却下</th></tr>';

    foreach($stmt as $row){
      $sent_id = $row['sent_id'];
      echo '<tr>';
      echo '<td>',$row['sent_id'],'</td>';
      echo '<td>',$row['set_message'],'</td>';
      echo '<td><a href = "delete_message.php?id='urlencode($sent_id),'">削除</a></td>';
      echo '<td><a href = "rejected_message.php?id='urldecode($sent_id),'">却下</a></td>';
      echo '</tr>';
    }
    
    echo '</table>';


  }else{
    echo '<p>必要な情報が指定されていません。</p>';
  }

  ?>
  <?php require 'footer.php';?>


  