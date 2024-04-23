<?php

namespace app\models;

use PDO;

class Policy {
	public static function getIdFromNumber(PDO $db_conn, $policyNumber) {
		$SQL = 'SELECT policy_id FROM Policy WHERE policy_number = :policy_number';
		$STMT = $db_conn->prepare($SQL);
		$STMT->execute(['policy_number' => $policyNumber]);
		$result = $STMT->fetch(PDO::FETCH_ASSOC);
		return $result ? $result['policy_id'] : null;
	}

}

?>