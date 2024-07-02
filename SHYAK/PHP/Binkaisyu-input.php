<?php session_start();?>
<?php
// データベース接続情報
require 'connect.php';
try {
    // PDO接続を確立
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ランダムなユーザー名とメッセージを取得するクエリ
    $sql = "select user_name, sent_message from Sents where user_name != :myname and country_id = :lang order by RAND() LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':myname', $_SESSION['User']['username'], PDO::PARAM_STR);
    $stmt->bindParam(':lang', $_SESSION['User']['pick'], PDO::PARAM_STR);
    $stmt->execute();
    
    // クエリ結果をチェック
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        // ユーザー名とメッセージを取得し、flashメッセージとして格納
        $_SESSION['flash'] = ['username' => $row['user_name'], 'message' => $row['sent_message']];
        $sent_id = $row['sent_id'];
    } else {
        // ユーザーが見つからない場合、エラーメッセージを返す
        $_SESSION['flash'] = ['none' => '拾える瓶が存在しません'];
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
    <?php
    if(isset($_GET['tuho'])&&$_GET['tuho'] == 1){
        echo '<script>';
        $translator = new Translator();
        $originalText = "メッセージを通報しました";
        $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
        echo $translatedText;
        echo '</script>';
      }
      ?>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="col-10">
                    <br>
                    <!--通報-->
                    <a href="tuhou-output.php?sent_id=",$sent_id>
                    <button type="submit" class="tuhou">
                    </button>
                    </a>
                    <!-- ✘ボタン -->
                    <a href="top.php">
                    <button type="submit" class="batu">
                    </button></a>
                </div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['flash']['none'])){
                echo '<div class="row justify-content-center mt-5">';
                echo '<div class="col-6 text-center">';
                echo '<div class="alert alert-danger" role="alert">';
                $translator = new Translator();
                $originalText = $_SESSION['flash']['none'];
                $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                echo $translatedText;
                echo '</div>';
                echo '</div>';
                echo '</div>';
                unset($_SESSION['flash']['none']);
                echo '</div>';
            }else{
                echo '<div class="row justify-content-center">';
                echo '<h2 class="text-center" style="width: 300px;">';
                echo '<span id="userName">';
                echo $_SESSION['flash']['username'];
                echo '</span>';
                $translator = new Translator();
                $originalText = "からの瓶";
                $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                echo $translatedText;
                echo '</h2>';
                echo '</div>';
                echo '<div class="row justify-content-center mt-5">';
                echo '<div class="col-6">';
                echo '<div class="message" id="sentMessage">';
                echo $_SESSION['flash']['message'];
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="row justify-content-center mt-3">';
                echo '<div class="col-6 text-center">';
                echo '<form action="Binkaisyu-output.php" method="post">';
                echo '<input type="hidden" id="hiddenUserName" name="userName">';
                echo '<input type="hidden" id="hiddenMessage" name="message">';
                echo '<button type="submit" class="btn btn-primary">';
                $translator = new Translator();
                $originalText = "返信";
                $translatedText = $translator->translate($originalText,$_SESSION['User']['lang']);
                echo $translatedText;
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
</body>
</html>
