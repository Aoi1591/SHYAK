<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン画面</title>
        <link rel="stylesheet" href="../css/login-input.css">
    </head>
    <body>
        <div id = "container">
            <div id="background">
                <div class="bottol-1"></div>
                <div class="bottol-2"></div>
                <div class="bottol-3"></div>
                <div class="bottol-4"></div>
                <div class="bottol-5"></div>
                <div class="airplane"></div>
            </div>
            <form action = "login-output.php" method="post">

                <div id = "username-all">
                    <div class="username">
                    <input type="text" id="username" name="username" placeholder="USERNAME" required><br>
                    </div>
                </div>

                <div id = "password-all">
                    <div class = "password">
                    <input type="password" id="password" name="password" placeholder="PASSWORD" required><br>
                    </div>
                </div>

                <div id ="login-all"> 
                    <div class="login"> 
                    <input type="submit" value="LOGIN">
                    </div>
                </div>

                <br><br>

            <div id="sign-up">
                <div class="sign-up-line">
                <a href = "../php/sign-up-input.php">sign-up</a>
                </div>
            </div>
            </form>
        </div>
    </body>
</html>