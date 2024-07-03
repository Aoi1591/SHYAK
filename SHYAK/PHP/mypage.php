<?php session_start();?>
<?php
require 'connect.php';
require 'header.php';
require 'api.php';
?>
<?php
      
   echo ' <link rel="stylesheet" href="../CSS/mypage.css">';
   echo '</head>';

   echo '<body>';
   echo '<form method="POST" action="mypage-connect.php">';

   //言語選択
   echo '<select name="language" id="LanguageChoice-all" class="LanguageChoice">';
   echo '<option disabled selected>Language Choice</option>';
   echo '<option value="ja">日本語</option>';
   echo '<option value="en">English</option>';
   echo '<option value="ru">русский язык</option>';
   echo '<option value="pt">português</option>';
   echo '<option value="fr">français</option>';
   echo '<option value="zh-Hans">简体中文</option>';
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
   echo '<button id="backButton" type="button" onclick="history.back()">'.$txtArr[0].'</button>';
   echo '</div>';
   //DB
   $pdo = new PDO($connect,USER,PASS);
   $sql = $pdo -> prepare('select user_name,icon,message from Users WHERE user_id=?');//DB再構築後名前を確認
   $sql -> execute([$_SESSION['User']['id']]);
   $row = $sql ->fetch(PDO::FETCH_ASSOC);
   echo '<div class="profile-box">';
   echo '<input type="file"  name="icon" id="fileInput" style="display: none;" />';
   echo '<img src="../img/',$row['icon'],'" id="image" alt="'.$txtArr[1].'">';
//    echo '<div id="name" name="name" class="editable" contenteditable="true">',$row['user_name'],'</div>';
   echo '<div name="name" class="editable" contenteditable="true">',$row['user_name'],'</div>';
   echo '<input type="hidden" name="name" id="nameInput" value="',$row['user_name'],'">';
   echo '<input type="hidden" name="name" id="nameInput" value="',$row['user_name'],'">';
   echo '</div>';

   echo '<div class="description-box">';
   echo '<div class="intro-title">［'.$txtArr[2].'］</div>';
   echo '<div id="description" class="description editable" contenteditable="true">',$row['message'],'</div>';
   echo '<input type="hidden" name="description" id="descriptionInput" value="',$row['message'],'">';
   echo '</div>';

   echo '<div id="confirmationDialog" style="display: none;">';
   echo '<p>'.$txtArr[3].'</p>';
   echo '<button id="confirmYes" type="submit">'.$txtArr[4].'</button>';
   echo '<button id="confirmNo" type="button">'.$txtArr[5].'</button>';
   echo '</div>';

   echo '</form>';
   echo '<script src="../JavaScript/mypage.js"></script>';
   echo '</body>';
   echo '</html>';
   ?>
   