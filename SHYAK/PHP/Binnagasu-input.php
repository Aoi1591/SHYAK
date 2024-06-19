<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Binnagasu.css">
</head>
<body>
<?php require 'api.php';?>
    <br>
    < class="container">
        <!-- ✘ボタン -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="row">
                    <a href="top.php">
                        <button type="button" class="batu"></button>
                    </a>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
        <h2 class="text-center" style="width: 300px;">
            <?php
                $translator = new Translator();
                $originalText = "瓶を流す";
                $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                echo $translatedText;
            ?>
        </h2>
        </div>

        <!-- テキストエリア -->
        <!-- 瓶を流すボタン中央に配置 -->
        <?php
            $txtArr = array('願いや祝福を入力してください','瓶を流す');
            $translator = new Translator();
            for($i = 0; $i < count($txtArr); $i++){
                $originalText = $ruleArry[$i];
                $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                $txtArr[i] = $originalText;
            }
        ?>
        <form action="Binnagasu-output.php" method="post" id="binnagasuForm">
        <div class="row justify-content-center mt-5">
        <div class="col-6">
        <textarea class="form-control" name="sentmessage" id="userInput" rows="15" cols="40" placeholder="<?php echo $txtArr[1];?>"></textarea>
        </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
        <button type="submit" id="kaisyu" class="btn-binwonagasu "><?php echo $txtArr[1];?></button>
        </div>
        </div>
        </form>

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
                const nagasu = document.getElementById("nagasu");
                nagasu.addEventListener("click", function() {
                    const userInput = document.getElementById("userInput").value;
                    const userResponse = confirm(userInput+ "\n\n"+<?php echo json_encode($txtArr[0]);?>);
                    if (userResponse === true) {
                        alert(<?php echo json_encode($txtArr[1]);?>);
                        document.getElementById("binnagasuForm").submit(); // フォームを送信
                    } else if (userResponse === false) {
                        window.location.href = "Binnagasu-input.php";
                    }
                });
            });  
        </script>
    </div>
</body>
</html>
