<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // POSTデータからアクションとIDを取得
        $action = $_POST['action'];
        $id = $_POST['id'];

        if ($action == 'approve') {
            // 許可の場合、フラグを0に設定
            $sql = 'UPDATE Friends SET flag = 0 WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            echo 'フレンドリクエストを許可しました。';
        } elseif ($action == 'reject') {
            // 却下の場合、リクエストを削除
            $sql = 'DELETE FROM Friends WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            echo 'フレンドリクエストを却下しました。';
        }
    } catch (PDOException $e) {
        echo 'エラーが発生しました: ' . $e->getMessage();
    }
} else {
    echo '不正なリクエストです。';
}
?>
