<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>
<?php
      
   echo ' <link rel="stylesheet" href="../CSS/mypage.css">';
   echo '</head>';

   echo '<body>';
   echo '<form method="POST" action="mypage-connect.php">';

   //言語選択
   echo '<select name="language" id="LanguageChoice-all" class="LanguageChoice">';
   echo '<option disabled selected>Language Choice</option>';
   echo '<option value="Japanese">日本語</option>';
   echo '<option value="English">English</option>';
   echo '<option value="Russian">русский язык</option>';
   echo '<option value="Portuguese">português</option>';
   echo '<option value="French">français</option>';
   echo '<option value="Chinese">中文</option>';
   echo '</select>';

   //戻るボタン
   echo '<div class="header back-box">';
   echo '<button id="backButton" type="button">戻る</button>';
   echo '</div>';

   //DB
   $pdo = new PDO($connect,USER,PASS);
   $sql = $pdo -> prepare('select user_name,icon,message from users WHERE id=?');//DB再構築後名前を確認
   $sql -> execute([$_SESSION['users']['id']]);
   $row = $sql ->fetch(PDO::FETCH_ASSOC);

   echo '<div class="profile-box">';
   echo '<input type="file"  name="icon" id="fileInput" style="display: none;" />';
   echo '<img src="../img/',$row['icon'],'" id="image" alt="クリックしてファイルを選択">';
   echo '<div id="name" name="name" class="editable" contenteditable="true">',$row['user_name'],'</div>';
   echo '<input type="hidden" name="name" id="nameInput" value="',$row['user_name'],'">';
   echo '</div>';

   echo '<div class="description-box">';
   echo '<div class="intro-title">［自己紹介文］</div>';
   echo '<div id="description" class="description editable" contenteditable="true">',$row['message'],'</div>';
   echo '<input type="hidden" name="description" id="descriptionInput" value="',$row['message'],'">';
   echo '</div>';

   echo '<div id="confirmationDialog" style="display: none;">';
   echo '<p>変更を保存しますか？</p>';
   echo '<button id="confirmYes" type="submit">はい</button>';
   echo '<button id="confirmNo" type="button">いいえ</button>';
   echo '</div>';

   echo '</form>';
   echo '<script src="../JavaScript/mypage.js"></script>';
   echo '</body>';
   echo '</html>';
   ?>
   