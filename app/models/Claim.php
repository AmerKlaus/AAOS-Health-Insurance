<?php

namespace app\models;

use PDO;

class Claim
{
    public $claim_id;
    public $user_id;
    public $policy_id;
    public $claim_type;
    public $claim_details;
    public $claim_date;
    public $status;
    public $health_card_number;

    // Insert a new claim into the database
    public function insert(PDO $db_conn)
    {
        $SQL = 'INSERT INTO Claim (policy_id, user_id, claim_type, claim_details, submission_date, status, health_insurance_number) 
                VALUES (:policy_id, :user_id, :claim_type, :claim_details, :submission_date, :status, :health_insurance_number)';
        $STMT = $db_conn->prepare($SQL);
        $data = [
            'policy_id' => $this->policy_id,
            'user_id' => $this->user_id,
            'claim_type' => $this->claim_type,
            'claim_details' => $this->claim_details,
            'submission_date' => $this->claim_date,
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
        $result = $STMT->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Create a new Claim instance and populate its attributes
            $claim = new Claim();
            $claim->claim_id = $result['claim_id'];
            $claim->user_id = $result['user_id'];
            $claim->policy_id = $result['policy_id'];
            $claim->claim_type = $result['claim_type'];
            $claim->submission_date = $result['submission_date'];
            $claim->status = $result['status'];
            $claim->claim_details = $result['claim_details'];
            $claim->health_insurance_number = $result['health_insurance_number'];

            return $claim;
        } else {
            return null; // Claim not found
        }
    }

}

?>