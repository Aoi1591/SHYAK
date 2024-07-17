<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'header.php'; ?>
    <title>Choose your language</title>
    <link rel="stylesheet" href="../CSS/Chooseyourlanguage.css">
</head>
<body>
<?php 
   require 'menu-humburger.php';
   ?>
<div id="content">
    <div style="text-align: center">
        <?php
            $translator = new Translator();
            $originalText = "拾う瓶の言語を選んでください";
            $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
            echo "<h1>".$translatedText."</h1>";
        ?>
    </div>
    <form action="Chooseyourlanguage-output.php" method="post">
        <div class="a">
            <a href="top.php">
                <img src="../image/back-btn.png" alt="return">
            </a>
        </div>
        <div class="jp">
            <button type="submit" name="language" value="ja">日本語</button>
        </div>
        <div class="FR">
            <button type="submit" name="language" value="fr">Français</button>
        </div>
        <div class="RU">
            <button type="submit" name="language" value="ru">Русский</button>
        </div>
        <div class="CN">
            <button type="submit" name="language" value="zh-Hans">中文</button>
        </div>
        <div class="EN">
            <button type="submit" name="language" value="en">English</button>
        </div>
        <div class="PT">
            <button type="submit" name="language" value="pt">Português</button>
        </div>
    </form>
</div>
    <script src="../JavaScript/hamburger.js"></script>
</body>
</html>