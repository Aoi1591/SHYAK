<?php
class CheckMessage {
    public function checkForNewMessages($userId) {
        // データベース接続
        $dsn = 'mysql:host=mysql304.phy.lolipop.lan;dbname=LAA1516890-shyak';
        $username = 'LAA1516890';
        $password = 'Saoao1913K';
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }

        // 新しいメッセージがあるかチェックするクエリ
        $sql = 'SELECT COUNT(*) FROM Recieves WHERE user_id = :userId AND is_read = 0';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $newMessagesCount = $stmt->fetchColumn();

        return $newMessagesCount > 0;
    }
}
?>
