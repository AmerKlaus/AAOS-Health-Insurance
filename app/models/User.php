<?php

namespace app\models;

use PDO;

class User {
    public string $user_id;
    public string $username;
    public string $password_hash;
    public string $policy_id;
    public string $name;
    public string $email;
    public string $address;

    public static function create(PDO $db_conn, string $username, string $password_hash, string $policy_id, string $name, string $email, string $address) {
        $raw_sql = 'INSERT INTO `users` VALUES (DEFAULT, :username, :password_hash, :policy_id, :name, :email, :address)';
        $stmt = $db_conn->prepare($raw_sql);
        $params = [
            'username' => $username,
            'password_hash' => $password_hash,
            'policy_id' => $policy_id,
            'name' => $name,
            'email' => $email,
            'address' => $address
        ];
        try {
            $stmt->execute($params);
            return true;
        }
        catch (\PDOException $e) {
            if ($e->getCode() == '23000') {
                return null;
            } 
            else {
                throw $e;
            }
        }
    }

    public static function getByUsername(PDO $db_conn, $username) {
        $raw_sql = 'SELECT * FROM `users` WHERE username = :username';
        $stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $stmt->fetch();
    }

    public static function getByID(PDO $db_conn, $user_id) {
        $raw_sql = 'SELECT * FROM `users` WHERE user_id = :user_id';
        $stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $stmt->fetch();
    }

    public function update(PDO $db_conn) {
        $raw_sql = 'UPDATE `users` SET username = :username, password_hash = :password_hash, policy_id = :policy_id, name = :name, email = :email, address = :address WHERE user_id = :user_id';
        $stmt = $db_conn->prepare($raw_sql);
        $stmt->execute((array)$this);
        return true;
    }

    public function delete(PDO $db_conn) {
        $raw_sql = 'DELETE FROM `users` WHERE user_id = :user_id';
        $stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['user_id' => $this->user_id]);
        return true;
    }
}
