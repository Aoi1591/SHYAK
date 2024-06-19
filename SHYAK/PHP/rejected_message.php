<?php session_start();?>
<?php require 'connect.php';?>
<?php
//パラメータから却下するメッセージのIDを取得
$message_id = isset($_GET['sent_id']) ? $_GET['sent_id'] : null;
$user_id = isset($_GET['id']) ? $_GET['id'] : null;
$icon = isset($_GET['icon']) ? $_GET['icon'] : null;
$name = isset($_GET['name']) ? $_GET['name']  : null;
$country = isset($_GET['country']) ? $_GET['country'] : null;
//メッセージIDが指定されているかチェック
if($message_id){
    try{
        //データベースに接続
        $pdo = new PDO($connect,USER,PASS);
        //フラグをリセット
        $sql = $pdo -> prepare("update Sents set flag = 0 WHERE sent_id = ?");
        $sql -> execute([$message_id]);
        //$stmt = $pdo -> prepare($sql);
        //フラグリセットが成功した場合の処理
        header("Location: admin_message.php?id=".urlencode($user_id)."&icon=".urlencode($icon)."&name=".urlencode($name)."&country=".urlencode($country).);
        exit();
        }catch(PDOException $e){
            echo "エラー:" . $e -> getMessage();
        }
}else{
    //メッセージIDが指定されていない場合の処理
    echo"却下するメッセージが指定されていません。";
}
?>