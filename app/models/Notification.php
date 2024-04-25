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
        $SQL = 'INSERT INTO Notification VALUES (DEFAULT, :userId, :content, :type, :timestamp)';
        $STMT = $this->db_conn->prepare($SQL);
        $STMT->execute([
            'userId' => $userId,
            'content' => $content,
            'type' => $type,
            'timestamp' => $timestamp,
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
}
