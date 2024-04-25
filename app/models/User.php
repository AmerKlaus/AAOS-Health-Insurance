<?php

namespace app\models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PDO;

class User
{

    public string $user_id;
    public string $username;
    public string $pwd_hash;
    public string $email;
    public string $role_id;
    public string $full_name;
    public string $phone;
    public string $address;
    public ?string $secret;

    public static function createUser(PDO $db_conn, string $username, string $pwd_hash, string $email, string $role_id, string $full_name, string $phone, string $address)
    {
        $raw_sql = 'INSERT INTO User (username, pwd_hash, email, role_id, full_name, phone, address) VALUES (:username, :pwd_hash, :email, :role_id, :full_name, :phone, :address)';
        $stmt = $db_conn->prepare($raw_sql);
        $params = [
            'username' => $username,
            'pwd_hash' => $pwd_hash,
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
        $SQL = 'UPDATE User SET username = :username, pwd_hash = :pwd_hash, email = :email, role_id = :role_id, full_name = :full_name, phone = :phone, address = :address, secret = :secret WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute((array)$this);
    }

    public function delete(PDO $db_conn)
    {
        $SQL = 'DELETE FROM User WHERE user_id = :user_id';
        $STMT = $db_conn->prepare($SQL);
        $STMT->execute(['user_id' => $this->user_id]);
    }

    public function generatePasswordResetToken(PDO $db_conn)
    {
        // Generate a random token
        $token = bin2hex(random_bytes(16));
    
        // Hash the token
        $token_hash = hash("sha256", $token);
    
        // Set the token and expiration time in the user object
        $this->reset_token_hash = $token_hash;
        $this->reset_token_expires_at = date("Y-m-d H:i:s", time() + 60 * 30); // 30 minutes from now
    
        // Update the user record in the database
        $this->updatePasswordAndResetToken($db_conn); // Updated method call
    
        return $token;
    }
    
    public static function getUserByResetToken(PDO $db_conn, string $token)
{
    $raw_sql = 'SELECT * FROM User WHERE reset_token_hash = :token AND reset_token_expires_at > NOW()';
    $stmt = $db_conn->prepare($raw_sql);
    $stmt->execute(['token' => $token]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
    return $stmt->fetch();
}

public function isResetTokenValid(): bool
{
    return strtotime($this->reset_token_expires_at) > time();
}


    
    public function sendResetEmail($recipient, $resetToken)
    {
        // o7
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'aaos.coo@gmail.com'; // Your Gmail email address
            $mail->Password   = 'rogk zfzu btfl rcwt';    // Your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to (google has two make sure its valid its the encryption)

            //Recipients
            $mail->setFrom('AAOS@gmail.com', 'AAOS'); // Sender's email address and name
            $mail->addAddress($recipient); // Recipient's email address
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
           
            $mail->Body = 'Dear user,<br><br>You have requested a password reset. Please click the following link to reset your password:<br>http://localhost/User/resetPassword?token=' . $resetToken . '<br><br>If you did not request this reset, please ignore this email.<br><br>Best regards,<br>Your Company';

          
            // Send the email
            $mail->send();
        } catch (Exception $e) {
            // Log any errors
            error_log("Error sending password reset email: {$mail->ErrorInfo}");
        }
    }


public static function getByEmail(PDO $db_conn, $email)
{
    $raw_sql = 'SELECT * FROM User WHERE email = :email';
    $stmt = $db_conn->prepare($raw_sql);
    $stmt->execute(['email' => $email]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\models\User');
    return $stmt->fetch();
}

public function updatePasswordAndResetToken(PDO $db_conn)
{
    $SQL = 'UPDATE User SET pwd_hash = :pwd_hash, reset_token_hash = :reset_token_hash, reset_token_expires_at = :reset_token_expires_at WHERE user_id = :user_id';
    $STMT = $db_conn->prepare($SQL);
    $STMT->execute([
        'pwd_hash' => $this->pwd_hash,
        'reset_token_hash' => $this->reset_token_hash,
        'reset_token_expires_at' => $this->reset_token_expires_at,
        'user_id' => $this->user_id
    ]);
}



}
?>
