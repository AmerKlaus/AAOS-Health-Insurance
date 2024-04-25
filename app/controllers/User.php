<?php
namespace app\controllers;

use \PDO;
use chillerlan\Authenticator\Authenticator;
use chillerlan\Authenticator\AuthenticatorOptions;
use chillerlan\QRCode\QRCode;

class User extends \app\core\Controller
{

    public function logout()
    {
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            // Unset all session variables
            session_unset();

            // Destroy the session
            session_destroy();

            // Redirect to the home page or any other desired page after logout
            header('Location: /Home/index');
            exit;
        } else {
            // Redirect to the home page or login page if the user is not logged in
            header('Location: /User/login');
            exit;
        }
    }

    public function login()
    {
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
            if ($user && password_verify($password, $user->pwd_hash)) {
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
    public function setup2fa()
    {
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
            header('location:/Home/index');
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

    public function check2fa()
    {
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
    public function submitFeedback()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // If the user is not logged in, redirect to the login page
            header('Location: /User/login');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                // Retrieve user ID from session
                $user_id = $_SESSION['user_id'];
                
                // Retrieve feedback message from form
                $message = $_POST['message'];
    
                // Create a new Feedback instance
                $feedback = new \app\models\Feedback();
                $feedback->user_id = $user_id;
                $feedback->timestamp = date("Y-m-d H:i:s");
                $feedback->message = $message;
    
                // Insert the feedback into the database
                $feedback->insert($this->db_conn);
                
                // Redirect after successful submission
                header('Location:/Home/index');
                exit;
            } catch (PDOException $e) {
                
                // Handle database errors
                echo "Database Error: " . $e->getMessage();
            } catch (Exception $e) {

                // Handle other exceptions
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Redirect or handle invalid requests
            header('Location:/Home/index');
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
            } else {
                // Email not found in the database
                $errorMessage = "The email address provided is not associated with any account.";
                $this->view('User/forgotPassword', ['errorMessage' => $errorMessage]);
            }
        } else {
            // Display forgot password form
            $this->view('User/forgotPassword');
        }
    }
/*
    public function resetPassword()
    {
        $token =...
        if(){
            $token == token db
            user == user
            update
            
        }
        else{
        
            $this->view('Home/homepage');
        }
    }
    
*/
}

?>
