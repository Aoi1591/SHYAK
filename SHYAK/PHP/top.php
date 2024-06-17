<?php require 'header.php' ;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../CSS/humburger.css">
    <link rel="stylesheet" href="../CSS/top.css">
</head>
<body>
<?php
require 'menu-humburger.php';
require 'api.php';
require 'CheckMessage.php';


?>
<!--瓶 -->
<img id="img_bin1" src="../image/瓶.png" alt="瓶">
<img id="img_bin2" src="../image/瓶.png" alt="瓶">
<img id="img_bin3" src="../image/瓶.png" alt="瓶">
<img id="img_bin4" src="../image/瓶.png" alt="瓶">
<img id="img_bin5" src="../image/瓶.png" alt="瓶">
    <div class="container">

    <!-- 本ボタンを左下に配置 -->
        <div class="row justify-content-start">
            <div class="col-12 col-md-10">
                <a href="Morattahenji.php">
                <br>
                <?php

                    $translator = new Translator();
                    $originalText = "本";
                    $originalText = $translator->translate($originalText);
                    echo '<button type="submit" class="btn btn-outline-dark userinfoButton bg-light"><br>'. $originalText.'</button>';
                    session_start();
                    $userId = $_SESSION['user_id'];//ユーザ―idからセッションを取得

                    $checkmessage = new CheckMessage();
                    $hasNewMessage = $checkmessage->checkForNewMessages($userId);

                    //echo '<img src="../image/hon.png" alt="本" class="btn-hon-image">';
                ?>
                </a>
            </div>
        </div>

        <!-- 瓶を流すボタンと瓶を回収ボタンを中央に配置 -->
        
        <a href="Binnagasu-input.php">
                    <button type="submit" class="btn-binwonagasu">瓶を流す</button>
                    </a>
                
            <a href="Binkaisyu-input.php">
                <button type="button" class="btn-binwokaisyu">瓶を回収</button>
            </a>
</div>
<script src="../JavaScript/hamburger.js"></script>
<?php require 'footer.php' ;?>