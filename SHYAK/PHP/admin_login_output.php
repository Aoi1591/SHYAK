<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['Admin']); // セッションの初期化
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select admin_id from Admins where admin_name = ?');
    $sql->execute([$_POST['adminname']]);
    foreach ($sql as $row) {
        $adminId = $row['admin_id'];
        
        // パスワードを取得するクエリを修正
        $sql_pass = $pdo->prepare('select hash_pass from AdminPass where admin_id = ?');
        $sql_pass->execute([$adminId]);
        $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);

        if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass'])) {
            // 認証成功
            $_SESSION['Admin'] = [
                'id' => $adminId,
                'adminname' => $_POST['admin_name']
            ];
        }
    }
    if (isset($_SESSION['Admin'])) {
        header("Location: ./admin-input.php");
        exit;
    } else {
        header("Location: ./admin_login_input.php?flag=fail");
        exit;
    }
?>