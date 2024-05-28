<!DOCTYPE html>
<html lang="en">
<head>
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
    <br>
    <div class="container">
    <!-- ✘ボタン -->
    <div class="row justify-content-end">
        <div class="col-12 col-md-2">
            <div class="row">
                <br>
                <a href="top.php">
                    <button type="submit" class="btn btn-outline-dark userinfoButton">×
                    </button>
                </a>
            </div>
        </div>
    </div>


        <h2 class="text-center mt-5">瓶を流す</h2>
        <!-- テキストエリア -->
        <!-- 瓶を流すボタン中央に配置 -->
        <form action="Binnagasu-output.php" method="post" id="binnagasuForm">
            <div class="row justify-content-center mt-5">'
                <div class="col-6">
                <textarea class="form-control" name="sentmessage" id="userInput" rows="15" cols="40" placeholder="願いや祝福を入力してください" required></textarea>
                    <div class="invalid-feedback">一文字以上のメッセージを入力してください</div>
                </div>
            </div>
            <br><br>
            <div class="row justify-content-center">
                <div class="text-center col-6">
                    <button type="button" id="nagasu" class="btn btn-outline-dark userinfoButton">瓶を流す</button>
                </div>
            </div>
        </form>

<!-- ダイアログ -->
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                const nagasu = document.getElementById("nagasu");
                nagasu.addEventListener("click", function() {
                    const userInput = document.getElementById("userInput").value;
                    const userResponse = confirm(userInput+ "\n\nこの内容でよろしいですか？");
                    if (userResponse === true) {
                        alert("瓶を流しました");
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
