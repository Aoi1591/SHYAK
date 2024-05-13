<?php
    $secretDate = date('Ymd');
    if ($_POST['secret'] === $secretDate) {
        header("Location: ./AdminLogin-input.php");
        exit;
    } else {//管理者認証できなかった時の処理
        echo '<script>alert("error");</script>';
        header("Location: ./login.php?flag=fail");
        exit;
    }
?>