<?php

namespace app\models;

use PDO;

class Admin extends \app\core\Model
{

    public string $admin_id;
    public string $username;
    public string $pwd_hash;
    public string $email;

    public static function getByUsername(PDO $db_conn, $username)
    {
        $SQL = 'SELECT * FROM Admin WHERE username = :username';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['username' => $username]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Admin');
        $admin = $STMT->fetch();

        if ($admin) {
            return $admin;
        } else {
            return null;
        }
    }

    public function insertReview(PDO $db_conn, $claimId, $notes)
    {
        $SQL = 'INSERT INTO Claim_Review (claim_Id, admin_Id, review_date, review_outcome, notes) VALUES (:claim_Id, :admin_Id, NOW(), :review_outcome, :notes)';
        $STMT = $db_conn->prepare($SQL);
        $adminId = $_SESSION['admin_id']; // Assuming you have the admin ID stored in session
        $reviewOutcome = 'Pending'; // Set the review outcome as needed
        $STMT->execute(['claim_Id' => $claimId, 'admin_Id' => $adminId, 'review_outcome' => $reviewOutcome, 'notes' => $notes]);
    }

    public function updateClaimStatus(PDO $db_conn, $claimId, $status)
    {
        // Update claim status in the database
        $SQL = 'UPDATE Claim SET status = :status WHERE claim_id = :claimId';
        $stmt = $db_conn->prepare($SQL);
        $stmt->execute([
            'status' => $status,
            'claimId' => $claimId
        ]);

        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }
}
