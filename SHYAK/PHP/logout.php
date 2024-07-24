<?php
    session_start();
    require "header.php";
    require "connect.php";
    require "api.php";
?>
<title>log out</title>
<link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
 
    <link rel="stylesheet" href="../CSS/logout.css">
</head>
<body>
    <?php
        //var_dump($_SESSION);
        $translator = new Translator();
        $translatedText = $translator->translate("ログアウトしますか？",$_SESSION['User']['lang']);
        echo "<h1>$translatedText</h1>";
        $yesText = $translator->translate("はい",$_SESSION['User']['lang']);
        $noText = $translator->translate("いいえ",$_SESSION['User']['lang']);
        echo "<div id='logout'>";
        echo "<a href='logout-output.php' id='yes-button'>",$yesText,"</button>";
        echo "<a href='#' onclick='noevent(event)' id='no-button'>",$noText,"</a>";
        echo "</div>";
        echo "<div id='confirmationDialog' style='position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 1000;'>";
        echo "<div id='confirmationDialogCon' class='dialog-content' style='background: rgb(255, 244, 185); border-radius: 20px; padding: 7%; text-align: center; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 10px; display: none;'>";
        echo "<label>ログアウトしました</label>";
        echo "<button id='ok' type='submit' >OK</button>";
        echo "</div>";
        echo "</div>";
    ?> 
    <script src="../JavaScript/logout.js"></script>
</body>
</html>