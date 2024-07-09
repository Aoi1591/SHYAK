<?
session_start();
require 'connect.php';
if(isset($_GET['you']) && isset($_GET['flg'])){
    $you = $_GET['you'];
    $flg = $_GET['flg'];
    $pdo = new PDO($connect,USER,PASS);
    $stmt = $pdo->prepare('update Friends set user_id = :me, friend_id = :you, flag = :flg');
    $stmt->bindParam(':me', $_SESSION['User']['id']);
    $stmt->bindParam(':you', $you);
    $stmt->bindParam(':flg', $flg);
    $users = $stmt->execute();
    if($users){
        header("Location: UserPage.php?you=",$you);
        exit();
    }else{
        header("Location: UserPage.php?err=1&you=",$you);
        exit();
    }
}

?>