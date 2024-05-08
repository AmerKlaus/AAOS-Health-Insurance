<?php

namespace app\controllers;

use PDO;

class Home extends \app\core\Controller
{
    //TESTING PURPOSES
    public function index()
    {
        $this->view('Home/homepage');
    }

    public function customerSupport()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {

            // If the user is not logged in, redirect to the login page
            header('Location: /User/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Retrieve user ID from session
            $user_id = $_SESSION['user_id'];

            // Retrieve feedback text from form
            $feedback_text = $_POST['feedback_text'];

            try {
                // Create a new feedback message
                \app\models\Feedback::createFeedback($this->db_conn, $user_id, $feedback_text);

                // Redirect after successful submission
                header('Location:/Home/index');
                exit;
            } catch (\PDOException $e) {

                // Handle database errors
                echo "Database Error: " . $e->getMessage();
            } catch (\Exception $e) {
                // Handle other exceptions
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Display the customer support form
            $this->view('Home/customerSupport');
        }
    }


    public function insuranceClaimsInfo()
    {
        $this->view('Home/insuranceClaimsInfo');
    }

    public function coverageOptions()
    {
        $this->view('Home/coverageOptions');
    }

    public function industryNews()
    {
        $this->view('Home/industryNews');
    }

    public function loginSelection()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role'];
            if ($role === 'user') {
                header('Location: /User/login');
                exit;
            } elseif ($role === 'admin') {
                header('Location: /Admin/dashboard');
                exit;
            } else {
                // Invalid role selected, redirect back to login selection
                header('Location: Home/index');
                exit;
            }
        } else {
            // Display the login selection form
            $this->view('Home/loginSelection');
        }
    }

    public function debug() {
        echo '<pre>';
        var_dump($_SESSION);
        echo '</pre>';
    }

}

?>