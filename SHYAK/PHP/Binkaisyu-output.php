<?php
session_start(); // セッションを開始
require 'connect.php';
$pdo = new PDO($connect, USER, PASS); // データベース接続を確立
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// POSTでデータが送られてきた場合に処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POSTデータからユーザー名とメッセージを取得
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : 'Unknown';
    $message = isset($_POST['user_message']) ? $_POST['user_message'] : '';

    // セッション変数にデータを保存
    $_SESSION['user_name'] = $userName;
    $_SESSION['user_message'] = $message;

    // 次のページへリダイレクト
// user_messageの内容をURLエンコード
    $sent_id = urlencode($_GET["sent_id"]);

    // リダイレクト先のURLを生成
    $url = 'Binkaisyu-input2.php?sent_id='.$sent_id;
    // リダイレクト
    header('Location: ' . $url);
    exit();
}

// フォームデータがない場合、エラー処理や初期ページ表示などの処理をここに記述
?>
