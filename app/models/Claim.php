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

}

?>