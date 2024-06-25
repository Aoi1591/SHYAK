<?php session_start();?>
<?php
// データベース接続情報
require 'connect.php';
try {
    // PDO接続を確立
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ランダムなユーザー名とメッセージを取得するクエリ
    $sql = "select user_name, sent_message from Sents where user_name != :myname order by RAND() LIMIT 1";
    /*$stmt = $pdo->query($sql);
    $stmt->bindParam(':myname', $_SESSION['User']['username'], PDO::PARAM_STR);*/
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':myname', $_SESSION['User']['username'], PDO::PARAM_STR);
    $stmt->execute();
    

    // クエリ結果をチェック
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // ユーザー名とメッセージを取得し、flashメッセージとして格納
        $_SESSION['flash'] = ['username' => $row['user_name'], 'message' => $row['sent_message']];
    } else {
        // ユーザーが見つからない場合、エラーメッセージを返す
        echo '<script>データが存在しません</script>';
    }

} catch (PDOException $e) {
    // エラーが発生した場合、エラーメッセージを返す
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} finally {
    // PDO接続を閉じる
    $pdo = null;
}
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
                <span id="userName"><?php echo $_SESSION['flash']['username'];?></span>
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

                <div class="message" id="sentMessage"><?php echo $_SESSION['flash']['message'];?></div>

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
