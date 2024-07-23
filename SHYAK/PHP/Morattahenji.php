<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Morattahenji.css">
</head>
<body>
    <?php
        require 'connect.php'; // データベース接続
        require 'api.php';
    ?>
    <br>
    <div class="container">
    <!-- ✘ボタン 背景透明　触ったら黒　 -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="row">
                    <br>
                    <a href="./top.php">
                        <button type="submit" class="batu">
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- 文字真ん中　下に返事の内容表示 -->
        <?php
            $pdo = new PDO($connect, USER, PASS); // データベース接続を確立
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// エラーモードを指定。エラーをキャッチできるように
            // 返信された瓶があるか確認
            $user_name = $_SESSION['User']['username']; // セッションからユーザーIDを取得
            $sql = $pdo->prepare('select sent_id from Sents where user_name =?');
            $sql->execute([$user_name]);
            $binkaisyu = $sql->fetchAll(PDO::FETCH_ASSOC);
            if($binkaisyu){
                echo '<div class="scroll">';
                echo '<span>';
                foreach($binkaisyu as $row){
                    $sql = $pdo->prepare('select user_name, sent_message from Recieves where sent_id = ?');
                    $sql->execute([$row['sent_id']]);
                    $recieves = $sql->fetchAll(PDO::FETCH_ASSOC);
                    $translator = new Translator();
                    //var_dump($recieves);
                    foreach($recieves as $res){
                        $txtArr = array('からもらった返事',$res['sent_message']);
                        for($i = 0; $i < count($txtArr); $i++){
                            $originalText = $txtArr[$i];
                            $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                            $txtArr[$i] = $originalText;
                        }
                        echo '<div class="row justify-content-center">';
                        echo '<h2 class="text-center mt-5" style="width: 300px;">';
                        echo $res['user_name'], $txtArr[0].'</h2>';
                        echo '</div>';
                        echo '<div class="row justify-content-center mt-5">';
                        echo '<div class="col-6">';
                        echo '<div class="bun">';
                        echo '<p>'. $txtArr[1].'</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                echo'</span>';
                echo'</div>';
            }else{
                $translator = new Translator();
                $originalText = "もらった返事はここに表示されます";
                $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                echo '<div class="row justify-content-center mt-5">';
                echo '<div class="col-6">';
                echo '<div class="bun">';
                echo '<p>'.$originalText.'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>  
    </div>
</body>
</html>


