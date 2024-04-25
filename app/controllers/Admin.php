<?php

namespace app\controllers;

use PDO;

class Admin extends \app\core\Controller
{
    public function dashboard()
    {
        // Display the admin dashboard
        $this->view('Admin/dashboard');
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

            if ($admin && password_verify($password, $admin->password_hash)) {
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

    public function pendingClaims()
    {
        // Retrieve and display pending claims for review
        $adminModel = new \app\models\Admin();
        $pendingClaims = $adminModel->getPendingClaimDocuments();
        $this->view('Admin/pendingClaims', ['pendingClaims' => $pendingClaims]);
    }

    public function reviewClaim($claimId)
    {
        // Display detailed information about the claim for review
        // You can fetch claim details from the database based on $claimId
        $claimModel = new \app\models\Claim();
        $claimDetails = $claimModel::getClaimById($this->db_conn, $claimId); // Implement getClaimById method in Claim model
        $this->view('Admin/reviewClaim', ['claimDetails' => $claimDetails]);
    }

    public function requestInfo($claimId)
    {
        // Display a form or page to request additional information
        $this->view('Admin/requestInfo', ['claimId' => $claimId]);
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
