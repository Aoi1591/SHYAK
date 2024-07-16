<?php
session_start();
require 'connect.php';
require 'api.php'; 

$translator = new Translator();

if (isset($_GET['you']) && isset($_GET['flg'])) {
    $you = intval($_GET['you']); 
    $flg = intval($_GET['flg']); 
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $pdo->prepare('UPDATE Friends SET flag = :flg WHERE user_id = :me AND friend_id = :you');
        $stmt->bindParam(':me', $_SESSION['User']['id'], PDO::PARAM_INT);
        $stmt->bindParam(':you', $you, PDO::PARAM_INT);
        $stmt->bindParam(':flg', $flg, PDO::PARAM_INT);
        $users = $stmt->execute();

        if ($users) {
            if ($flg == 1) {
                $message = "ユーザーをブロックしました。";
            } elseif ($flg == 2) {
                $message = "フレンド申請を送りました。";
            } elseif ($flg == 0) {
                $message = "ユーザーをフレンドに追加しました。";
            }
            $_SESSION['message'] = $translator->translate($message, $_SESSION['User']['lang']);
            header("Location: top.php");
            exit();
        } else {
            $message = "操作に失敗しました。";
            $_SESSION['message'] = $translator->translate($message, $_SESSION['User']['lang']);
            header("Location: top.php");
            exit();
        }
    } catch (PDOException $e) {
      
        error_log("Database error: " . $e->getMessage());
        $message = "データベースエラーが発生しました。";
        $_SESSION['message'] = $translator->translate($message, $_SESSION['User']['lang']);
        header("Location: top.php");
        exit();
    }
} else {
    
    $message = "不正なアクセスです。";
    $_SESSION['message'] = $translator->translate($message, $_SESSION['User']['lang']);
    header("Location: top.php");
    exit();
}
?>
