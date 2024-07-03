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
        $you = $_GET['you'];
        $pdo = new PDO($connect,USER,PASS);
        $stmt = $pdo->prepare('SELECT * FROM Users WHERE id = :you');
        $stmt->bindParam(':you', $you);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user){
            echo '<div class="profile-box">';
            echo '<img src="'.$user['icon'].'" alt="user icon">';
            echo '<h2>'.$user['name'].'</h2>';
            switch ($user['country']) {
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
            echo '<div id="description" class="description editable" contenteditable="true">',$user['message'],'</div>';
            echo '<input type="hidden" name="description" id="descriptionInput" value="',$user['message'],'">';
            echo '</div>';
            echo '</div>';
            echo '<div class="relation">';
            echo '<div class="friend">';
            echo '<a href="UserPage-output.php?flg=2you="'.$you.'">フレンド申請</a>';
            echo '</div>';
            echo '<div class="block">';
            echo '<a href="UserPage-output.php?flg=1you="'.$you.'">ブロックする</a>';
            echo '</div>';
            echo '</div>';
        }
    }

?>
</body>