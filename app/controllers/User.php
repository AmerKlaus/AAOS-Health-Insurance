<?php
namespace app\controllers;

use \PDO;
use chillerlan\Authenticator\Authenticator;
use chillerlan\Authenticator\AuthenticatorOptions;
use chillerlan\QRCode\QRCode;
class User extends \app\core\Controller {

    public function login() {
        // Show the login form and log the user in
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Log the user in if the password is correct
            // Get the user from the database
            // Log the user in if the password is correct
            // Get the user from the database
            $username = $_POST['username'];
            $user = \app\models\User::getByUsername($this->db_conn, $username);
    
            // Check the password against the hash
            $password = $_POST['password'];
            if ($user && password_verify($password, $user->password_hash)) {
                // Remember that this is the user logging in
                $_SESSION['user_id'] = $user->user_id;
    
                // Store the user's 2FA secret in the session
                $_SESSION['secret'] = $user->secret;
    
                // Check if the user has set up 2FA
                if ($user->secret === null) {

                    // Redirect to 2FA setup page
                    header('location:/User/setup2fa');
                    exit; // Stop further execution
                } else {

                    // User has logged in successfully
                    header('location:/Home/index');
                }
            } else {
                
                // Invalid credentials, redirect back to login page
                header('location:/User/login');
            }
        } else {
            $this->view('User/login');
        }
    }
    
     // Method to handle forgot password functionality
    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Retrieve the username or email entered by the user
            $username_or_email = $_POST['username'];

            //message telling user a reset link got sent 
            echo "A password reset link has been sent to $username_or_email";

        } else {

            // Display forgot password form
            $this->view('User/forgotPassword');
        }
    }
    // Method to handle user registration
    public function register()
    {
        // Display the registration form and process the registration
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create a new User object
            $created_user_obj = \app\models\User::createUser($this->db_conn, $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['email'], '1', $_POST['full_name'], $_POST['phone'], $_POST['address']);

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
     //Fix
    public function setup2fa() {
        // Create AuthenticatorOptions object
        $options = new AuthenticatorOptions();

        // Create Authenticator object
        $authenticator = new Authenticator($options);

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Check if the session secret is available
            if (isset($_SESSION['secret_setup'])) {

                // Set the session secret to the Authenticator object
                $authenticator->setSecret($_SESSION['secret_setup']);
            } else {

                // Redirect to setup 2FA page if session secret is not available
                header('location:/User/setup2fa');
                exit; // Stop further execution
            }

            // Check the TOTP provided by the user
            $totp = $_POST['totp'];
            if ($authenticator->verify($totp)) {

                // TOTP is correct, perform further actions like storing it in the user record
                echo 'yay!';
            } else {

                // TOTP is incorrect
                echo 'Nope!';
            }
        } else {

            // If the form was not submitted, generate the secret and QR code
            $_SESSION['secret_setup'] = $authenticator->createSecret();

            // Generate the URI with the secret for the user
            $uri = $authenticator->getUri('AAOS', 'localhost');
            $QRCode = (new QRCode)->render($uri);

            // Pass QR code to the view
            $this->view('User/setup2fa', ['QRCode' => $QRCode]);
        }
    }

    public function check2fa() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $options = new AuthenticatorOptions();
            $authenticator = new Authenticator($options);
            $authenticator->setSecret($_SESSION['secret']);
    
            if ($authenticator->verify($_POST['totp'])) {
                unset($_SESSION['secret']);
                header('location:/Home/index'); 
            } else {
                session_destroy();
                header('location:/User/login');
            }
        } else {
            $this->view('User/check2fa');
        }
    }
    

}

?>