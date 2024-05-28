<?php
    require 'header.php';
?>
    <title>Choose your language</title>
    <link rel="stylesheet" href="../css/Chooseyourlanguage.css">
</head>
<body>
<?php require 'api.php'; ?>

<?php
echo '<div style="text-align: center">';
echo '<div id="header">';
echo '<h1>Choose your language</h1>';

// 翻訳クラスのインスタンス化
$translator = new Translator();

// 翻訳するテキスト
$originalText = "この瓶でよろしいですか？";
$translatedText = $translator->translate($originalText);
echo '<div id="content">';
echo "<h1>$translatedText</h1>";

// ボタンのテキストも翻訳
$yesText = $translator->translate("はい");
$noText = $translator->translate("いいえ");
echo "<a href='Binkaisyu-input.php'>$yesText</a>";
echo "<a href='Chooseyourlanguage.php'>$noText</a>";
echo '</div>';
echo '</div>';
echo '</div>';
?>
</body>
</html>
