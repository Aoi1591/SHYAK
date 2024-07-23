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
    <class="container">
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
                $originalText = $txtArr[$i];
                $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                $txtArr[$i] = $originalText;
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
        <button type="button" id="nagasu" class="btn-binwonagasu "><?php echo $txtArr[1];?></button>
        </div>
        </div>
        
        <div id="confirmationDialog" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: none; justify-content: center; align-items: center; z-index: 1000;">
        <div id="confirmationDialogCon" class="dialog-content" style="background: rgb(255, 244, 185); border-radius: 20px; padding: 7%; text-align: center; box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 10px; display: none;">
            <label>この内容でよろしいですか？</label>
            <button id="confirmYes" type="submit" style="width: 100px; height: 40px; margin: 10px; border: none; border-radius: 20px; font-size: 16px; color: #fff; cursor: pointer; background-color: #4CAF50; transition: background-color 0.3s ease;">はい</button>
            <button id="confirmNo" type="button" style="width: 100px; height: 40px; margin: 10px; border: none; border-radius: 20px; font-size: 16px; color: #fff; cursor: pointer; background-color: #f44336; transition: background-color 0.3s ease;">いいえ</button>
        </div>
        </div>
        </form>

        
    <script src="../JavaScript/Binnagasu.js"></script>



    </div>
</body>
</html>
