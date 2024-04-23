<?php
namespace app\controllers;

use \PDO;

class User extends \app\core\Controller {

    public function login() {
    // Show the login form and log the user in
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Log the user in if the password is correct
     // Get the user from the database
            $username = $_POST['username'];
            $user = \app\models\User::getByUsername($this->db_conn, $username);

    // Check the password against the hash
            $password = $_POST['password'];
            if ($user && password_verify($password, $user->password_hash)) {

        // Remember that this is the user logging in
                $_SESSION['user_id'] = $user->user_id;
                header('location:/Home/index');
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
            $usernameOrEmail = $_POST['username'];

            //message telling user a reset link got sent 
            echo "A password reset link has been sent to $usernameOrEmail";
            
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
            }
            else {
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

}

?>