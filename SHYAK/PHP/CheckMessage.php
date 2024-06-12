<?php
require 'connect.php';
$pdo = new PDO($connect, USER, PASS);

class CheckMessage {
    public function checkForNewMessages($userName) {
        try {
            global $pdo;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
        // 新しいメッセージがあるかチェックするクエリ
        $sql = 'SELECT COUNT(*) FROM Recieves WHERE user_name = :userName AND is_read = 0';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userName', $userName, PDO::PARAM_INT);
        $stmt->execute();
        $newMessagesCount = $stmt->fetchColumn();
        return $newMessagesCount > 0;
    }
}
?>
