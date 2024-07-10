<?php
session_start();
require 'connect.php';  // データベース接続の設定を読み込む

// POSTデータを受け取る
$senderId = $_POST['sender_id']; // 送り主の user_id
$userName = $_POST['sender_name']; // 送り主の名前
$sentId = $_POST['sent_id']; // 送り先の ID
$sentMessage = $_POST['sent_message']; // 送られたメッセージ

// データベースにデータを挿入
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO Recieves (recieve_id, user_name, sent_id, sent_message) VALUES (:recieve_id, :user_name, :sent_id, :sent_message)');
    $stmt->bindParam(':recieve_id', $senderId);
    $stmt->bindParam(':user_name', $userName);
    $stmt->bindParam(':sent_id', $sentId);
    $stmt->bindParam(':sent_message', $sentMessage);
    $stmt->execute();
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());  // エラー処理
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center mt-5">この返事でよろしいですか？</h2>
<div class="row justify-content-center">
    <div class="col-6">
        <a href="top.php">
            <button type="submit" class="btn btn-outline-dark userinfoButton">はい<br></button>
        </a>
    </div>
    <div class="col-6">
        <a href="Binkaisyu-output.php">
            <button type="submit" class="btn btn-outline-dark userinfoButton">いいえ<br></button>
        </a>
    </div>
</div>
</body>
</html>
