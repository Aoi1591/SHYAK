<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../CSS/login-input.css">
    <script>
        function adminLogin(){
            var userInput = prompt("秘密の質問を入力してください");
            if(userInput){
                var form = document.createElement("form");
                form.method = "POST";
                form.action = "admin_login_input.php";

                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "userInput";
                input.value = userInput;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
        }
    }
    </script>
</head>
<body>
    <?php
      if(isset($_GET['logout'])&&$_GET['logout'] == 1){
        echo '<script>';
        echo 'alert("ログアウトしました")';
        echo '</script>';
      }
      ?>

    <!-- Login Form Container -->
        <a href="adminlogin_check.php" id="admin">■</a>
        <form action="login-output.php" method="post">
            <div id="username-all">
                <input type="text" id="username" name="username" placeholder="USER NAME" required>
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
        <a href="signup-input.php" id="sign-up">SIGN-UP</a>
        <div class="sign-up-line"></div>
    </div>
</body>
</html>