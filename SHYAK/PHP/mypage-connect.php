<?php
// データベースへの接続
$servername = ""; // サーバーネーム
$username = ""; // データベースユーザー名
$password = ""; // データベースパスワード
$dbname = ""; // データベース名

// 接続を作成
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続を確認
if ($conn->connect_error) {
    die("接続に失敗しました: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからデータを取得
    $name = $_POST["name"];
    $description = $_POST["description"];
    $language = $_POST["language"];

    // ステートメントを準備してバインド
    $stmt = $conn->prepare("INSERT INTO user_data (name, description, language) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $language);

    // ステートメントを実行
    if ($stmt->execute() === TRUE) {
        // 更新が成功した場合、top.phpにリダイレクト
        header("Location: ../php/top.php");
        exit();
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
