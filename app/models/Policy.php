<?php

namespace app\models;

use PDO;

class Policy {
	string $policy_id;
	string $number;

	public static function getByID(PDO $db_conn, $policy_id) {
		$raw_sql = 'SELECT * FROM `policies` WHERE policy_id = :policy_id';
    	$stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\Policy');
        return $stmt->fetch();
    }

    public static function getByNumber(PDO $db_conn, $number) {
		$raw_sql = 'SELECT * FROM `policies` WHERE number = :number';
    	$stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['number' => $number]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\Policy');
        return $stmt->fetch();
    }

}