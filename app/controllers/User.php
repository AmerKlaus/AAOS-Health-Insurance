<?php
namespace app\controllers;

use \PDO;
use app\models\Profile;
use chillerlan\Authenticator\Authenticator;
use chillerlan\Authenticator\AuthenticatorOptions;
use chillerlan\QRCode\QRCode;

class User extends \app\core\Controller
{

    public function logout()
    {
        session_destroy();
        header('Location: /Home/index');
        exit;
    }

    public function login()
    {
        // Show the login form and log the user in
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $user = \app\models\User::getByUsername($this->db_conn, $username);

            if ($user && password_verify($_POST['password'], $user->pwd_hash)) {
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['2fa_verified'] = false;


                // Check if the user has set up 2FA
                if ($user->secret === null) {

                    // Redirect to 2FA setup page
                    header('location:/User/setup2fa');
                    exit; // Stop further execution
                } else {
                    header('location:/User/check2fa');
                    exit;
                }
            } else {
                session_destroy();
                header('location:/User/login');
                exit;
            }
        } else {
            $this->view('User/login');
        }
    }

    public function register()
    {
        // Display the registration form and process the registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create a new User object
            $created_user_obj = \app\models\User::createUser(
                $this->db_conn,
                $_POST['username'],
                password_hash($_POST['password'], PASSWORD_DEFAULT),
                $_POST['email'],
                '1',
                $_POST['full_name'],
                $_POST['phone'],
                $_POST['address']
            );

            if (is_null($created_user_obj)) {
                // Should redirect to an error page
                return;
            } else {
                header('Location:/User/login');
            }

        } else {
            $this->view('User/register');
        }
    }

    //Fix
    public function setup2fa()
    {
        $options = new AuthenticatorOptions();
        $authenticator = new Authenticator($options);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_SESSION['secret_setup'])) {
                $authenticator->setSecret($_SESSION['secret_setup']);
            } else {
                header('location:/User/setup2fa');
                exit;
            }

            // Ideally this would reuse/share code from the check2fa method
            if ($authenticator->verify($_POST['totp'])) {
                $user_obj = \app\models\User::getByID($this->db_conn, $_SESSION['user_id']);
                $user_obj->secret = $_SESSION['secret_setup'];
                $user_obj->update($this->db_conn);
                $_SESSION['2fa_verified'] = true;
                header('location:/Home/index');
                exit;
            } else {
                $this->view('Core/genericerrorpage', '2FA verification failed');
                exit;
            }
        } else {
            $user_obj = \app\models\User::getByID($this->db_conn, $_SESSION['user_id']);

            // If the form was not submitted, generate the secret and QR code
            $_SESSION['secret_setup'] = $authenticator->createSecret();

            $uri = $authenticator->getUri('AAOS', 'localhost');
            $QRCode = (new QRCode)->render($uri);

            $this->view('User/setup2fa', ['QRCode' => $QRCode]);
            exit;
        }
    }

    public function check2fa()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user_obj = \app\models\User::getByID($this->db_conn, $_SESSION['user_id']);
            $options = new AuthenticatorOptions();
            $authenticator = new Authenticator($options);
            $authenticator->setSecret($user_obj->secret);

            if ($authenticator->verify($_POST['totp'])) {
                $_SESSION['2fa_verified'] = true;
                header('location:/Home/index');
                exit;
            }
            else {
                $_SESSION['2fa_verified'] = false;
                $this->view('Core/genericerrorpage', '2FA verification failed');
                exit;
            }

        } else {
            $this->view('User/check2fa');
            exit;
        }

    }

    public function forgotPassword()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the email entered by the user
            $email = $_POST['email'];

            // Check if the email exists in the database
            $user = \app\models\User::getByEmail($this->db_conn, $email);

            if ($user) {
                // If the email exists, generate a password reset token
                $resetToken = $user->generatePasswordResetToken($this->db_conn);
                // Send the password reset email using the model method
                $user->sendResetEmail($email, $resetToken);

                // Display a success message to the user
                $this->view('User/resetPasswordSuccess', ['email' => $email]);
                exit;
            } else {
                // Email not found in the database
                $errorMessage = "The email address provided is not associated with any account.";
                $this->view('User/forgotPassword', ['errorMessage' => $errorMessage]);
                exit;
            }
        } else {
            // Display forgot password form
            $this->view('User/forgotPassword');
            exit;
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['token'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword !== $confirmPassword) {
                $errorMessage = "Passwords do not match.";
                $this->view('User/resetPasswordForm', ['errorMessage' => $errorMessage]);
                exit;
            }

            // Should just include the user_id or username with the token
            $user = \app\models\User::getUserByResetToken($this->db_conn, $token);

            if ($user && $user->isResetTokenValid()) {
                $user->pwd_hash = password_hash($newPassword, PASSWORD_DEFAULT);
                $user->reset_token_hash = null;
                $user->reset_token_expires_at = null;

                $user->updatePasswordAndResetToken($this->db_conn);

                header('Location: /User/login');
                exit;
            } else {
                // Invalid token or token expired, redirect with error message
                $errorMessage = "Invalid or expired token.";
                $this->view('User/resetPasswordForm', ['errorMessage' => $errorMessage]);
                exit;
            }
        } else {
            $token = $_GET['token'] ?? '';
            $this->view('User/resetPasswordForm', ['token' => $token]);
            exit;
        }
    }

    public function notification()
    {
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $profile = Profile::getByUserId($this->db_conn, $user_id);

        if (!$profile) {
            // Handle if profile doesn't exist
            header('location:/ProfileController/create');
            exit;
        }
        // Assuming you have a Notification model
        $notificationModel = new \app\models\Notification($this->db_conn);
        $notifications = $notificationModel->getNotificationsByUserId($_SESSION['user_id']);

        // Assuming you have a view file for notifications
        $this->view('User/notification', ['notifications' => $notifications]);
    }


}

?>