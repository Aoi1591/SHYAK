<?php
    session_start();
    require 'header.php';
?>
    <link rel="stylesheet" href="../CSS/Choose your language.css">
    <title>Choose your language</title>
</head>
<body>
<?php require 'api.php'; ?>

<?php
// 翻訳クラスのインスタンス化
$translator = new Translator();
$originalText = "拾う瓶の言語を選んでください";
$translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
echo "<h1>$translatedText</h1>";

echo '<div style="text-align: center">';
//echo $_SESSION['User']['pick'];
switch($_SESSION['User']['pick']){
    case "ja":
        echo '<img src="../img/日本.png" alt="日本の国旗">';
        break;
    case "en":
        echo '<img src="../img/アメリカ.png" alt="アメリカの国旗">';
        break;
    case "fr":
        echo '<img src="../img/フランス.png" alt="フランスの国旗">';
        break;
    case "pt":
        echo '<img src="../img/ポルトガル.png" alt="ポルトガルの国旗">';
        break;
    case "ru":
        echo '<img src="../img/ロシア.png" alt="ロシアの国旗">';
        break;
    case "zh-Hans":
        echo '<img src="../img/中国.png" alt="中国の国旗">';
        break;
}



// 翻訳するテキスト
$originalText = "この瓶でよろしいですか？";
$translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
echo "<h1>$translatedText</h1>";

// ボタンのテキストも翻訳
$yesText = $translator->translate("はい",$_SESSION['User']['lang']);
$noText = $translator->translate("いいえ",$_SESSION['User']['lang']);
echo "<a href='Binkaisyu-input.php'>$yesText</a>";
echo "<a href='Chooseyourlanguage.php'>$noText</a>";

echo '</div>';
?>
</body>
</html>
<style>
html,body {
  overflow-y: hidden;
} 
</style>