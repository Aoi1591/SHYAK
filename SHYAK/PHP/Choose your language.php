<?php
    require 'header.php';
?>
    <title>Choose your language</title>
    <link rel="stylesheet" href="../css/Chooseyourlanguage.css">
</head>
<body>
    <div id="content">
        <h1>Choose your language</h1>
    
        <h1 style="margin:13%;">この瓶でよろしいですか？</h1>
        <form action="top.php"method="post">
        <input type="submit" value="はい"style="margin-right: 15%;font-size: 40px;">
        <button type="button" class="button-link" onclick="goback()"style="margin-left: 15%;font-size: 40px;">いいえ</button>
        </form>
    </div>
    <script src="../js/Choose your laguage.js"></script>
</body>
</html>
