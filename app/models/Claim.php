<?php

namespace app\models;

use PDO;

class Claim
{
    public $claim_id;
    public $user_id;
    public $claim_type;
    public $claim_details;
    public $submission_date;
    public $status;
    public $health_card_number;

    // Insert a new claim into the database
    public function insert(PDO $db_conn)
    {
        // Could use SQL function CURDATE() as the submission date
        $SQL = 'INSERT INTO Claim VALUES (DEFAULT, :user_id, :claim_type, :claim_details, :submission_date, :status, :health_insurance_number)';
        $STMT = $db_conn->prepare($SQL);
        $data = [
            'user_id' => $this->user_id,
            'claim_type' => $this->claim_type,
            'claim_details' => $this->claim_details,
            'submission_date' => $this->submission_date,
            'status' => $this->status,
            'health_insurance_number' => $this->health_card_number
        ];
        $STMT->execute($data);
    }

    public function getPendingClaimDocuments(PDO $db_conn)
    {
        // Implement logic to retrieve pending claim documents for review
        $SQL = 'SELECT * FROM Claim WHERE status = :status';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['status' => 'Pending']);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Claim');
        return $STMT->fetchAll();
    }

    public static function getClaimById(PDO $db_conn, $claimId)
    {
        $SQL = 'SELECT * FROM Claim WHERE claim_id = :claimId';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['claimId' => $claimId]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Claim');
        $result = $STMT->fetch();

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

}

?>