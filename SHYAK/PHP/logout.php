<?php require "header.php";?>
<?php require "connect.php";?>
<?php require "api.php";?>
<title>log out</title>
<link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
 
    <link rel="stylesheet" href="../CSS/logout.css">
</head>
<body>
    <?php
        $translator = new Translator();
        $translatedText = $translator->translate("ログアウトしますか？",$_SESSION['User']['lang']);
        echo "<h1>$translatedText</h1>";
        $yesText = $translator->translate("はい",$_SESSION['User']['lang']);
        $noText = $translator->translate("いいえ",$_SESSION['User']['lang']);
        echo "<a href='logout-output.php' id='yes-button'>",$yesText,"</button>";
        echo "<a href='#' onclick='noevent(event)' id='no-button'>",$noText,"</a>";
    ?> 
    <script src="../JavaScript/logout.js"></script>
</body>
</html>