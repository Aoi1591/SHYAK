<?php
    session_start();
    require 'header.php';
?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/top.css">
</head>
<body>
<?php
require 'menu-humburger.php';
require 'api.php';
//require 'CheckMessage.php';
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
                <div class ="book">
                <a href="Morattahenji.php">
                <br>
                <?php
                    $translator = new Translator();
                    $originalText = "本";
                    $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo '<a href="Morattahenji.php?id="',$_SESSION['User']['id'],' class="btn btn-outline-dark userinfoButton bg-light"><br><img src="../image/book.jpg" alt="icon" style="width:20px; height: 20px">'. $originalText.'</a>';
                ?>
                </a>
                </div>
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