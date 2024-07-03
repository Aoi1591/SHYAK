<?php
session_start();
require 'connect.php';

try{
    if(isset($_SESSION['User']['id']) && isset($_SESSION['User']['username'])){
        $_SESSION['User']['pick'] = $_POST['language'];
        header('Location: ./Choose your language.php');
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