<?php

namespace app\models;

use PDO;

class User
{

    public string $user_id;
    public string $username;
    public string $password_hash;
    public string $email;
    public string $role_id;
    public string $full_name;
    public string $phone;
    public string $address;

    public static function createUser(PDO $db_conn, string $username, string $password_hash, string $email, string $role_id, string $full_name, string $phone, string $address)
    {
        $raw_sql = 'INSERT INTO User (username, password_hash, email, role_id, full_name, phone, address)
                VALUES (:username, :password_hash, :email, :role_id, :full_name, :phone, :address)';
        $stmt = $db_conn->prepare($raw_sql);
        $params = [
            'username' => $username,
            'password_hash' => $password_hash,
            'email' => $email,
            'role_id' => $role_id,
            'full_name' => $full_name,
            'phone' => $phone,
            'address' => $address
        ];
        try {
            $stmt->execute($params);
            return User::getByUsername($db_conn, $username);
        } catch (\PDOException $e) {
            if ($e->getCode() == '23000') {
                return null;
            } else {
                throw $e;
            }
        }
    }

    public static function getByUsername(PDO $db_conn, $username)
    {
        $raw_sql = 'SELECT * FROM User WHERE username = :username';
        $stmt = $db_conn->prepare($raw_sql);
        $stmt->execute(['username' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $stmt->fetch();
    }

    public static function getById(PDO $db_conn, $user_id)
    {
        $SQL = 'SELECT * FROM User WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['user_id' => $user_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $STMT->fetch();
    }

    public function update(PDO $db_conn)
    {
        $SQL = 'UPDATE User SET username = :username, password_hash = :password_hash, email = :email, role_id = :role_id, full_name = :full_name, phone = :phone, address = :address WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute((array) $this);
    }

    public function delete(PDO $db_conn)
    {
        $SQL = 'DELETE FROM User WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['user_id' => $this->user_id]);
    }

    public function add2FA() {
        // Update the user record with the 2FA secret
        $SQL = 'UPDATE user SET secret = :secret WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'user_id' => $this->user_id,
            'secret' => $this->secret
        ]);
    }
}
?>