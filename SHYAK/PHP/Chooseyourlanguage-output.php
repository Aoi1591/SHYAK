<?php
session_start();
require 'connect.php';

try{
    if(isset($_SESSION['User']['id']) && isset($_SESSION['User']['username'])){
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $pdo->prepare('update Users set country_id = ? where user_id = ? and user_name = ?');
        $sql->execute([$_POST['language'],$_SESSION['User']['id'],$_SESSION['User']['username']]);
        $_SESSION['User']['pick'] = $_POST['language'];
        header('Location: ./Choose your language.php?pick='.$_SESSION['User']['pick']);
        exit();
    }else{
        // セッション情報ない(未サインイン)のに飛ばされてきたとき
        echo '<script>alert("Please sign up");</script>';
        header('Location: ./signup-input.php');
        exit();
    }
} catch (PDOException $e) {
    // エラーハンドリング
    echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
    header('Location: ./signup-input.php');
    exit();
}

?>