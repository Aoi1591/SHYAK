<?php
session_start();
require 'connect.php';
unset($_SESSION['User']); // セッションの初期化

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 入力の検証
    if (empty($_POST['username']) || empty($_POST['password'])) {
        throw new Exception('ユーザー名またはパスワードが空です');
    }

    // ユーザー情報を取得
    $sql = $pdo->prepare('SELECT user_id, country_id FROM Users WHERE user_name = ?');
    $sql->execute([$_POST['username']]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $userId = $row['user_id'];
        $lang = $row['country_id'];

        // パスワードハッシュを取得
        $sql_pass = $pdo->prepare('SELECT hash_pass FROM Pass WHERE user_id = ?');
        $sql_pass->execute([$userId]);
        $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);

        if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass'])) {
            // 認証成功
            $_SESSION['User'] = [
                'id' => $userId,
                'username' => $_POST['username'],
                'lang' => $lang
            ];

            header("Location: ./top.php?lang=" . $_SESSION['User']['lang']);
            exit();
        } else {
            throw new Exception('ユーザー名またはパスワードが無効です');
        }
    } else {
        throw new Exception('ユーザー名またはパスワードが無効です');
    }
} catch (Exception $e) {
    echo '<script>alert("' . $e->getMessage() . '");</script>';
    echo '<script>window.location.href = "login-input.php";</script>';
    exit();
}
?>