<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['User']); // セッションの初期化

    try{
        $pdo = new PDO($connect, USER, PASS);
        echo $_POST['username'];
        echo $_POST['password'];
        $sql = $pdo->prepare('select user_id,country_id from Users where user_name = ?');
        $sql->execute([$_POST['username']]);
        foreach ($sql as $row) {
            echo $row['user_id'];
            echo $row['country_id'];
            $userId = $row['user_id'];
            $lang = $row['country_id'];
            // パスワードを取得するクエリを修正
            $sql_pass = $pdo->prepare('select hash_pass from Password where user_id = ?');
            $sql_pass->execute([$userId]);
            $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);
            if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass'])) {
                // 認証成功
                $_SESSION['User'] = [
                    'id' => $userId,
                    'username' => $_POST['username'],
                    'lang' => $lang
                ];
            } else {//ユーザー認証できなかった時の処理
                header("Location: ./login-input.php?flag=miss");
                exit;
            }
        }
        if (isset($_SESSION['User'])) {
            header("Location: ./top.php");
            exit;
        }
    }catch(Exception $e){
        echo '<script>alert("エラーが発生しました")</script>'. htmlspecialchars($e->getMessage());
        header("Location:./login-input.php?flag=fail");
        exit;
    }
?>