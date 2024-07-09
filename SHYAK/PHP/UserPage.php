<?php
session_start();
require 'connect.php';
require 'header.php';
require 'api.php';
?>
    <link rel="stylesheet" href="../CSS/UserPage.css">
</head>
<body>
<?php
    if(isset($_GET['you'])){
        if(isset($_GET['err'])){
            echo '<script>alert("リクエストに失敗しました"\n"再度実行してください")</script>';
        }
        echo '<a href="javascript:history.back();">戻る</a>';
        $you = $_GET['you'];
        $pdo = new PDO($connect,USER,PASS);
        $stmt = $pdo->prepare('SELECT * FROM Users WHERE user_id = :you');
        $stmt->bindParam(':you', $you);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($users as $user){
            echo '<div class="profile-box">';
            if(empty($user['icon'])){
                echo '<img src="../img/default.png" alt="user icon">';
            }else{
                echo '<img src="'.$user['icon'].'" alt="user icon">';
            }
            echo '<h2>'.$user['user_name'].'</h2>';
            switch ($user['country_id']) {
                case "ja":
                    echo '<img src="../img/日本.png">';
                    break;
                case "en":
                    echo '<img src="../img/アメリカ.png">';
                    break;
                case "fr":
                    echo '<img src="../img/フランス.png">';
                    break;
                case "pt":
                    echo '<img src="../img/ポルトガル.png">';
                    break;
                case "ru":
                    echo '<img src="../img/ロシア.png">';
                    break;
                case "zh-Hans":
                    echo '<img src="../img/中国.png">';
                    break;
            }
            echo '<div class="description-box">';
            echo '<div class="intro-title">［自己紹介］</div>';
            echo '<div id="description">',$user['message'],'</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="relation">';
            echo '<div class="friend">';
            echo '<a href="UserPage-output.php?flg=2&you="'.$you.'">フレンド申請</a>';
            echo '</div>';
            echo '<div class="block">';
            echo '<a href="UserPage-output.php?flg=1&you="'.$you.'">ブロックする</a>';
            echo '</div>';
            echo '</div>';
        }
    }else{
       // header('Location:top.php');
    }
?>
</body>