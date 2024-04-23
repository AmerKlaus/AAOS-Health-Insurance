<?php

namespace app\controllers;

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
            $policyNumber = $_POST['policy_number'];
            $claimType = $_POST['claim_type'];
            $claimDetails = $_POST['claim_details'];
            $claimDate = $_POST['claim_date'];
            $healthCardNumber = $_POST['health_card_number'];

            // Get the current user ID from session
            $userId = $_SESSION['user_id'];

            // $policy_id = \app\models\Claim::getPolicyIdFromNumber($policyNumber);
            // if (!$policy_id) {

            //     header('Location: /Home/index');
            //     exit;
            // }

            // Create a new Claim instance
            $claim = new \app\models\Claim();
            $policy_id = $claim::getPolicyIdFromNumber($policyNumber);
            $claim->policy_id = $policy_id;
            $claim->user_id = $userId; // Assign current user's ID
            $claim->claim_type = $claimType;
            $claim->claim_details = $claimDetails;
            $claim->claim_date = $claimDate;
            $claim->status = "Pending"; // Default status set to "Pending"
            $claim->health_card_number = $healthCardNumber;

            // Insert the claim into the database
            $claim->insert();

            // Optionally, redirect to a confirmation page or display a success message
            $this->view('Home/claimDetails');
        } else {
            // Redirect or handle invalid requests
            header('Location: /Home/index');
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
}

?>