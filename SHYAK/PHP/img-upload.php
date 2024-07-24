<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../img/';
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);

        // ファイルをimgフォルダに移動
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            echo "<script>alart('画像をアップロードしました')</script>" . $uploadFile;
        } else {
            echo "ファイルのアップロードに失敗しました。";
        }
    } else {
        echo "<script>console.log('ファイルアップロードに失敗しました')</script>";
    }
} else {
    echo "無効なリクエストです。";
}
?>
