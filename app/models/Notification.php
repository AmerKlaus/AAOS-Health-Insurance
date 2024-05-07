<?php

namespace app\models;

use PDO;

class Notification
{
    private $db_conn;

    public function __construct(PDO $db_conn)
    {
        $this->db_conn = $db_conn;
    }

    public function createNotification($claimId, $content, $type)
    {
        $timestamp = date('Y-m-d H:i:s');

        // Fetch userId associated with the claimId
        $userId = $this->getUserIdFromClaim($claimId);

        // Insert notification into the database
        $SQL = 'INSERT INTO Notification VALUES (DEFAULT, :userId, :claimId, :timestamp, :type, :content)';
        $STMT = $this->db_conn->prepare($SQL);
        $STMT->execute([
            'userId' => $userId,
            'claimId' => $claimId,
            'timestamp' => $timestamp,
            'type' => $type,
            'content' => $content,
        ]);
        return true;
    }

    private function getUserIdFromClaim($claimId)
    {
        $SQL = 'SELECT user_id FROM Claim WHERE claim_id = :claimId';
        $STMT = $this->db_conn->prepare($SQL);
        $STMT->execute(['claimId' => $claimId]);
        $result = $STMT->fetch(PDO::FETCH_ASSOC);
        return $result['user_id'] ?? null;
    }

    public function getNotificationsByUserId($user_id)
    {
        $SQL = 'SELECT * FROM Notification WHERE user_id = :user_id ORDER BY timestamp DESC';
        $STMT = $this->db_conn->prepare($SQL);
        $STMT->execute(['user_id' => $user_id]);
        return $STMT->fetchAll(PDO::FETCH_OBJ);
    }

    public function removeNotification(PDO $db_conn, $claim_id)
    {
        $SQL = 'DELETE FROM Notification WHERE claim_id = :claim_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['claim_id' => $claim_id]);
    }

}
?>