<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者サインアップ</title>
    <link rel="stylesheet" href="../CSS/signup-input.css">
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

    <form action="admin_signup_output.php" method="post">
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

        <!-- 管理者名入力 -->
        <div id="username-all">
            <input type="text" id="username" name="username" placeholder="USERNAME" required>
        </div>
        
        <!-- パスワード入力 -->
        <div id="password-all">
            <input type="password" id="password" v-model="pass1" name="password" :class="{'error-boder' : !isSamePass}" placeholder="PASSWORD" required>
        </div>
        
        <!-- パスワード再入力 -->
        <div id="re-enter-password-all">
            <input type="password" id="re-enter-password" v-model="pass2" name="re-enter-password" :class="{'error-boder' : !isSamePass}" placeholder="RE-ENTER PASSWORD" required>
            <span v-if="!isSamePass" class="error-message">パスワードが一致しません</span>
        </div>
        
        <!-- 登録ボタン -->
        <div id="register-all">
            <button type="submit" id="register-button">Register</button>
        </div>
    </form>
    
    <!-- 戻るボタン -->
    <button class="back-button" onclick="goBack()">ログインページへ戻る</button>
    <script src="../JavaScript/pass-check.js"></script>
    <script src="../JavaScript/signup-input.js"></script>

</body>
</html>