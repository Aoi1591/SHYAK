<?php
session_start(); // セッションの開始
require 'connect.php'; // データベース接続スクリプト

try {
    $pdo = new PDO($connect, USER, PASS); // データベース接続の確立
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードを例外に設定

    // フォームからのデータがPOSTされたか確認
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recieve_message']) && isset($_POST['sent_id'])) {
        $recieveText = $_POST['recieve_message']; // フォームからの返信テキスト
        $sentId = $_POST['sent_id']; // フォームからの送信先ID
        $userName = $_SESSION['user_name']; // セッションからユーザー名を取得

        // データベースにデータを挿入するための SQL クエリを準備
        $stmt = $pdo->prepare("INSERT INTO Recieves (user_name, sent_id, sent_message) VALUES (:userName, :sentId, :recieveText)");
        $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':sentId', $sentId, PDO::PARAM_INT);
        $stmt->bindParam(':recieveText', $recieveText, PDO::PARAM_STR);

        // クエリの実行
        if ($stmt->execute()) {
            // 成功した場合、別のページにリダイレクト
            echo "<script>window.location.href='./top.php';</script>";
        } else {
            // 失敗した場合、エラーメッセージを表示しリダイレクト
            echo "<script>alert('返信に失敗しました。'); window.location.href='Binkaisyu-input2.php';</script>";
        }
    }
} catch (PDOException $e) {
    // PDO操作中に発生した例外/エラーを処理
    echo "<script>alert('データベースエラー: " . $e->getMessage() . "'); window.location.href='Binkaisyu-input2.php';</script>";
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
</head>
<body>
<h2 class="text-center mt-5">この返事でよろしいですか？</h2>
<?php
            if(isset($_POST['kaisyu'])) {
                $kaisyu = $_POST['kaisyu'];
                echo '<div class="text-center">';
                echo "<p>入力された内容<br>$kaisyu</p>";
            }
            ?>
            <div class="row justify-content-center">
            
            <div class="col-6">
<a href="top.php">
<button type="submit" class="btn btn-outline-dark userinfoButton">はい<br>
</button>
</a>
</div>
            <div class="col-6">
<a href="Binkaisyu-output.php">
<button type="submit" class="btn btn-outline-dark userinfoButton">いいえ<br>
</button>
</a>
</a>
</div>
</div>
</body>
</html>
