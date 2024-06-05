<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../css/UserPage.css">
</head>
<body>

<form method="POST" action="mypage-connect.php">
            <select name="language" id="LanguageChoice-all" class="LanguageChoice">
                <option disabled selected>Language Choice</option>
                <option value="Japanese">日本語</option>
                <option value="English">English</option>
                <option value="Russian">русский язык</option>
                <option value="Portuguese">português</option>
                <option value="French">français</option>
                <option value="Chinese">中文</option>
            </select>
            <div class="header back-box">
                <button id="backButton" type="button">戻る</button>
            </div>


<!--<form action="process.php" method="post">
    //<label for="language">言語の選択:</label>
    <select id="language" name="language">
        <option value="日本語">言語の選択</option>
        <option value="日本語">日本語</option>
        <option value="英語">英語</option>
        <option value="その他">その他</option>
    </select>
    <input type="submit" value="戻る">
    <br><br>
-->
    <input type="submit"  id="LanguageChoice-a" class="LanguageChoice-a" value="フレンド追加">
    <!--<div class="user-name"style="text-align: center">
    <label for="username">ユーザーネーム:</label>
    <input type="text" id="username" name="username">
    <br><br>

    <label for="message">メッセージ:</label><br>
    <div class="textarea">
  <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

  </div></div>

    
</form>
-->

<div class="profile-box">
                <input type="file" id="fileInput" style="display: none;" />
                <img src="../img/zilyozilyo.jpg" id="image" alt="クリックしてファイルを選択">
                <div id="name" class="editable" contenteditable="true">名前をクリック</div>
                <input type="hidden" name="name" id="nameInput">
            </div>
            <div class="description-box">
                <div class="intro-title">［自己紹介文］</div>
                <div id="description" class="description editable" contenteditable="true">お前にとってのここぞという瞬間は……今だった。</div>
                <input type="hidden" name="description" id="descriptionInput">
            </div>
            <div id="confirmationDialog" style="display: none;">
                <p>変更を保存しますか？</p>
                <button id="confirmYes" type="submit">はい</button>
                <button id="confirmNo" type="button">いいえ</button>
            </div>
        </form>
    <script src="../js/Userpage.js"></script>

</body>
</html>