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
    <div class="container">
        <!-- 設定ボタンを右上に配置 -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="row">
                    <a href="settei.php">
                    <br>
                        <button type="submit" class="btn btn-outline-dark userinfoButton bg-light"><br>設定
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- 本ボタンを左下に配置 -->
        <div class="row justify-content-start">
            <div class="col-12 col-md-10">
                <a href="MorauHenji.php">
                <br>
                    <button type="submit" class="btn btn-outline-dark userinfoButton bg-light"><br>本
                    </button>
                </a>
            </div>
        </div>

        <!-- 瓶を流すボタンと瓶を回収ボタンを中央に配置 -->
        <div class="row justify-content-center">
        <div class="col-2">
        </div>
            <div class="col-4">
                <a href="BinNagasu.php">
                <br><br>
                    <button type="submit" class="btn btn-outline-dark userinfoButton bg-light"><br>瓶を流す
                    </button>
                </a>
            </div>
            <div class="col-4">
                <a href="BinKaisyuu.php">
                <br><br>
                    <button type="submit" class="btn btn-outline-dark userinfoButton bg-light"><br>瓶を回収
                    </button>
                </a>

        </div>
        </div>
    </div>
</body>
</html>
