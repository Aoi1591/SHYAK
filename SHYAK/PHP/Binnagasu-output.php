<?php
session_start(); // セッションを開始
require 'connect.php'; // データベース接続ファイルをインクルード

if (isset($_SESSION['User'])) { // ユーザーがログインしているか確認
    try {
        $pdo = new PDO($connect, USER, PASS); // データベース接続を確立
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // セッションからユーザーIDを取得
        $user_id = $_SESSION['User']['user_id'];

        // ユーザーIDを使用してユーザー名を取得
        $stmt = $pdo->prepare('SELECT user_name FROM Users WHERE user_id = ?');
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // ユーザー名を取得
        $user_name = $_SESSION['User']['user_name'];

        // メッセージをデータベースに挿入する準備をする
        $sql = $pdo->prepare('INSERT INTO Sents(user_name, sent_message) VALUES (?, ?)');
        $sql->execute([$user_name, $_POST['sent_message']]); // SQLクエリを実行

        // 成功した場合、top.phpにリダイレクト
        header('Location: ./top.php');
        exit();
    } catch (PDOException $e) {
        // エラーハンドリング
        echo 'データベースエラー: ' . $e->getMessage();
    }
} else {
    // ユーザーがログインしていない場合、アラートを表示し、ログインページにリダイレクト
    echo '<script>alert("Please log in");</script>';
    header('Location: ./login.php');
    exit();
}
?>
