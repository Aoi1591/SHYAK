<?php
session_start(); // セッションを開始

// POSTでデータが送られてきた場合に処理
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POSTデータからユーザー名とメッセージを取得
    $userName = isset($_POST['user_name']) ? $_POST['user_name'] : 'Unknown';
    $message = isset($_POST['user_message']) ? $_POST['user_message'] : '';

    // セッション変数にデータを保存
    $_SESSION['user_name'] = $userName;
    $_SESSION['user_message'] = $message;

    // 次のページへリダイレクト
    header('Location: Binkaisyu-input2.php');
    exit();
}

// フォームデータがない場合、エラー処理や初期ページ表示などの処理をここに記述
?>
