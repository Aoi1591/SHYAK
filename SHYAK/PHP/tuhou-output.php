<?php session_start();?>
<?php require 'connect.php';?>
<?php 
    $sent_id = isset($_GET['sent_id']) ? $_GET['sent_id'] : null;

    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo -> prepare("update Sents set flag = 1 WHERE sent_id = ?");
    $sql -> execute([$sent_id]);
    
    header("Location:Binkaisyu-input.php?tuho=1");
