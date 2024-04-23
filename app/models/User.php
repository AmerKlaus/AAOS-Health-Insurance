<?php

namespace app\models;

use PDO;

class User extends \app\core\Model
{
    public $user_id;
    public $username;
    public $password_hash;
    public $email;
    public $role_id;
    public $full_name;
    public $phone;
    public $address;

    // Establish database connection
    public function __construct()
    {
        parent::__construct();
    }

    // Create a new user
    public function insert()
    {
        $SQL = 'INSERT INTO User (username, password_hash, email, role_id, full_name, phone, address) 
                VALUES (:username, :password_hash, :email, :role_id, :full_name, :phone, :address)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'username' => $this->username,
            'password_hash' => $this->password_hash,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'address' => $this->address
        ];
        $STMT->execute($data);
    }

    // Retrieve a user by username
    public static function get($username)
    {
        $SQL = 'SELECT * FROM User WHERE username = :username';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['username' => $username]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $STMT->fetch();
    }

    // Retrieve a user by user_id
    public function getById($user_id)
    {
        $SQL = 'SELECT * FROM User WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['user_id' => $user_id]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
        return $STMT->fetch();
    }
    // Update user information
    public function update()
    {
        $SQL = 'UPDATE User SET username = :username, password_hash = :password_hash, email = :email, role_id = :role_id, full_name = :full_name, phone = :phone, address = :address WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute((array) $this);
    }

    // Delete a user 
    public function delete()
    {
        $SQL = 'DELETE FROM User WHERE user_id = :user_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['user_id' => $this->user_id]);
    }
}

?>