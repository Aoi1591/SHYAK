<?php
session_start();
// ユーザーがログインしているか確認
if (isset($_SESSION['User']['id'])) {
    // ユーザーがログインしている場合の処理
} else {
    // ログインしていない場合はログインページにリダイレクト
    echo '<script>alert("Please log in");</script>';
    echo '<script>window.location.href = "https://login-input.php";</script>';
    exit();
}

// データベース接続ファイルとヘッダーファイルをインクルード
require 'connect.php';
require 'header.php';
?>
<!-- 外部スクリプトとスタイルシートのインクルード -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="../CSS/humburger.css">
<link rel="stylesheet" href="../CSS/friend.css">
</head>
<body>

<br><br>
<!-- フレンドリストとフレンドリクエストのリンクボタンを配置 -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
            <a href="friend.php" class="flex-fill">
                <button type="button" class="friend1">フレンドリスト</button>
            </a>
            <a href="friend-request.php" class="flex-fill">
                <button type="button" class="friend2">フレンドリクエスト</button>
            </a>
            <a href="top.php">
                <button type="button" class="batu"></button>
            </a>
        </div>
    </div>
</div>

<?php
try {
    // データベース接続設定
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // フレンドリクエスト一覧の表示
    echo '<div class="uzer">';
    $user_id = $_SESSION['User']['id'];

    // フレンドリクエストを取得するSQLクエリを準備
    $User_sql = $pdo->prepare('SELECT id, friend_id FROM Friends WHERE user_id = ? AND flag = 2'); // フラグ2はフレンド申請
    $User_sql->execute([$user_id]);
    $requests = $User_sql->fetchAll(PDO::FETCH_ASSOC);

    // 各フレンドリクエストに対するユーザー情報を表示
    echo '<div class="request">';


    foreach ($requests as $request) {
        $Fid = $request['id'];
        $friend_id = $request['friend_id'];
        
        // フレンドの詳細を取得するSQLクエリを準備
        $friend_sql = $pdo->prepare('SELECT * FROM Users WHERE user_id = ?'); // 変更: user_id -> id
        $friend_sql->execute([$friend_id]);
        $friends = $friend_sql->fetchAll(PDO::FETCH_ASSOC);

        // フレンド情報を表示
        foreach ($friends as $friend) {
            $id = htmlspecialchars($friend['user_id']); // 変更: user_id -> id
            $name = htmlspecialchars($friend['user_name']);
        
            echo '<div class="sen">';
            echo '<a href="user.php?id=' . urldecode($id) . '&name=' . urldecode($name) . '">' . $name . '</a>';
            echo '<button class="approve-friend" data-id="' . $Fid . '">許可</button>';
            echo '<button class="reject-friend" data-id="' . $Fid . '">却下</button>';
            echo "<br>";
            echo '</div>';
        }
    }
    echo '</div>';
    echo '</div>';
} catch (PDOException $e) {
    // データベース接続またはクエリ実行エラー時の処理
    echo 'エラーが発生しました: ' . $e->getMessage();
}

?>
<?php
// 既存のコード
?>
<script>
// フレンドリクエストの許可・却下ボタンのクリックイベントハンドラを設定
$(document).ready(function() {
    $('.approve-friend, .reject-friend').on('click', function() {
        var id = $(this).data('id');
        var action = $(this).hasClass('approve-friend') ? 'approve' : 'reject';

        // Ajaxリクエストでフレンドリクエストの許可・却下をサーバーに送信
        $.ajax({
            url: 'friend_action.php',
            type: 'POST',
            data: { action: action, id: id },
            success: function(response) {
                // サーバーからの応答に基づいてアラートを表示し、ページをリロード
                alert(response);
                location.reload(); // ページをリロードして変更を反映
            },
            error: function() {
                // エラーメッセージを表示
                alert('エラーが発生しました。');
            }
        });
    });
});
</script>
</body>
</html>
