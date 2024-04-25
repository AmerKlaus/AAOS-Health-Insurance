<?php

namespace app\models;

use PDO;

class Admin extends \app\core\Model
{

    public string $admin_id;
    public string $username;
    public string $password_hash;
    public string $email;

    // TODO: Change to static method, like createUser()
    public function register($username, $email, $password)
    {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the admin record into the database
        $SQL = 'INSERT INTO Admin VALUES (DEFAULT, :username, :email, :password)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['username' => $username, 'email' => $email, 'password' => $hashedPassword]);
    }

    public static function getByUsername(PDO $db_conn, $username)
    {
        $SQL = 'SELECT * FROM Admin WHERE username = :username';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['username' => $username]);
        $admin = $STMT->fetch(PDO::FETCH_CLASS, 'app\models\Admin');

        if ($admin) {
            return $admin;
        } else {
            return null;
        }
    }

    public function insertReview(PDO $db_conn, $claimId, $notes)
    {
        $SQL = 'INSERT INTO Claim_Review (claimId, adminId, review_date, review_outcome, notes) VALUES (:claimId, :adminId, NOW(), :review_outcome, :notes)';
        $STMT = $db_conn->prepare($SQL);
        $adminId = $_SESSION['admin_id']; // Assuming you have the admin ID stored in session
        $reviewOutcome = 'Pending'; // Set the review outcome as needed
        $STMT->execute(['claimId' => $claimId, 'adminId' => $adminId, 'review_outcome' => $reviewOutcome, 'notes' => $notes]);
    }


    // public function requestAdditionalInformation($claimId, $additionalInfo)
    // {
    //     // Implement logic to update claim status and request additional information
    //     $SQL = 'INSERT INTO claim_review (claim_id, admin_id, review_date, review_outcome, notes) 
    //     VALUES (:claimId, :adminId, :reviewDate, :reviewOutcome, :notes)';
    //     $STMT = self::$_conn->prepare($SQL);
    //     $STMTReview->execute([
    //         'claimId' => $claimId,
    //         'adminId' => $adminId,
    //         'reviewDate' => $reviewDate,
    //         'reviewOutcome' => $reviewOutcome,
    //         'notes' => $additionalInfo
    //     ]);
    // }

    // Other admin-related methods...
}
