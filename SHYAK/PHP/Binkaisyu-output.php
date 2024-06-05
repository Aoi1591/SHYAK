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
                <div class="row">
                    <br>
                    <a href="top.php">
                        <button type="submit" class="batu">×</button>
                    </a>
                </div>
            </div>
        </div>
        <br>

        <?php
        echo '<div class="row justify-content-center">';
        echo '<h2 class="text-center" style="width: 300px;">○○さんへの返事</h2>';
        echo '</div><br>';
        
        echo '<form id="binkaisyuForm" action="Binkaisyu-output2.php" method="post">';
        echo '<div class="waku">';
        echo '<div class="row justify-content-center mt-5">';
        echo '<div class="col-6">';
        echo '<div class="bun"><p>"願いや祝福"</p></div><br>';
        echo '</div>';
        echo '</div>';

        echo '<div class="row justify-content-center">';
        echo '<div class="text-center col-6">';
        echo '<textarea class="form-control" name="kaisyu" id="userInput2" rows="10" cols="40" placeholder="返事を入力してください"></textarea>';
        echo '</div>';
        echo '</div>';
        echo '</div><br>';

        echo '<div class="row justify-content-center">';
        echo '<div class="text-center col-6">';
        echo '<button type="submit" id="kaisyu" class="btn-binwokaisyu">瓶の返信</button>';
        echo '</div>';
        echo '</div>';

        echo '</form>';
        ?>

        <!-- ダイアログ -->
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                const nagasu = document.getElementById("kaisyu");
                nagasu.addEventListener("click", function() {
                    const userInput = document.getElementById("userInput2").value;
                    const userResponse = confirm(userInput + "\n\nこの内容でよろしいですか？");
                    if (userResponse) {
                        alert("瓶を流しました");
                        document.getElementById("binkaisyuForm").submit(); // フォームを送信
                    }
                });
            });
        </script>
    </div>
</body>
</html>
