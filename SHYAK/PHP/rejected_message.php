<?php session_start();?>
<?php require 'connect.php';?>

<?php

//パラメータから却下するメッセージのIDを取得
$message_id = isset($_GET['id']) ? $_GET['id'] : null;

//メッセージIDが指定されているかチェック
if($message_id){
    try{
        //データベースに接続
        $pdo = new PDO($connect,USER,PASS);

        //フラグをリセット
        $sql = "UPDATE Sents SET report_flag = 0 WHERE sent_id = ?";

        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$message_id1]);

        //フラグリセットが成功した場合の処理
        header("Location : admin?message.php");
        exit();
        }catch(PDOException $e){
            echo "エラー:" . $e -> getMessage();

        }
}else{
    //メッセージIDが指定されていない場合の処理
    echo"却下するメッセージが指定されていません。";
}