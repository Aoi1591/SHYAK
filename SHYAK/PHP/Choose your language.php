<?php
    require 'header.php';
?>
    <link rel="stylesheet" href="../CSS/Choose your language.css">
    <title>Choose your language</title>
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
$translatedText = $translator->translate($originalText);
echo "<h1>$translatedText</h1>";

// ボタンのテキストも翻訳
$yesText = $translator->translate("はい");
$noText = $translator->translate("いいえ");
echo "<input type='submit' value='$yesText'>";
echo "<a href='Chooseyourlanguage.php'>$noText</a>";

echo '</div>';
?>
</body>
</html>
