<?php
session_start();
require 'connect.php';
try {
    if (isset($_POST['adminname']) && isset($_POST['password'])) { 
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // ユーザー名の重複確認
        $sql = $pdo->prepare('select admin_id,admin_name from Admins where user_name = ? ');
        $sql->execute([$_POST['adminname']]);
        $existingUser = $sql->fetch(PDO::FETCH_ASSOC);//この時点で、同じユーザー名が存在すればその情報が保持される
        if ($existingUser && $existingUser['admin_name'] === $_POST['adminname']) {
            //同名のユーザーが存在した時、パスワードの重複チェック(本当に新規なのか、ログインと勘違いしたのか確認)
            $sql_pass = $pdo->prepare('select hash_pass from ADminPass where admin_id = ?');
            $sql_pass->execute([$existingUser['admin_id']]);
            $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);//当該ユーザーのidから保存されているパスワードを取得。新規の場合nullが返る
            if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass'])) {
                // 認証成功(まったく同じユーザー名とパスワード,言語情報を持つユーザーが存在する)
                header('Location: ./admin_signup_input.php?signup=sameUser');
                exit(); // ここで処理を中断
            }else{
                // ユーザー名は同じだけど、パスワードは違う(おそらく新規)
                header('Location: ./admin_signup_input.php?signup=sameName');//うまくこのフラグ付与されてないけどいったん放置！！　リダイレクトはされるよ！
                exit(); // ここで処理を中断
            }
        }else if ($existingUser && $existingUser['user_name'] === $_POST['username'] && $existingUser['country_id'] !== $_POST['choice']){
            // ユーザー名は同じだけど言語情報が違う
            header('Location: ./signup-input.php?signup=sameName');
            exit(); // ここで処理を中断
        }else{
            // ユーザーが存在しない場合、新規登録
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // 正しいSQLクエリを使用
            $sql = $pdo->prepare('insert into Admins (admin_name) values (?)');
            $sql->execute([$_POST['adminname']]);
            // user_idを取得
            $id = $pdo->lastInsertId('admin_id');
            // Passテーブルに挿入(パスワードを入れるとこ)
            $sql = $pdo->prepare('insert into AdminPass (admin_id, hash_pass) values (?,?)');
            $sql->execute([$id, $hashedPassword]);
            // セッションを設定
            $_SESSION['Admin'] = [
                'id' => $id,
                'adminname' => $_POST['adminname'],
            ];
            // 登録が成功した場合、Chooseyourlangage.php にリダイレクト
            header('Location: ./admin-input.php');
            exit();
        }
    } else {
        //なぜか入力項目満たしてないのに飛ばされてきたとき
        header('Location: ./admin_signup_input.php?data=notEnough');
        exit();
    }   
} catch (PDOException $e) {
    // エラーハンドリング
    header('Location: ./admin_signup_input.php?data=DBerror');
    exit();
}
?>
