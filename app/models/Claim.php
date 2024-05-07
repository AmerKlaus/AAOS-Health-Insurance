<?php

namespace app\models;

use PDO;

class Claim {
    string $claim_id;
    string $date_submitted;
    string $user_id;
    string $expense_date;
    string $status;
  
    public static function create(PDO $db_conn, string $user_id, string $expense_date) {
        $raw_sql = 'INSERT INTO `claims` VALUES (DEFAULT, CURDATE(), :user_id, :expense_date, DEFAULT)';
        $stmt = $db_conn->prepare($raw_sql);
        $params = ['user_id' => $user_id, 'expense_date' => $expense_date];
        $stmt->execute($params);
        return true;
    }

    public static function getByID(PDO $db_conn, string $claim_id) {
        $raw_sql = 'SELECT * FROM `claims` WHERE claim_id = :claim_id';
        $stmt = $db_conn->prepare($raw_sql);
        $params = ['claim_id' => $claim_id];
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\Claim');
        return $stmt->fetch();
    }

    public static function getByUserID(PDO $db_conn, string $user_id) {
        $raw_sql = 'SELECT * FROM `claims` WHERE user_id = :user_id ORDER BY date_submitted ASC';
        $stmt = $db_conn->prepare($raw_sql);
        $params = ['user_id' => $user_id];
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\Claim');
        return $stmt->fetchAll();
    }
}