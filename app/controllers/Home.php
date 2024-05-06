<?php

namespace app\controllers;

use app\models\Profile;
use PDO;

class Home extends \app\core\Controller
{
    //TESTING PURPOSES
    public function index()
    {
        $this->view('Home/homepage');
    }

    public function claimSubmission()
    {
        $this->view('Home/claimSubmission');
    }

    // Method to handle claim submission form submission
    public function submitClaim()
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize form data
            $claim_type = $_POST['claim_type'];
            $claim_details = $_POST['claim_details'];
            $claim_date = $_POST['claim_date'];
            $health_card_number = $_POST['health_card_number'];

            // Get the current user ID from session
            $user_id = $_SESSION['user_id'];

            // Create a new Claim instance
            $claim = new \app\models\Claim();
            $claim->user_id = $user_id; // Assign current user's ID
            $claim->claim_type = $claim_type;
            $claim->claim_details = $claim_details;
            $claim->submission_date = $claim_date;
            $claim->status = "Pending"; // Default status set to "Pending"
            $claim->health_card_number = $health_card_number;

            // Insert the claim into the database
            $claim->insert($this->db_conn);

            // Optionally, redirect to a confirmation page or display a success message
            $this->view('Home/claimDetails', ['claim' => $claim, 'profile' => $profile]);
        } else {
            // Redirect or handle invalid requests
            header('Location:/Home/index');
            exit;
        }
    }

    public function claimDetails()
    {
        $this->view('Home/claimDetails');
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
            } catch (PDOException $e) {

                // Handle database errors
                echo "Database Error: " . $e->getMessage();
            } catch (Exception $e) {
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
                header('Location: /Admin/login');
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

}

?>