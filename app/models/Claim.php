<?php

namespace app\models;

use PDO;

class Claim extends \app\core\Model
{
    public $claim_id;
    public $user_id;
    public $policy_id;
    public $claim_type;
    public $claim_details;
    public $claim_date;
    public $status;
    public $health_card_number;

    // Establish database connection
    public function __construct()
    {
        parent::__construct();
    }

    // Insert a new claim into the database
    public function insert()
    {
        $SQL = 'INSERT INTO Claim (policy_id, user_id, claim_type, claim_details, submission_date, status, health_insurance_number) 
                VALUES (:policy_id, :user_id, :claim_type, :claim_details, :submission_date, :status, :health_insurance_number)';
        $STMT = self::$_conn->prepare($SQL);
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

    public static function getPolicyIdFromNumber($policyNumber)
    {
        $SQL = 'SELECT policy_id FROM Policy WHERE policy_number = :policy_number';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['policy_number' => $policyNumber]);
        $result = $STMT->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['policy_id'] : null;
    }

}

?>