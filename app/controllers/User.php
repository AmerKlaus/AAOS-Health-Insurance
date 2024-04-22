<?php

namespace app\controllers;

class User extends \app\core\Controller
{
    // Sample user data (wait for database)
    private $users = [
        'user1' => [
            'password_hash' => '$2y$10$RePpOv3i9KZbGbw7gxRy1OmBpJwBmdub2VzHePNHFFfwn0NUFf7X2', // Password is "password"
            'active' => true
        ],
        'user2' => [
            'password_hash' => '$2y$10$1n3vPF6aM3yD1bHDBqAehuJHleSmI1UfT2u7R1YpONZm0G5xprS7O', // Password is "123456"
            'active' => true
        ]
    ];

 // Method to handle user login
public function login()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if (isset($this->users[$username]) && $this->users[$username]['active'] && password_verify($password, $this->users[$username]['password_hash'])) {
            $_SESSION['user_id'] = $username;
            // Redirect to the user's profile page after successful login
            header('Location: /User/profile');
            exit;
        } else {
            // Redirect back to the login page if login fails
            header('Location: /User/login');
            exit;
        }
    } else {
        
        $this->view('User/login');
    }
}



    // Method to handle user logout
    public function logout()
    {
        session_destroy();
        header('Location: /User/login');
        exit;
    }

    // Method to access the user's profile (requires login)
    public function userProfile()
    {
        if (!isset($_SESSION['user_id']) || !isset($this->users[$_SESSION['user_id']])) {
            header('Location: /User/login');
            exit;
        }
        
        $username = $_SESSION['user_id'];
        echo "Welcome to your profile, $username!";
    }


 // Method to handle forgot password functionality
public function forgotPassword()
{
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

        // Create a new User object (TODO)
        $user = new \app\models\User();
        
        // Populate the User object with form data
        $user->username = $_POST['username'];
        $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Insert the user into the database(wip)
        $user->insert();
        
        // Redirect to the login page upon successful registration
        header('Location: /User/login');
        exit;
    } else {
        // Display the registration form
        $this->view('User/register');
    }
}
// Method to access the user's profile (requires login)
public function profile()
{
    // Check if the user is logged in
    if (!isset($_SESSION['user_id']) || !isset($this->users[$_SESSION['user_id']])) {

        // If the user is not logged in, redirect to the login page
        header('Location: /User/login');
        exit;
    }
    
    // Retrieve the username from the session
    $username = $_SESSION['user_id'];
    
    // Display the user's profile
    $this->view('User/profile', ['username' => $username]);
}
}
?>
