<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>サインアップ</title>
    </head>
    <body>
    <script src="../JavaScript/signup-input.js"></script>
         <form action ="signup-output.php" method="post">
            <select name="choice" value="Language Choice">
                <option disabled selected>Language Choice</option>
                <option value = "Japanease">日本語</option>
                <option value = "English">English</option>
                <option value = "Russian"> русский язык</option>
                <option value = "Portuguese">português</option>
                <option value = "French">français</option>
                <option value = "Chinese">中文</option>
            </select>    
            <input type="text" id="username" name="username" placeholder="USERNAME" required><br>
            <input type="password" id="password" name="password" placeholder="PASSWORD" required><br>
            <input type="password" id="re-enter-password" name="re-enter-password" placeholder="RE-ENTER-PASSWORD" required><br>
            <input type="submit" value="Register">
        </form>
        <button class="back-button" onclick="goBack()">🔙</button>
    </body>
</html>