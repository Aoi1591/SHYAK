<?php
session_start();
require 'connect.php';  // データベース接続の設定を読み込む

// POSTデータを受け取る
$senderId = $_POST['sender_id'] ?? null; // 送り主の user_id
$sentId = $_POST['sent_id'] ?? null; // 送り先の ID 津田
$userName = $_POST['sender_name'] ?? null; // 送り主の名前
$sentMessage = $_POST['sent_message'] ?? null; // 送られたメッセージ

// 必要なデータが揃っているか確認する
if ($senderId === null || $sentId === null || $userName === null || $sentMessage === null) {
    die('Error: Missing required POST data.');
}

// データベースにデータを挿入
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('INSERT INTO Recieves (user_name, sent_id, sent_message) VALUES (:user_name, :sent_id, :sent_message)');
    $stmt->bindParam(':user_name', $userName); //リプライ者
    $stmt->bindParam(':sent_id', $sentId); //リプライ者
    $stmt->bindParam(':sent_message', $sentMessage);
    $stmt->execute();
    
    // データ挿入後、top.phpにリダイレクト
    header("Location: top.php");
    exit;
} catch (PDOException $e) {
    die('Database error: ' . $e->getMessage());  // エラー処理
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- <h2 class="text-center mt-5">この返事でよろしいですか？</h2> -->
<!-- <div class="row justify-content-center"> -->
    <!-- <div class="col-6"> -->
        <!-- <a href="top.php"> -->
            <!-- <button type="submit" class="btn btn-outline-dark userinfoButton">はい<br></button> -->
        <!-- </a> -->
    <!-- </div> -->
    <!-- <div class="col-6"> -->
        <!-- <a href="Binkaisyu-output.php"> -->
            <!-- <button type="submit" class="btn btn-outline-dark userinfoButton">いいえ<br></button> -->
        <!-- </a> -->
    <!-- </div> -->
<!-- </div> -->
</body>
</html>
