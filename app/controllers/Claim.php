<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Profile;
use PDO;

class Claim extends Controller
{
    public function claimSubmission()
    {
        $this->view('Claim/submission');
    }

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
            $this->view('Claim/details', ['claim' => $claim, 'profile' => $profile]);
        } else {
            // Redirect or handle invalid requests
            header('Location:/Home/index');
            exit;
        }
    }

    public function claimDetails()
    {
        $this->view('Claim/details');
    }

    public function claimHistory()
    {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
            exit;
        }

        // Get user ID from session
        $user_id = $_SESSION['user_id'];
        $profile = Profile::getByUserId($this->db_conn, $user_id);

        if (!$profile) {
            // Handle if profile doesn't exist
            header('location:/ProfileController/create');
            exit;
        }

        // Load the Claim model
        $claimModel = new \app\models\Claim();

        // Get all claims for the user
        $claims = $claimModel->getAllClaims($this->db_conn, $user_id);

        // Load the view with the claims data
        $this->view('Claim/history', ['claims' => $claims, 'profile' => $profile]);
    }

    public function edit($claimId)
    {
        // Check if claim ID is provided
        if (!$claimId) {
            header('Location: /Home/index');
            exit;
        }

        // Get the claim by ID
        $claimModel = new \app\models\Claim();
        $claim = $claimModel->getClaimById($this->db_conn, $claimId);

        // Get user ID from session
        $user_id = $_SESSION['user_id'];
        $profile = Profile::getByUserId($this->db_conn, $user_id);

        if (!$claim) {
            // Handle if claim not found
            header('Location: /Home/index');
            exit;
        }

        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve and sanitize form data
            $claim_type = $_POST['claim_type'];
            $claim_details = $_POST['claim_details'];
            $claim_date = $_POST['claim_date'];
            $health_card_number = $_POST['health_card_number'];

            // Update the claim data
            $claim->claim_type = $claim_type;
            $claim->claim_details = $claim_details;
            $claim->claim_date = $claim_date;
            $claim->health_card_number = $health_card_number;

            // Save changes to the database
            $claim->update($this->db_conn);

            $notificationModel = new \app\models\Notification($this->db_conn);
            $notificationModel->removeNotification($this->db_conn, $claimId);

            // Redirect to claim details page
            $this->view('/Claim/details', ['claim' => $claim, 'profile' => $profile]);
            exit;
        }

        $this->view('Claim/edit', ['claim' => $claim]);
    }

}