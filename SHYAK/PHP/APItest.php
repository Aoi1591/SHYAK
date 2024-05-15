<?php require 'header.php';?>

<?php

class Translator {
    public function translate($text): void {
        // cURLの初期化
        $ch = curl_init();

        // キーとリージョンの指定
        $key = "8d961f7fadf3441d9b12285b07e0ed50";
        $region = "Japanwest";
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Ocp-Apim-Subscription-Key: " . $key,
            "Ocp-Apim-Subscription-Region: " . $region,
            "Content-Type: application/json; charset=UTF-8"
        ));

        // URLと翻訳言語の指定
        $from = 'en';
        $to = 'ja';
        $url = "https://api.cognitive.microsofttranslator.com/translate?api-version=3.0&from=".$from."&to=".$to;
        curl_setopt($ch, CURLOPT_URL, $url);

        // 翻訳テキストの指定
        $json = json_encode([['Text' => $text]]);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // 送信と応答
        $result = curl_exec($ch);

        // レスポンスをデコード
        $decode = json_decode($result);

        // エラーチェック
        if (isset($decode->error)) {
            throw new Exception("翻訳に失敗しました。code:". $decode->error->code . " message:" . $decode->error->message);
        }

        // 翻訳結果表示
        echo $decode[0]->translations[0]->text;
        return;
    }
}

// 使用例
$translator = new Translator();
$translator->translate("Hello, what is your name?");
?>

<?php require 'footer.php';?>