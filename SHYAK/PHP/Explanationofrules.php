
<?php
    //session_start();
    //require 'header.php';
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Explanation of rules</title>
    <link rel="stylesheet" href="../CSS/Explanationofrules.css">
</head>
<body>
<?php
    //require 'api.php';
?>
<br>
    <div class="container">
        <!-- ✘ボタン -->
        <div class="row justify-content-end">
            <div class="col-12 col-md-2">
                <div class="row">
                    
                    <a href="top.php">
                        <button type="button" class="batu"></button>
                    </a>
                </div>
            </div>
        </div>
        <br>
    <?php
    echo '<div class="center_box">';
    $ruleArry = array('[ルール説明]',
     '1.メッセージの投稿: 初めて漂流瓶を利用する場合、まず自分のメッセージを作成します。このメッセージには、自己紹介や興味のあるトピック、共有したいことなどを含めます。',
     '2.漂流瓶の放流: メッセージを完成させたら、それを"漂流瓶"として投稿します。漂流瓶を海に投げるイメージですね。投稿後、そのメッセージは他のユーザーが拾うことができます。',
     '3.漂流瓶の拾得: 他のユーザーが漂流瓶を見つけたら、そのメッセージを読むことができます。興味を持った場合は、そのメッセージに返信することができます。',
     '4.返信の投稿: 拾った漂流瓶に返信する際は、丁寧に相手に対するメッセージを作成します。自己紹介や共通の話題、興味を持った点などについて話し合いましょう。',
     '5.ルールの遵守: 漂流瓶を楽しむ上で、他のユーザーとのコミュニケーションを楽しむために、ルールを守ることが重要です。無礼や攻撃的な言動は避け、相手との良いコミュニケーションを築くよう心がけましょう。',
     '6.プライバシーの尊重: 個人情報やプライバシーに関する情報を共有する際は、慎重に扱いましょう。他のユーザーのプライバシーを尊重し、安全なコミュニケーションを確保します。',
     '以上が漂流瓶の基本的なルールです。これらのルールに従いながら、他のユーザーとの素敵な交流を楽しんでください。');
    
    //$translator = new Translator();
    for($i = 0; $i < count($ruleArry); $i++)//{
        $originalText = $ruleArry[$i];
       //$originalText = $translator->translate($originalText,$_SESSION['User']['lang']);
    echo $originalText.'<br>';
   // }
    echo '</div>';
    echo '</div>';

?>
</body>
</html>

