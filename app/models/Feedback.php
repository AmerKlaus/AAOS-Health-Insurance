<?php

namespace app\models;

use PDO;

class Feedback
{
    public $feedback_id;
    public $user_id;
    public $timestamp;
    public $feedback_text;

    public function insert(PDO $db_conn)
    {
        $SQL = 'INSERT INTO Feedback VALUES (DEFAULT, :user_id, :timestamp, :feedback_text)';
        $STMT = $db_conn->prepare($SQL);
        $data = [
            'user_id' => $this->user_id,
            'timestamp' => $this->timestamp,
            'feedback_text' => $this->feedback_text
        ];
        $STMT->execute($data);
    }

    public static function createFeedback(PDO $db_conn, $user_id, $feedback_text)
    {
        $feedback = new Feedback();
        $feedback->user_id = $user_id;
        $feedback->timestamp = date("Y-m-d H:i:s");
        $feedback->feedback_text = $feedback_text;
        $feedback->insert($db_conn);
    }
}
