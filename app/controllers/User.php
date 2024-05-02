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
                // Create a profile for the newly registered user
                \app\models\Profile::createProfile($this->db_conn, $created_user_obj->user_id);
                header('Location:/User/login');
            }
    
        } else {
            $this->view('User/register');
        }
    }
    
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
        
        // Retrieve the user's profile information
        $profile = \app\models\Profile::getByUserId($this->db_conn, $user_id);
    
        // Retrieve phone number from the user if available, otherwise set it to "NA"
        $phone = ($user && $user->phone) ? $user->phone : 'NA';
    
        // Display the user's profile
        $this->view('User/profile', ['user' => $user, 'phone' => $phone]);
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

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the token and new password from the form
            $token = $_POST['token'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];
    
            // Check if both passwords match
            if ($newPassword !== $confirmPassword) {
                // If passwords don't match, redirect with an error message
                $errorMessage = "Passwords do not match.";
                $this->view('User/resetPasswordForm', ['errorMessage' => $errorMessage]);
                return; // Stop further execution
            }
    
            // Retrieve the user associated with the token from the database
            $user = \app\models\User::getUserByResetToken($this->db_conn, $token);
    
            // Check if the user exists and the token is valid
            if ($user && $user->isResetTokenValid()) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
                // Update the user's password in the database
                $user->updatePassword($this->db_conn, $hashedPassword);
    
                // Redirect to login page with success message
                header('Location: /User/login');
                exit;
            } else {
                // Invalid token or token expired, redirect with error message
                $errorMessage = "Invalid or expired token.";
                $this->view('User/resetPasswordForm', ['errorMessage' => $errorMessage]);
                return; // Stop further execution
            }
        } else {
            // Display the reset password form
            $token = $_GET['token'] ?? '';
            $this->view('User/resetPasswordForm', ['token' => $token]);
        }
    }
    
    

}

?>
