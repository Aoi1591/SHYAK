<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <link rel="stylesheet" href="../css/signup-input.css">
</head>
<body>

    <!-- 背景画像 -->
    <div id="back-ground"></div>

    <!-- 飛行機の画像 -->
    <div class="airplane"></div>

    <!-- 瓶の画像 -->
    <div class="bottol-1"></div>
    <div class="bottol-2"></div>
    <div class="bottol-3"></div>
    <div class="bottol-4"></div>
    <div class="bottol-5"></div>

    <script src="../JavaScript/signup-input.js"></script>

    <form action="signup-output.php" method="post">
        <!-- 言語選択 -->
        <div id="Language-Choice">
            <select name="choice" class="LanguageChoice">
                <option disabled selected>Language Choice</option>
                <option value="Japanese">日本語</option>
                <option value="English">English</option>
                <option value="Russian">русский язык</option>
                <option value="Portuguese">português</option>
                <option value="French">français</option>
                <option value="Chinese">中文</option>
            </select>
        </div>

        <!-- ユーザー名入力 -->
        <div id="username-all">
            <input type="text" id="username" name="username" placeholder="USERNAME" required>
        </div>
        
        <!-- パスワード入力 -->
        <div id="password-all">
            <input type="password" id="password" name="password" placeholder="PASSWORD" required>
        </div>
        
        <!-- パスワード再入力 -->
        <div id="re-enter-password-all">
            <input type="password" id="re-enter-password" name="re-enter-password" placeholder="RE-ENTER PASSWORD" required>
        </div>
        
        <!-- 登録ボタン -->
        <div id="register-all">
            <button type="submit" id="register-button">Register</button>
        </div>
    </form>
    
    <!-- 戻るボタン -->
    <button class="back-button" onclick="goBack()"></button>

    <script src="../js/signup-input.js"></script>

</body>
</html>
