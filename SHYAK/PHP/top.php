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
<!-- ログアウトの時にのみ使用-->
 <?php
      if(isset($_GET['logout'])&&$_GET['logout'] == 1){
        echo '<script>';
        echo 'alert("ログアウトしました")';
        echo '</script>';
      }
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
                    //$originalText = $translator->translate($originalText);
                    $originalText = $translator->translate("本",$_SESSION['User']['lang']);
                    echo '<a href="Morattahenji,php?id="',$_SESSION['User']['id'],'img src="../image/hon.png" alt=$originalText class="btn-hon-image">';
                ?>
                </a>
            </div>
        </div>
        <!-- 瓶を流すボタンと瓶を回収ボタンを中央に配置 -->
        <a href="Binnagasu-input.php">
            <button type="submit" class="btn-binwonagasu">
                <?php
                    $translator = new Translator();
                    $originalText = "瓶を流す";
                    $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $originalText;
                ?>
            </button>
        </a>
        <a href="Binkaisyu-input.php">
            <button type="button" class="btn-binwokaisyu">
                <?php
                    $translator = new Translator();
                    $originalText = "瓶を回収";
                    $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $originalText;
                ?>
            </button>
        </a>
</div>

<script src="../JavaScript/hamburger.js"></script>
<?php require 'footer.php' ;?>