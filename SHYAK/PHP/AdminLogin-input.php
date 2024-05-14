<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>管理者ログイン画面</title>
    </head>
    <body>
        <form action = "AdminLogin-output.php" method="post">
            <input type="text" id="username" name="username" placeholder="USERNAME" required><br>
            <input type="password" id="password" name="password" placeholder="PASSWORD" required><br>
            <input type="submit" value="LOGIN">
            <br><br>

        <button onclick="window.location.href='signup-input.php';">SIGN-UP</button>
        </form>
    </body>
</html>