<?php

namespace app\controllers;

use PDO;

class Admin extends \app\core\Controller
{
    public function dashboard()
    {
        // Retrieve and display pending claims for review
        $claimModel = new \app\models\Claim();
        $claimModel = $claimModel->getPendingClaimDocuments($this->db_conn);

        $this->view('Admin/dashboard', $claimModel);

    }

    public function logout()
    {
        // Check if the user is logged in
        if (isset($_SESSION['admin_id'])) {
            // Unset all session variables
            session_unset();

            // Destroy the session
            session_destroy();

            // Redirect to the home page or any other desired page after logout
            header('Location: /Home/index');
            exit;
        } else {
            // Redirect to the home page or login page if the user is not logged in
            header('Location: /Admin/login');
            exit;
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Create a new Admin instance
            $admin = new \app\models\Admin();
            $admin->register($username, $email, $password);

            // Optionally, redirect to a confirmation page or login page
            header('Location: /Admin/login');
            exit;
        } else {
            // Display the registration form
            $this->view('Admin/register');
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check admin credentials
            $admin = \app\models\Admin::getByUsername($this->db_conn, $username);
            

            if ($admin && password_verify($password, $admin->pwd_hash)) {
                // Admin login successful
                $_SESSION['admin_id'] = $admin->admin_id;
                header('Location: /Admin/dashboard');
                exit;
            } else {
                // Invalid credentials, redirect back to login page
                header('Location: /Admin/login');
                exit;
            }
        } else {
            // Display the admin login form
            $this->view('Admin/login');
        }
    }

    public function reviewClaim($claimId)
    {
        // Display detailed information about the claim for review
        // You can fetch claim details from the database based on $claimId
        $claimObj = \app\models\Claim::getClaimById($this->db_conn, $claimId);
        $this->view('Admin/reviewClaim', $claimObj);
    }

    public function submitReview($claimId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input data
            $notes = htmlspecialchars($_POST['notes']);

            // Call the model method to insert the review into the database
            $adminModel = new \app\models\Admin();
            $adminModel->insertReview($this->db_conn, $claimId, $notes);

            header('Location: /Admin/dashboard');
            exit;
        }
    }


    public function requestInfo($claimId)
    {
        // Load the requestInfo view page
        $claimObj = \app\models\Claim::getClaimById($this->db_conn, $claimId);
        $this->view('Admin/requestInfo', $claimObj);
    }

    public function submitRequestInfo($claimId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize input data
            $info = htmlspecialchars($_POST['info']);

            // Store the information in the notification table
            $notificationModel = new \app\models\Notification($this->db_conn);
            $notificationModel->createNotification($claimId, $info, 'Request Additional Info');

            header('Location: /Admin/dashboard');
            exit;
        }
    }

    public function approveClaim($claimId)
    {
        // Approve the claim and update its status
        $claimModel = new \app\models\Claim();
        $claimModel->updateClaimStatus($claimId, 'Approved'); // Implement updateClaimStatus method in Claim model
        // Redirect back to pending claims or dashboard
        header('Location: /Admin/pendingClaims');
        exit;
    }

    public function denyClaim($claimId)
    {
        // Deny the claim and update its status
        $claimModel = new \app\models\Claim();
        $claimModel->updateClaimStatus($claimId, 'Denied'); // Implement updateClaimStatus method in Claim model
        // Redirect back to pending claims or dashboard
        header('Location: /Admin/pendingClaims');
        exit;
    }
}
