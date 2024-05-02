<?php

namespace app\models;

use PDO;

class Profile
{
    public string $profile_id;
    public string $user_id;
    public string $birthdate;
    public string $profile_picture;
    public string $date_created;

    public static function getByUserId(PDO $db_conn, $user_id)
    {
        $SQL = 'SELECT * FROM Profile WHERE user_id = :user_id';
        $stmt = $db_conn->prepare($SQL);
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
        return $stmt->fetch();
    }

    public static function createProfile(PDO $db_conn, $user_id)
    {
        $SQL = 'INSERT INTO Profile (user_id, birthdate, profile_picture, date_created) VALUES (:user_id, NOW(), :default_picture, NOW())';
        $stmt = $db_conn->prepare($SQL);
        $defaultPicture = '../images/panda.png'; 
        $stmt->execute(['user_id' => $user_id, 'default_picture' => $defaultPicture]);
    }
    
    
    

}
?>
