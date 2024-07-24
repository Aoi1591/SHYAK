<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/humburger.css">
    <title>Choose your language</title>
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Chooseyourlanguage.css">
</head>
<body>
<?php 
   //require 'menu-humburger.php';
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
            <button type="submit" name="language" value="ja">
                <img src="../img/日本.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "日本語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
        <div class="FR">
            <button type="submit" name="language" value="fr">
                <img src="../img/フランス.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "フランス語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
        <div class="RU">
            <button type="submit" name="language" value="ru">
                <img src="../img/ロシア.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "ロシア語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
        <div class="CN">
            <button type="submit" name="language" value="zh-Hans">
                <img src="../img/中国.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "簡体中国語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
        <div class="EN">
            <button type="submit" name="language" value="en">
                <img src="../img/アメリカ.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "英語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
        <div class="PT">
            <button type="submit" name="language" value="pt">
                <img src="../img/ブラジル.png" class="kokki">
                <?php
                    $translator = new Translator();
                    $originalText = "ポルトガル語";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo "<span>".$translatedText."</span>";
                ?>
            </button>
        </div>
    </form>
</div>
    <script src="../JavaScript/hamburger.js"></script>
</body>
</html>