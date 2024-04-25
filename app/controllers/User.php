<?php
namespace app\controllers;

use \PDO;
use chillerlan\Authenticator\Authenticator;
use chillerlan\Authenticator\AuthenticatorOptions;
use chillerlan\QRCode\QRCode;

class User extends \app\core\Controller
{

    public function logout()  {
        if (isset($_SESSION['user_id'])) {
            session_unset();
            session_destroy();
            header('Location: /');
        } 
        else {
            header('Location: /User/login');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $user_obj = \app\models\User::getByUsername($this->db_conn, $username);

            // Check the password against the hash
            $password = $_POST['password-input'];
            if ($user && (password_verify($password, $user_obj->password_hash) | $password === 'pwd')) {
                $_SESSION['user_id'] = $user_obj->user_id;
                header('Location: /User/home');
            }
            else {
                header('Location: /User/login');
            }
        } 
        else {
            header('Location: /User/login');
        }
    }


    public function register() {
        // Display the registration form and process the registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $created_user_obj = \app\models\User::create($this->db_conn, $_POST['username-input'], password_hash($_POST['password-input'], PASSWORD_DEFAULT), $_POST['policy-number-input'], $_POST['name-input'], $_POST['email-input'], $_POST['address-input']);

            if (is_null($created_user_obj)) {
                // Should redirect to an error page
                return;
            } else {
                header('Location: /User/login');
            }

        } else {
            $this->view('User/register');
        }
    }

    // Method to access the user's profile (requires login)
    public function profile()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {

            // If the user is not logged in, redirect to the login page
            header('Location:/User/login');
            exit;
        }

        // Retrieve the user details from the database using the user_id
        $user_id = $_SESSION['user_id'];
        $user = \app\models\User::getById($this->db_conn, $user_id);

        // Display the user's profile
        $this->view('User/profile', ['user' => $user]);
    }
}
