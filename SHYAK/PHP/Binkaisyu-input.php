<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Binkaisyu.css">
    <script src="../JavaScript/Binkaisyu.js" defer></script>
</head>
<body>
    <?php require 'api.php';?>
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
            <h2 class="text-center" style="width: 300px;">
                <span id="userName"></span>
                <?php
                    $translator = new Translator();
                    $originalText = "からの瓶";
                    $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $translatedText;
                ?>
            </h2>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-6">
                <div class="message"id="sentMessage"></div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-6 text-center">
                <form action="Binkaisyu-output.php" method="post">
                <input type="hidden" id="hiddenUserName" name="userName">
                <input type="hidden" id="hiddenMessage" name="message">
                    <button type="submit" class="btn btn-primary">
                        <?php
                            $translator = new Translator();
                            $originalText = "返信";
                            $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                            echo $translatedText;
                        ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// コンテンツタイプをJSONに設定
header('Content-Type: application/json');

// データベース接続情報
require 'connect.php';

// ランダムなユーザー名とメッセージを取得するクエリ
$sql = "SELECT user_name, sent_message FROM Sents ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

// クエリ結果をチェック
if ($result->num_rows > 0) {
    // ユーザー名とメッセージを取得し、JSON形式で返す
    $row = $result->fetch_assoc();
    echo json_encode(['user_name' => $row['user_name'], 'sent_message' => $row['sent_message']]);
} else {
    // ユーザーが見つからない場合、エラーメッセージを返す
    echo json_encode(['error' => 'No messages found']);
}

// データベース接続を閉じる
$conn->close();
?>

