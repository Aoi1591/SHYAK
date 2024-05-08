<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<h2 class="text-center mt-5">この内容でよろしいですか？</h2>
<?php
            if(isset($_POST['a'])) {
                $a = $_POST['a'];
                echo '<div class="text-center">';
                echo "<p>入力された内容<br>$a</p>";
            }
            ?>
            <div class="row justify-content-center">
            
            <div class="col-6">
<a href="top.php">
<button type="submit" class="btn btn-outline-dark userinfoButton">はい<br>
</button>
</a>
</div>
            <div class="col-6">
<a href="Binnagasu-input.php">
<button type="submit" class="btn btn-outline-dark userinfoButton">いいえ<br>
</button>
</a>
</a>

        </div>
    </div>
</body>
</html>