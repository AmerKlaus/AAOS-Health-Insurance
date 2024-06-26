<?php

namespace app\models;

use PDO;

class Profile
{
    public string $profile_id;
    public string $user_id;
    public string $policy_number;
    public string $birthdate;
    public string $profile_picture;
    public string $date_created;

    public static function getByUserId(PDO $db_conn, $user_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['user_id' => $user_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
        $profile = $STMT->fetch();

        return $profile;
    }

    public static function createProfile(PDO $db_conn, $user_id, $birthdate, $profile_picture, $policy_number)
    {
        $SQL = 'INSERT INTO Profile (user_id, birthdate, profile_picture, policy_number, date_created) VALUES (:user_id, :birthdate, :profile_picture, :policy_number, NOW())';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute([
            'user_id' => $user_id,
            'birthdate' => $birthdate,
            'profile_picture' => $profile_picture,
            'policy_number' => $policy_number
        ]);
    }

    public static function getForUser(PDO $db_conn, $user_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(
            ['user_id' => $user_id]
        );
        //there is a mistake in the next line
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\profile');//set the type of data returned by fetches
        return $STMT->fetch();//return (what should be) the only record
    }
    public static function updateProfile(PDO $db_conn, $newProfileData)
    {
        $user_id = $newProfileData['user_id'];
        $birthdate = $newProfileData['birthdate'];
        $policy_number = $newProfileData['policy_number'];
        $profile_picture = $newProfileData['profile_picture'];

        // Update profile data in the database
        $SQL = 'UPDATE Profile SET birthdate = :birthdate, policy_number = :policy_number, profile_picture = :profile_picture WHERE user_id = :user_id';
        $stmt = $db_conn->prepare($SQL);
        $stmt->execute([
            'birthdate' => $birthdate,
            'policy_number' => $policy_number,
            'profile_picture' => $profile_picture,
            'user_id' => $user_id
        ]);

        // Check if the update was successful
        return $stmt->rowCount() > 0;
    }
}
?>