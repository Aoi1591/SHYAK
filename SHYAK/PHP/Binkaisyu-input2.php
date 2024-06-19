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
    echo '<div class="row justify-content-center">';
    echo '<h2 class="text-center" style="width: 300px;">' . $_SESSION['flash']['username'] . $txtArr[0] . '</h2>';
    echo '</div><br>';
    echo '<form id="binkaisyuForm" action="Binkaisyu-output2.php" method="post">';
    echo '<div class="waku">';
    echo '<div class="row justify-content-center mt-5">';
    echo '<div class="col-6">';
    echo '<div class="bun"><p>"' . $_SESSION['flash']['message'] . '"</p></div><br>';
    echo '</div>';
    echo '</div>';

    echo '<div class="row justify-content-center">';
    echo '<div class="text-center col-6">';
    echo '<textarea class="form-control" name="kaisyu" id="userInput2" rows="10" cols="40" placeholder='. $txtArr[1] .'></textarea>';
    echo '</div>';
    echo '</div>';
    echo '</div><br>';

    echo '<div class="row justify-content-center">';
    echo '<div class="text-center col-6">';
    echo '<button type="submit" id="kaisyu" class="btn-binwokaisyu">'. $txtArr[2] .'</button>';
    echo '</div>';
    echo '</div>';

    echo '</form>';
    ?>
    
            <!-- ダイアログ -->
<script type="text/javascript">
    <?php
        $txtArr = array('この内容でよろしいですか？','瓶を流しました');
        $translator = new Translator();
        for($i = 0; $i < count($txtArr); $i++){
            $originalText = $txtArr[$i];
            $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
            $txtArr[$i] = $originalText;
        }
    ?>
    document.addEventListener("DOMContentLoaded", function() {
        const nagasu = document.getElementById("kaisyu");
        nagasu.addEventListener("click", function() {
            const userInput = document.getElementById("userInput2").value;
            const userResponse = confirm(userInput + "\n\n"+<?php echo json_encode($txtArr[0]);?>);
            if (userResponse) {
                alert(<?php echo json_encode($txtArr[1]);?>);
                document.getElementById("binkaisyuForm").submit(); // フォームを送信
            }
        });
    });
</script>

</body>
</html>