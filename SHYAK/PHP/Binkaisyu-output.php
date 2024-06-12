<?php
session_start(); // セッションを開始
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Binkaisyu.css">
</head>
<body>
    <br>
    <div class="container">
        <!-- ✘ボタン -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="col-10">
                    <br>
                    <button type="submit" class="tuhou">
                        </button>
                    <a href="top.php">
                        <button type="submit" class="batu">
                        </button></a>
                        
                    
                </div>
            </div>
        </div>
        <br>
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
