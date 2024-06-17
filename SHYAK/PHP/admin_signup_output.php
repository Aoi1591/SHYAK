<?php
session_start();
require 'connect.php';
try {
    if (isset($_POST['adminname']) && isset($_POST['password'])) { 
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ユーザー名の重複確認
        $sql = $pdo->prepare('SELECT admin_id, admin_name FROM Admins WHERE admin_name = ?');
        $sql->execute([$_POST['adminname']]);
        $existingUser = $sql->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            // ユーザー名が既に存在する場合
            $sql_pass = $pdo->prepare('SELECT hash_pass FROM AdminPass WHERE admin_id = ?');
            $sql_pass->execute([$existingUser['admin_id']]);
            $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);

            if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass'])) {
                // 認証成功(まったく同じユーザー名とパスワード)
                header('Location: ./admin_signup_input.php?signup=sameUser');
                exit();
            } else {
                // ユーザー名は同じだがパスワードが違う
                header('Location: ./admin_signup_input.php?signup=sameName');
                exit();
            }
        } else {
            // 新規登録
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // トランザクションの開始
            $pdo->beginTransaction();

            // Adminsテーブルに挿入
            $sql = $pdo->prepare('INSERT INTO Admins (admin_name) VALUES (?)');
            $sql->execute([$_POST['adminname']]);

            // 挿入されたadmin_idを取得
            $id = $pdo->lastInsertId();

            // AdminPassテーブルに挿入
            $sql = $pdo->prepare('INSERT INTO AdminPass (admin_id, hash_pass) VALUES (?, ?)');
            $sql->execute([$id, $hashedPassword]);

            // コミット
            $pdo->commit();

            // セッション設定
            $_SESSION['Admin'] = [
                'id' => $id,
                'adminname' => $_POST['adminname'],
            ];

            // 登録成功後のリダイレクト
            header('Location: ./admin-input.php');
            exit();
        }
    } else {
        // 必須項目が未入力
        header('Location: ./admin_signup_input.php?data=notEnough');
        exit();
    }
} catch (PDOException $e) {
    // エラーハンドリング
    header('Location: ./admin_signup_input.php?data=DBerror');
    exit();
}
?>
