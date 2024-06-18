<?php
session_start(); // セッションを開始
require 'connect.php'; // データベース接続
$pdo = new PDO($connect, USER, PASS); // データベース接続を確立
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// フォームからのデータがPOSTされたか確認
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recieve_message'])) {
    $recieveText = $_POST['recieve_message']; // ユーザーが入力した返信内容
    $userName = $_SESSION['user_name']; // セッションからユーザー名を取得

    // データベースに返信を保存するクエリ
    $stmt = $conn->prepare("INSERT INTO Recieves (user_name, recieve_message) VALUES (?, ?)");
    $stmt->bind_param("ss", $userName, $recieveText); // 'ss'は2つの文字列型のパラメータを意味する

    // クエリの実行
    if ($stmt->execute()) {
        // 成功した場合、JavaScriptを用いてアラートを表示し、別のページにリダイレクトする
        echo "<script>alert('返信に成功しました。'); window.location.href='top.php';</script>";
    } else {
        // 失敗した場合、エラーメッセージを表示
        echo "<script>alert('返信に失敗しました。'); window.location.href='Binkaisyu-input2.php';</script>";
    }

    $stmt->close(); // ステートメントのクローズ
}
$conn->close(); // データベース接続のクローズ
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
