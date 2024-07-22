<?php
    session_start();
    require 'api.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/Binkaisyu.css">
</head>
<body>
<br>
<div class="container">
<!-- ✘ボタン -->
<div class="row justify-content-end">
<div class="col-12 col-md-2">
<div class="col-10">
<br>
<button type="submit" class="tuhou">
</button>
<a href="top.php">
<button type="submit" class="batu">
</button></a>

</div>
</div>
</div>
<br>
    <?php
    $txtArr = array('への返事','返事を入力してください','瓶の返信');
    $translator = new Translator();
    for($i = 0; $i < count($txtArr); $i++){
        $originalText = $txtArr[$i];
        $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
        $txtArr[$i] = $originalText;
    }
    // セッションから取得
    $sentId = isset($_GET['sent_id']) ? $_GET['sent_id'] : 'デフォルト値';
    $userId = $_SESSION['User']['id']; 
    $userName = isset($_SESSION['User']['username']) ? $_SESSION['User']['username'] : 'デフォルト名前';

    echo '<div class="row justify-content-center">';
    echo '<h2 class="text-center" style="width: 300px;">' . $_SESSION['flash']['username'] . $txtArr[0] . '</h2>';
    echo '</div><br>';
    echo '<form id="binkaisyuForm" action="Binkaisyu-output2.php" method="post">';
    echo '<div class="waku">';
    echo '<div class="row justify-content-center mt-5">';
    echo '<div class="col-6">';
    echo '<div class="bun"><p>' . $_SESSION['flash']['message'] . '</p></div><br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="row justify-content-center">';
    echo '<div class="text-center col-6">';
    echo '<input type="hidden" name="sent_id" value="' . $sentId . '">';
    echo '<textarea class="form-control" name="sent_message" id="userInput2" rows="10" cols="40" placeholder="'. $txtArr[1] .'"></textarea>';
    echo '</div>';
    echo '</div>';
    echo '</div><br>';

    echo '<div class="row justify-content-center">';
    echo '<div class="text-center col-6">';
    echo '<button type="submit" id="kaisyu" class="btn-binwokaisyu">'. $txtArr[2] .'</button>';
    echo '</div>';
    echo '</div>';


    echo '<div id="confirmationDialog" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 1000;">';
    echo '<div id="confirmationDialogCon" class="dialog-content" style="background: rgb(255, 244, 185); border-radius: 20px; padding: 7%; text-align: center; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 10px; display: none;">';
    echo '<label>この内容でよろしいですか？</label>';
    echo '<button id="confirmYes" type="submit" style="width: 100px; height: 40px; margin: 10px; border: none; border-radius: 20px; font-size: 16px; color: #fff; cursor: pointer; background-color: #4CAF50; transition: background-color 0.3s ease;">はい</button>';
    echo '<button id="confirmNo" type="button" style="width: 100px; height: 40px; margin: 10px; border: none; border-radius: 20px; font-size: 16px; color: #fff; cursor: pointer; background-color: #f44336; transition: background-color 0.3s ease;">いいえ</button>';
    echo '</div>';
    echo '</div>';
    echo '</form>';
    ?>
    


<!--<?php //unset($_SESSION['flash']);?>-->
<script src="../JS/Binkaisyu.js"></script>
</body>
</html>
