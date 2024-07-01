<?php
session_start();
require 'connect.php';

$sent_id = isset($_GET['sent_id']) ? $_GET['sent_id'] : null;

if ($sent_id) {
    try {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "DELETE FROM Sents WHERE sent_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$sent_id]);
        
        // 削除成功
        header("Location: admin-input.php");
        exit();
    } catch (PDOException $e) {
        // エラー発生
        echo 'エラー: ' . $e->getMessage();
    }
} else {
    echo '削除するメッセージのIDが指定されていません。';
}
?>
