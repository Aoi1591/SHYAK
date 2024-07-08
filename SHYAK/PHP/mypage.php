<?php session_start();?>
<?php
require 'connect.php';
require 'header.php';
require 'api.php';
?>
<?php
   $pdo = new PDO($connect,USER,PASS);
   $sql = $pdo -> prepare('select user_name,icon,message,country_id from Users WHERE user_id=?');//DB再構築後名前を確認
   $sql -> execute([$_SESSION['User']['id']]);
   $row = $sql ->fetch(PDO::FETCH_ASSOC);

   echo ' <link rel="stylesheet" href="../CSS/mypage.css">';
   echo '</head>';

   echo '<body>';
   echo '<form method="POST" action="mypage-connect.php" enctype="multipart/form-data">';

   $selectedLanguage = $row['country_id']; // ここは実際のデータベースクエリから取得した値に置き換えます

   echo '<select name="language" id="LanguageChoice-all" class="LanguageChoice">';
   echo '<option disabled ' . (!$selectedLanguage ? 'selected' : '') . '>Language Choice</option>';
   echo '<option value="ja" ' . ($selectedLanguage == 'ja' ? 'selected' : '') . '>日本語</option>';
   echo '<option value="en" ' . ($selectedLanguage == 'en' ? 'selected' : '') . '>English</option>';
   echo '<option value="ru" ' . ($selectedLanguage == 'ru' ? 'selected' : '') . '>русский язык</option>';
   echo '<option value="pt" ' . ($selectedLanguage == 'pt' ? 'selected' : '') . '>português</option>';
   echo '<option value="fr" ' . ($selectedLanguage == 'fr' ? 'selected' : '') . '>français</option>';
   echo '<option value="zh-Hans" ' . ($selectedLanguage == 'zh-Hans' ? 'selected' : '') . '>简体中文</option>';
   echo '</select>';

   //戻るボタン
   echo '<div class="header back-box">';
   $translator = new Translator();
   $txtArr = array('戻る','クリックしてファイルを選択','自己紹介文','はい','いいえ');
   for($i = 0; $i < count($txtArr); $i++){
       $originalText = $txtArr[$i];
       $originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
       $txtArr[$i] = $originalText;
   }
   echo '<button id="backButton" type="button">'.$txtArr[0].'</button>';//戻るボタン
   echo '</div>';
   echo '<div class="profile-box">';
   echo '<input type="file"  name="icon" id="fileInput" style="display: none;" />';
   echo '<img src="../image/',$row['icon'],'" id="image" alt="'.$txtArr[1].'">';

   echo '<input class="editable" name="user_name" id="nameInput" value="',$row['user_name'],'">';// 名前入力ボックス

   echo '<div class="description-box">';
   echo '<div class="intro-title">［'.$txtArr[2].'］</div>';
   echo '<div id="description" class="description editable" contenteditable="true">',$row['message'],'</div>';
   echo '<input class="description editable" name="description" id="descriptionInput" value="',$row['message'],'">';
   echo '</div>';

   echo '<div id="confirmationDialog" style="display: none;">';
   echo '<button id="confirmYes" type="submit">'.$txtArr[3].'</button>';
   echo '<button id="confirmNo" type="button">'.$txtArr[4].'</button>';
   echo '</div>';

   echo '</form>';
   echo '<script src="../JavaScript/mypage.js"></script>';
   echo '</body>';
   echo '</html>';
   ?>
   

   