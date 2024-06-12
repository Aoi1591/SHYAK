<?php
session_start(); // セッションを開始
require 'connect.php'; // データベース接続
$pdo = new PDO($connect, USER, PASS); // データベース接続を確立
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// フォームからのデータがPOSTされたか確認
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recieve_message'])) {
    $recieveText = $_POST['recieve_message']; // ユーザーが入力した返信内容
    $userName = $_SESSION['user_name']; // セッションからユーザー名を取得

    // データベースに返信を保存するクエリ
    $stmt = $conn->prepare("INSERT INTO Recieves (user_name, recieve_message) VALUES (?, ?)");
    $stmt->bind_param("ss", $userName, $recieveText); // 'ss'は2つの文字列型のパラメータを意味する

    // クエリの実行
    if ($stmt->execute()) {
        // 成功した場合、JavaScriptを用いてアラートを表示し、別のページにリダイレクトする
        echo "<script>alert('返信に成功しました。'); window.location.href='top.php';</script>";
    } else {
        // 失敗した場合、エラーメッセージを表示
        echo "<script>alert('返信に失敗しました。'); window.location.href='Binkaisyu-input2.php';</script>";
    }

    $stmt->close(); // ステートメントのクローズ
}
$conn->close(); // データベース接続のクローズ
?>
