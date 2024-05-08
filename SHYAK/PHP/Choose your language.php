<?php
    require './common/header.php';
    require './common/db-connect.php';

    echo '<p>Choose your language</p>';
    echo '<input type="submit" value="戻る">';
    echo '<input type="submit" value="Français">';
    echo '<input type="submit" value="Русский">';
    echo '<input type="submit" value="中文">';
    echo '<input type="submit" value="日本語">';
    echo '<input type="submit" value="English">';
    echo '<input type="submit" value="Português">';
    echo $data = file_get_contents($filePath);

    // header関数でコンテンツの形式が画像であると宣言
    header('Content-type: image/jpg');
    
    //データを出力
    echo $data;
    

    require './common/footer.php';
?>