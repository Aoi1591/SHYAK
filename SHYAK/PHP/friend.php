<?php
session_start();
if (isset($_SESSION['User']['id'])) {
    // ユーザーがログインしている場合の処理
} else {
    echo '<script>alert("Please log in");</script>';
    echo '<script>window.location.href = "https:login-input.php";</script>';
    exit();
}
require 'connect.php';
require 'header.php';
?>

<link rel="stylesheet" href="../CSS/humburger.css">
<link rel="stylesheet" href="../CSS/friend.css">
</head>
<body>

<br><br>
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
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_SESSION['User']['id'])) {
        $user_id = $_SESSION['User']['id'];
        $user_sql = $pdo->prepare('SELECT friend_id FROM Friends WHERE user_id = ?');
        $user_sql->execute([$user_id]);


        while ($row = $user_sql->fetch(PDO::FETCH_ASSOC)) {
            $friend_id = $row['friend_id'];
            $sql = $pdo->prepare('SELECT * FROM Users WHERE user_id = ?');
            $sql->execute([$friend_id]);
            $friend_stmt = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach ($friend_stmt as $friend) {
                $id = htmlspecialchars($friend['user_id']);
                $name = htmlspecialchars($friend['user_name']);
                $country = htmlspecialchars($friend['country_id']);

                echo '<div class="sen">';
                echo '<a class="friend-link" href="UserPage.php?id=' . urldecode($id) . '&name=' . urldecode($name) . '">' . $name . '</a>';
                echo '</div>';
            }
        }
        echo '</table>';
    }
} catch (PDOException $e) {
    echo 'エラーが発生しました: ' . $e->getMessage();
}
?>
</body>
</html>