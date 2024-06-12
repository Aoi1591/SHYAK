<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['Admin']); // セッションの初期化
    try{
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('select admin_id from Admins where admin_name = ?');
        $sql->execute([$_POST['adminname']]);
        foreach ($sql as $row) {
            $adminId = $row['admin_id'];
            // パスワードを取得するクエリを修正
            $sql_pass = $pdo->prepare('select hass_pass from AdminPass where admin_id = ?');
            $sql_pass->execute([$adminId]);
            $pass_row = $sql_pass->fetch(PDO::FETCH_ASSOC);
            if ($pass_row && password_verify($_POST['password'], $pass_row['hass_pass'])) {
                // 認証成功
                echo '成功';
                $_SESSION['Admin'] = [
                    'id' => $adminId,
                    'adminname' => $_POST['adminname'],
                ];
            } else {//ユーザー認証できなかった時の処理
                header("Location: ./admin_login_input.php?flag=miss");
                exit;
            }
        }
        if (isset($_SESSION['Admin'])) {
            header("Location: ./admin-input.php");
            echo 'aoi';
            exit;
        }else{
            echo 'errro';
        }
    }catch(Exception $e){
        echo '<script>alert("エラーが発生しました")</script>'. htmlspecialchars($e->getMessage());
        header("Location:./admin_login_input.php?flag=fail");
        exit;
    }
?>