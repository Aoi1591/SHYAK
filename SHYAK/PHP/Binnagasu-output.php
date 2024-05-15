<?php
    session_start();
    require 'connect.php';
    if(isset($_SESSION['User'])){
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('insert into Sents(user_name,sent_message) values(?,?)');
        $sql->execute([$_SESSION['username'],$_POST['sent-message']]);
        header('Location: ./top.php');
        exit();
    }else{
        echo '<script>alart("ログインしてください")</script>';
        header('Location:./login.php');
        exit();
    }
    
?>