<?php require "header.php";?>
<?php require "connect.php";?>
<title>管理者ログイン画面</title>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/logout.css">
</head>
<body> 
    <h1>ログアウトしますか？<h1>
        <button onclick="location.href='logout-output.php'" id="yes=button">はい</button>
        <button onclick="noevent()" id="no-button">いいえ</button>
       
    <script src="../JavaScript/logout.js"></script>
</body>
</html>
