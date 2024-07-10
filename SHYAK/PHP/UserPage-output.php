<?php
session_start();
require 'connect.php';

if (isset($_GET['you']) && isset($_GET['flg'])) {
    $you = intval($_GET['you']); // 安全のために整数型に変換
    $flg = intval($_GET['flg']); // 安全のために整数型に変換

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Friendsテーブルの更新クエリ
        $stmt = $pdo->prepare('UPDATE Friends SET flag = :flg WHERE user_id = :me AND friend_id = :you');
        $stmt->bindParam(':me', $_SESSION['User']['id'], PDO::PARAM_INT);
        $stmt->bindParam(':you', $you, PDO::PARAM_INT);
        $stmt->bindParam(':flg', $flg, PDO::PARAM_INT);
        $users = $stmt->execute();

        if ($users) {
            if ($flg == 1) {
                $_SESSION['message'] = "ユーザーをブロックしました。";
            } elseif ($flg == 2) {
                $_SESSION['message'] = "フレンド申請を送りました。";
            } elseif ($flg == 0) {
                $_SESSION['message'] = "ユーザーをフレンドに追加しました。";
            }
            header("Location: top.php");
            exit();
        } else {
            $_SESSION['message'] = "操作に失敗しました。";
            header("Location: top.php");
            exit();
        }
    } catch (PDOException $e) {
        // エラーハンドリング
        error_log("Database error: " . $e->getMessage());
        $_SESSION['message'] = "データベースエラーが発生しました。";
        header("Location: top.php");
        exit();
    }
} else {
    // 不正なアクセスを防ぐためのリダイレクト
    $_SESSION['message'] = "不正なアクセスです。";
    header("Location: top.php");
    exit();
}
?>
