<?php session_start();?>
<?php require 'connect.php';?>
<?php
  $pdo = new PDO($connect,USER,PASS);

    $name = $_POST["user_name"]; // ユーザー名
    $description = $_POST["description"];// 紹介文
    $user_id = $_SESSION['User']['id'];// Id
    $language = $_POST["language"];// 言語

    // $_SESSION['User'] = [
    //     'username' => $name,
    //     'lang' => $language
    // ];
    $_SESSION['User']['username']=$name;
    $_SESSION['User']['lang']=$language;


    //ファイルのアップロード
    $targetDir = "../img/";
    $iconPath = null;

    if(isset($_FILES['icon']) && $_FILES['icon']['error'] == UPLOAD_ERR_OK){
        $iconName = basename($_FILES['icon']['name']);
        $targetFilePath = $targetDir . $iconName;
        if(move_uploaded_file($_FILES['icon']['tmp_name'],$targetFilePath)){
            $iconPath = $iconName;
        }
    }
    //DBにデータ挿入
    if($iconPath){
    $sql = $pdo->prepare('update Users set user_name = ? ,message = ? , icon = ? ,country_id = ? WHERE user_id = ?');
    $sql -> execute([$name, $description, $iconPath, $language , $user_id]);
    }else{
        $sql = $pdo->prepare('update Users set user_name = ?, message = ?, country_id = ? WHERE user_id = ?');
        $sql->execute([$name, $description, $language ,$user_id]);
    }
    header("Location: top.php");
    exit();
?>
