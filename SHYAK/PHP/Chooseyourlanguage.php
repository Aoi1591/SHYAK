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
   require 'api.php';
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
            <img src="../img/日本.png" class="kokki">
            <button type="submit" name="language" value="ja">
                <?php
                    $translator = new Translator();
                    $originalText = "日本語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
        <div class="FR">
        <img src="../img/フランス.png" class="kokki">
            <button type="submit" name="language" value="fr">
                <?php
                    $translator = new Translator();
                    $originalText = "フランス語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
        <div class="RU">
        <img src="../img/ロシア.png" class="kokki">
            <button type="submit" name="language" value="ru">
                <?php
                    $translator = new Translator();
                    $originalText = "ロシア語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
        <div class="CN">
        <img src="../img/中国.png" class="kokki">
            <button type="submit" name="language" value="zh-Hans">
                <?php
                    $translator = new Translator();
                    $originalText = "簡体中国語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
        <div class="EN">
        <img src="../img/アメリカ.png" class="kokki">
            <button type="submit" name="language" value="en">
                <?php
                    $translator = new Translator();
                    $originalText = "英語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
        <div class="PT">
        <img src="../img/ブラジル.png" class="kokki">
            <button type="submit" name="language" value="pt">
                <?php
                    $translator = new Translator();
                    $originalText = "ポルトガル語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </button>
        </div>
    </form>
</div>
    <script src="../JavaScript/hamburger.js"></script>
</body>
</html>