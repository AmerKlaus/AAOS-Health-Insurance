<?php
namespace app\models;

use PDO;

class Feedback
{
    public $feedback_id;
    public $user_id;
    public $timestamp;
    public $message;

    // Insert a new feedback into the database
    public function insert(PDO $db_conn)
    {
        $SQL = 'INSERT INTO Feedback (user_id, timestamp, feedback_text) 
                VALUES (:user_id, :timestamp, :message)';
        $STMT = $db_conn->prepare($SQL);
        $data = [
            'user_id' => $this->user_id,
            'timestamp' => $this->timestamp,
            'message' => $this->message
        ];
        $STMT->execute($data);
    }
}
?>