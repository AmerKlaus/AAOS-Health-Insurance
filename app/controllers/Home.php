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

    public function claimSubmission()
    {
        $this->view('Home/claimSubmission');
    }

    // Method to handle claim submission form submission
    public function submitClaim()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {

            // If the user is not logged in, redirect to the login page
            header('Location: /User/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize form data
            $policy_number = $_POST['policy_number'];
            $claim_type = $_POST['claim_type'];
            $claim_details = $_POST['claim_details'];
            $claim_date = $_POST['claim_date'];
            $health_card_number = $_POST['health_card_number'];

            // Get the current user ID from session
            $user_id = $_SESSION['user_id'];

            // $policy_id = \app\models\Claim::getPolicyIdFromNumber($policyNumber);
            // if (!$policy_id) {

            //     header('Location: /Home/index');
            //     exit;
            // }

            // Create a new Claim instance
            $claim = new \app\models\Claim();
            $policy_id = \app\Models\Policy::getIdFromNumber($this->db_conn, $policy_number);
            $claim->policy_id = $policy_id;
            $claim->user_id = $user_id; // Assign current user's ID
            $claim->claim_type = $claim_type;
            $claim->claim_details = $claim_details;
            $claim->claim_date = $claim_date;
            $claim->status = "Pending"; // Default status set to "Pending"
            $claim->health_card_number = $health_card_number;

            // Insert the claim into the database
            $claim->insert($this->db_conn);

            // Optionally, redirect to a confirmation page or display a success message
            $this->view('Home/claimDetails');
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
        $this->view('Home/customerSupport');
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