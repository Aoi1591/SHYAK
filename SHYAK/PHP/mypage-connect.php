<?php session_start();?>
<?php require 'connect.php';?>

<?php
  
  $pdo = new PDO($connect,USER,PASS);

    // フォームからデータを取得
    $name = $_POST["name"];
    $description = $_POST["description"];
    $user_id = $_SESSION['Users']['user_id'];

    //ファイルのアップロード
    $targetDir = "../image/";
    $iconPath = null;

    if(isset($_FILES['icon']) && $_FILES['icon']['error'] == UPLOAD_ERR_OK){
        $iconPath = basename($_FILES['icon']['name']);
        $targetFilePath = $targetDir . $iconName;

        if(move_uploaded_file($FILES['icon']['tmp_name'],$targetFilePath)){
            $iconPath = $iconName;
        }
    }
    if($iconPath){
    $sql = $pdo->prepare('update Users set user_name = ? ,message = ? , icon = ? WHERE user_id = ?');
    $sql -> execute(['$name,$description,$iconPath,$user_id']);
    }else{
        $sql = $pdo->prepare('update Users set user_name = ?, message = ? WHERE user_id = ?');
        $sql->execute([$name, $description, $user_id]);
    }


    if ($stmt->execute() === TRUE) {
        // 更新が成功した場合、top.phpにリダイレクト
        header("Location: ../php/top.php");
        exit();
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close();


$conn->close();
?>
