<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['User']); // セッションの初期化
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select id from Users where user_name = ?');
    $sql->execute([$_REQUEST['username']]);
    foreach ($sql as $row) {
        $userId = $row['user_id'];
        
        // パスワードを取得するクエリを修正
        $sql_pass = $pdo->prepare('select hash_pass from Password where user_id = ?');
        $sql_pass->execute([$userId]);
        $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);

        if ($pass_row && password_verify($_REQUEST['password'], $pass_row['hash_pass'])) {
            // 認証成功
            $_SESSION['User'] = [
                'id' => $userId,
                'username' => $_REQUEST['username']
            ];
        }
    }
    if (isset($_SESSION['User'])) {
        header("Location: ./top.php");
        exit;
    } else {
        header("Location: ./login.php?flag=fail");
        exit;
    }
?>