<?php
session_start();
require 'connect.php';
echo $_POST['username'], $_POST['password'], $_POST['choice'],'<br>';
try {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['choice'])) { 
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo->prepare('select * from Countries');
        $sql->execute();
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            echo $row['country_id']. "<br>";
            if($row['country_id'] == $_POST['choice']){
                echo "OK";
            }
        }

        // ユーザー名の重複確認
        $sql = $pdo->prepare('select user_id,country_id,user_name from Users where user_name = ? and country_id = ?');
        $sql->execute([$_POST['username'],$_POST['choice']]);
        $existingUser = $sql->fetch(PDO::FETCH_ASSOC);//この時点で、同じユーザー名が存在すればその情報が保持される
        if ($existingUser && $existingUser['user_name'] === $_POST['username']) {
            //言語情報が同じで同名のユーザーが存在した時、パスワードの重複チェック(本当に新規なのか、ログインと勘違いしたのか確認)
            $sql_pass = $pdo->prepare('select hash_pass from Password where user_id = ?');
            $sql_pass->execute($existingUser['user_id']);
            $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);
            if ($pass_row && password_verify($_POST['password'], $pass_row['hash_pass']) && $existingUser['country_id'] === $_POST['choice']) {
                // 認証成功(まったく同じユーザー名とパスワード,言語情報を持つユーザーが存在する)
                echo '<script>alert("ユーザーが既に存在します。");</script>';
                //header('Location: ./signup-input.php');
                exit(); // ここで処理を中断
            }else{
                // ユーザー名は同じだけど、パスワードは違うor言語情報が違う(おそらく新規)
                echo '<script>alert("同じ名前のユーザーが既に存在します。");</script>';
                //header('Location: ./signup-input.php');
                exit(); // ここで処理を中断
            }
        }else{
            // ユーザーが存在しない場合、新規登録
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // 正しいSQLクエリを使用
            $sql = $pdo->prepare('insert into Users (user_name,country_id) values (?,?)');
            $sql->execute([$_POST['username'],$_POST['choice']]);
            // user_idを取得
            $id = $pdo->lastInsertId('user_id');
            // Passテーブルに挿入(パスワードを入れるとこ)
            $sql = $pdo->prepare('insert into Password (user_id, hash_pass) values (?,?)');
            $sql->execute([$id, $hashedPassword]);
            // セッションを設定
            $_SESSION['User'] = [
                'id' => $id,
                'username' => $_POST['username'],
                'lang' => $_POST['choice']
            ];
            // 登録が成功した場合、Chooseyourlangage.php にリダイレクト
            //header('Location: ./Chooseyourlanguage.php');
            exit();
        }
    } else {
        //なぜか入力項目満たしてないのに飛ばされてきたとき
        //header('Location: ./signup-input.php');
        echo '<script>alert("必須項目が未入力です。");</script>';
        exit();
    }   
} catch (PDOException $e) {
    // エラーハンドリング
    //header('Location: ./signup-input.php');
    echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
    exit();
}
?>
