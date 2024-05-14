<?
    require 'header.php';
?>
<title>Secret</title>
</head>
<body>
    <h1>Secret Question</h1>
    <form action="AdminLogin-check.php" method="post">
        <input type="text" name="secret" id="secret">
        <button type="submit">submit</button>
    </form>
<?
    require 'footer.php';
?>