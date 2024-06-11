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
        <div class="row justify-content-center">
            <?php
                // 翻訳クラスのインスタンス化
                $translator = new Translator();
                // 翻訳するテキスト
                $originalText = "からの瓶";
                $translatedText = $translator->translate($originalText);
                echo "<h2 class='text-center' style='width: 300px;'>$translatedText</h2>";
            ?>
        </div>
        <form action="Binkaisyu-output.php" method="post">
            <div class="row justify-content-center mt-5">
                <div class="col-6">
                    <div class="bun">
                        <?php
                            $translator = new Translator();
                            $text = "願いや祝福";
                            $translatedText = $translator->translate($text);
                            echo '<p>', $translatedText, '</p>';
                        ?>
                    </div>
                </div>
            </div>
        <!--瓶を回収ボタンを中央に配置 -->
            <br><br>
            <div class="row justify-content-center">
                <div class="text-center col-6">
                    <?php
                        $translator = new Translator();
                        $text = "瓶を回収";
                        $translatedText = $translator->translate($text);
                        echo '<button type="submit" class="btn-binwokaisyu">', $translatedText, '</button>';
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
