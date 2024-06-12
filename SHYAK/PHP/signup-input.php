<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サインアップ</title>
    <link rel="stylesheet" href="../CSS/signup-input.css">
</head>
<body>
    <?php
        if(isset($_GET['signup']) && $_GET['signup'] == 'sameUser'){
            echo '<script>alert("同じユーザーが存在します");</script>';
        }else if(isset($_GET['signup']) && $_GET['signup'] == 'sameName'){
            echo '<script>alert("その名前は既に使用されています");</script>';
        }else if(isset($_GET['data']) && $_GET['data'] == 'notEnough'){
            echo '<script>alert("必須項目が未入力です");</script>';
        }
    ?>
    <div id="app">
        <form @submit="submitForm" action="./signup-output.php" method="POST">
            <!-- 言語選択 -->
            <div id="Language-Choice">
                <select name="choice" class="LanguageChoice" required>
                    <option disabled selected>Language Choice</option>
                    <option value="jp">日本語</option>
                    <option value="en">English</option>
                    <option value="ru">русский язык</option>
                    <option value="pt">português</option>
                    <option value="fr">français</option>
                    <option value="cn">中文</option>
                </select>
            </div>

            <!-- ユーザー名入力 -->
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
                <button type="submit" id="register-button" :disabled="!isSamePass">Register</button>
            </div>
        </form>
    </div>
    
    <!-- 戻るボタン -->
    <button class="back-button" onclick="goBack()">ログインページへ戻る</button>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.11/dist/vue.js"></script>
    <script src="../JavaScript/pass-check.js"></script>
    <script src="../JavaScript/admin_sinup.js"></script>

</body>
</html>
