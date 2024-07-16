<?php
session_start();
require 'connect.php';
require 'header.php';
require 'api.php';

// Include the Translator class definition here

// Function to translate text using Microsoft Translator API
function translateText($text, $to) {
    // Your Translator class implementation goes here
    // Initialize Translator object or use directly within function
    $translator = new Translator();

    // Translate the text
    try {
        $translatedText = $translator->translate($text, $to);
        return $translatedText;
    } catch (Exception $e) {
        echo 'Translation Error: ' . $e->getMessage();
        return $text; // Return original text on error
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーページ</title>
    <link rel="stylesheet" href="../CSS/UserPage.css">
    <script>
        function confirmBlock(url) {
            if (confirm("ブロックしますか？")) {
                window.location.href = url;
            }
        }
    </script>
</head>
<body>

<?php
if (isset($_GET['you'])) {
    $you = intval($_GET['you']); // 安全のために数値型に変換

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('SELECT * FROM Users WHERE user_id = :you');
        $stmt->bindParam(':you', $you, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // ユーザー情報が見つかった場合
            echo '<div class="header back-box">';
            echo '<button id="backButton" type="button" onclick="javascript:history.back();">';
                    $translator = new Translator();
                    $originalText = "戻る";
                    $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $originalText;
            echo '</button>';
            echo '</div>';

            echo '<div class="profile-box">';
            if (empty($user['icon'])) {
                echo '<img src="../img/default.png" alt="user icon">';
            } else {
                echo '<img src="'.$user['icon'].'" alt="user icon">';
            } 
            echo '</div>';
            echo '<h2 class="name">'.$user['user_name'].'</h2>';
            echo '<div class="kuni">';
            // 国旗表示
            $country_flag = '';
            switch ($user['country_id']) {
                case "ja":
                    $country_flag = '日本.png';
                    break;
                case "en":
                    $country_flag = 'アメリカ.png';
                    break;
                case "fr":
                    $country_flag = 'フランス.png';
                    break;
                case "pt":
                    $country_flag = 'ポルトガル.png';
                    break;
                case "ru":
                    $country_flag = 'ロシア.png';
                    break;
                case "zh-Hans":
                    $country_flag = '中国.png';
                    break;
            }
            if ($country_flag) {
                echo '<img src="../img/'.$country_flag.'" alt="国旗">';
            }
            echo '</div>';

            echo '<div class="description-box">';
            echo '<div class="intro-title">';
            
                    $translator = new Translator();
                    $originalText = "［自己紹介］";
                    $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
                    echo $originalText;
                
            echo '</div>';
            // Translate the user's message
            $translatedMessage = translateText($user['message'], 'en');
            echo '<div id="description">'.$translatedMessage.'</div>';
            echo '</div>';

            // フレンド申請・ブロック機能
            echo '<div class="relation">';
            echo '<div class="friend">';
            echo '<a href="UserPage-output.php?flg=2&you='.$you.'">';
            $translator = new Translator();
            $originalText = "フレンド申請";
            $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
            echo $originalText;
            echo '</a>';
            echo '</div>';
            echo '<div class="block">';
            echo '<a href="javascript:void(0);" onclick="confirmBlock(\'UserPage-output.php?flg=1&you='.$you.'\')">';
            $translator = new Translator();
            $originalText = "ブロックする";
            $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
            echo $originalText;
            echo '</a>';
            echo '</div>';
            echo '</div>';
        } else {
            // ユーザーが見つからない場合
            echo '<script>alert("ユーザーが見つかりませんでした");</script>';
            echo '<script>window.location.href = "top.php";</script>';
        }
    } catch (PDOException $e) {
        echo '<script>alert("データベースエラーが発生しました");</script>';
        echo '<script>window.location.href = "top.php";</script>';
    }
} else {
    // ユーザーIDが提供されていない場合
    header('Location: top.php');
}
?>

</body>
</html>
