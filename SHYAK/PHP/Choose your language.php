<?php
    //session_start();
    require 'header.php';
?>
    <link rel="stylesheet" href="../CSS/Choose your language.css">
    <title>Choose your language</title>
    <link rel="stylesheet" href="../CSS/Chooseyourlanguage.css">
</head>
<body>
<?php require 'api.php'; ?>

<?php
echo '<div style="text-align: center">';
echo '<h1>Choose your language</h1>';

// 翻訳クラスのインスタンス化
$translator = new Translator();

// 翻訳するテキスト
$originalText = "この瓶でよろしいですか？";
$translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
echo "<h1>$translatedText</h1>";

// ボタンのテキストも翻訳
$yesText = $translator->translate("はい",$_SESSION['User']['lang']);
$noText = $translator->translate("いいえ",$_SESSION['User']['lang']);
echo "<input type='submit' value='$yesText'>";
echo "<a href='Chooseyourlanguage.php'>$noText</a>";

echo '</div>';
?>
</body>
</html>
