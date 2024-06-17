<?php
session_start();
require 'connect.php';
require 'header.php';
?>

<link rel="stylesheet" href="../CSS/humburger.css">
</head>
<body>
<?php require 'menu-humburger.php'; ?>

<?php
      echo '<img src = "">'; //friendマークの画僧挿入
      echo '<a href = "friend.php">フレンドリスト</a>';
      echo '<a href = "friend-requset.php">フレンドリクエスト</a>';
// エラーハンドリングのためのtry-catchブロックを追加
try {
    // データベース接続の設定
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // セッション変数が定義されているか確認
    if (isset($_SESSION['Users']['user_id'])) {
        $user_id = $_SESSION['Users']['user_id'];

        // 友達のIDを取得するSQLクエリ
        $user_sql = $pdo->prepare('SELECT friend_id FROM Friends WHERE user_id = ?');
        $user_sql->execute([$user_id]);

        // 友達の情報を表示するためのテーブルを作成
        echo '<table>';
        echo '<tr><th>名前</th><th>国籍</th></tr>';

        // 友達のIDごとに情報を取得し表示
        while ($row = $user_sql->fetch(PDO::FETCH_ASSOC)) {
            $friend_id = $row['friend_id'];
            $sql = $pdo->prepare('SELECT * FROM Users WHERE user_id = ?');
            $sql->execute([$friend_id, 1]);
            $friend_stmt = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($friend_stmt as $friend) {
                $id = htmlspecialchars($friend['user_id']);
                $name = htmlspecialchars($friend['user_name']);
                $country = htmlspecialchars($friend['country_id']);

                echo '<tr>';
                // 名前の部分を押したらユーザーページへ遷移
                echo '<td><a href="user.php?id=' . urldecode($id) . '&name=' . urldecode($name) . '">' . $name . '</a></td>';
                echo '<td>' . $country . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
   } else {
    ob_start();
    include('header.php');

    echo '<script>alert("Please log in");</script>';
    header('Location:login-input.php');
    ob_end_flush();
    exit();
    }
} catch (PDOException $e) {
    echo 'エラーが発生しました: ' . $e->getMessage();
}
?>

</body>
</html>
