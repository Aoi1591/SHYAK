<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../CSS/login-input.css">
</head>
<body>
    <!-- Login Form Container -->
    <a href="#" id="admin">■</a>
    <form action="login-output.php" method="post">
        <div id="username-all">
            <input type="text" id="username" name="username" placeholder="USER NAME" pattern=".{1,20}" title="1から20文字以内で入力してください"required>
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

    <script>
        document.getElementById('admin').addEventListener('click', function(event) {
            event.preventDefault();
            var userInput = prompt("秘密の質問を入力してください");
            if (userInput) {
                var currentDate = new Date();
                var year = currentDate.getFullYear();
                var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
                var day = ('0' + currentDate.getDate()).slice(-2);
                var secretDate = '' + year + month + day;

                if (userInput === secretDate) {
                    alert("正しい回答です。ログインページにリダイレクトします。");
                    window.location.href = "./admin_login_input.php";
                } else {
                    alert("エラー: 秘密の質問の回答が正しくありません。");
                }
            }
        });
    </script>
</body>
</html>
<style>
html,body {
  overflow-y: hidden;
} 
</style>