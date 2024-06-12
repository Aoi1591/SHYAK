<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
    <title>管理者ログイン画面</title>
    <link rel="stylesheet" href="../CSS/login-input.css">
</head>
<body>
<?php
        if(isset($_GET['flag']) && $_GET['flag'] == 'miss'){
            echo '<script>alert("認証に失敗しました。");</script>';
        }else if(isset($_GET['flag']) && $_GET['flag'] == 'fail'){
            echo '<script>alert("エラーが発生しました。");</script>';
        }
    ?>
    <!-- Background Image -->
    <div id="back-ground"></div>

    <!-- Airplane Image -->
    <div class="airplane"></div>

    <!-- Bottles Images -->
    <div class="bottol-1"></div>
    <div class="bottol-2"></div>
    <div class="bottol-3"></div>
    <div class="bottol-4"></div>
    <div class="bottol-5"></div>

    <!-- Login Form Container -->

        <form action="admin_login_output.php" method="post">
            <div id="username-all">
                <input type="text" id="adminname" name="adminname" placeholder="ADMIN NAME" required>
            </div>
            <div id="password-all">
                <input type="password" id="password" name="password" placeholder="PASSWORD" required>
            </div>
            <div id="login-all">
            <button type="submit" id="login-button">LOGIN</button>
            </div>
      </form>

    <!-- Sign-Up Text and Line -->
    <div id="sign-up-container">
        <a href="admin_signup_input.php" id="sign-up">SIGN-UP</a>
        <div class="sign-up-line"></div>
    </div>
</body>
</html>