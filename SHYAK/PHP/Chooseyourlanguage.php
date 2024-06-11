<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
    <title>Choose your language</title>
    <link rel="stylesheet" href="../CSS/Chooseyourlanguage.css">
</head>

<body>
<div id="content">
<div style="text-align: center">
            <h1>Choose your language</h1>
        </div>
        <form action="Choose your language.php" method="post">
            <div class="a">
                <button type="submit" name="language" value="a">戻る</button>
            </div>
            <div class="jp">
                <button type="submit" name="language" value="jp">日本語</button>
            </div>
            <div class="FR">
                <button type="submit" name="language" value="fr">Français</button>
            </div>
            <div class="RU">
                <button type="submit" name="language" value="ru">Русский</button>
            </div>
            <div class="CN">
                <button type="submit" name="language" value="cn">中文</button>
            </div>
            <div class="EN">
                <button type="submit" name="language" value="en">English</button>
            </div>
            <div class="PT">
                <button type="submit" name="language" value="pt">Português</button>
            </div>
        </form>
    </div>
</body>
</html>