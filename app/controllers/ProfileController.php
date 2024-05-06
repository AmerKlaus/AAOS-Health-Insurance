<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Profile;
use PDO;

class ProfileController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
        }
        $user_id = $_SESSION['user_id'];
        $profile = Profile::getByUserId($this->db_conn, $user_id);
        //redirect a user that has no profile to the profile creation URL
        if ($profile) {
            $user = new \app\models\User;
            $user = $user->getById($this->db_conn, $user_id);
            $data = ['profile' => $profile, 'user' => $user];
            $this->view('Profile/index', $data); // Pass the merged data array to the view
        } else {
            header('location:/ProfileController/create');
            exit;
        }
    }

    public function create()
    {
        if (!isset($_SESSION['user_id'])) {
            header('location:/User/login');
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Handle form submission
            $user_id = $_SESSION['user_id'];
            $birthdate = $_POST['birthdate']; // Assuming this is from the form
            $policy_number = $_POST['policy_number']; // Assuming this is from the form

            // Handle file upload
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['profile_picture']['tmp_name'];
                $file_name = $_FILES['profile_picture']['name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_dest = 'uploads/' . $user_id . '_profile.' . $file_ext;
                move_uploaded_file($file_tmp, $file_dest);

                // Update profile creation with profile picture path
                $profile_picture = '/' . $file_dest;
                $profile = new Profile;
                $profile->createProfile($this->db_conn, $user_id, $birthdate, $profile_picture, $policy_number);

                // Redirect or show success message
                header('Location: /ProfileController/index');
                exit;
            } else {
                header('Location: /ProfileController/create');
                exit;
            }
        } else {
            // Display create view
            $this->view('Profile/create');
        }
    }

    public function changeProfile()
    {
        $user_id = $_SESSION['user_id'];
        $profile = Profile::getByUserId($this->db_conn, $user_id);
        //redirect a user that has no profile to the profile creation URL
        if ($profile) {
            $user = new \app\models\User;
            $user = $user->getById($this->db_conn, $user_id);
            $data = ['profile' => $profile, 'user' => $user];
            $this->view('Profile/editProfile', $data);
        }
    }

    public function editProfile()
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
            // Handle form submission
            $newProfileData = [
                'user_id' => $user_id,
                'full_name' => $_POST['full_name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'birthdate' => $_POST['birthdate'],
                'policy_number' => $_POST['policy_number'],
                'profile_picture' => $profile->profile_picture
            ];

            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['profile_picture']['tmp_name'];
                $file_name = $_FILES['profile_picture']['name'];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_dest = 'uploads/' . $user_id . '_profile.' . $file_ext;
                if (move_uploaded_file($file_tmp, $file_dest)) {
                    // Update profile picture path only if the file was successfully uploaded
                    $newProfileData['profile_picture'] = '/' . $file_dest;
                } else {
                    // Handle file upload error
                    echo 'Error uploading file.';
                }
            }

            // Update profile data
            $profile->updateProfile($this->db_conn, $newProfileData);

            // Update user data
            $user = new \app\models\User;
            $user->updateUser($this->db_conn, $newProfileData);

            // Redirect after update
            header('location:/ProfileController/index');
            exit;
        } else {
            // Render editProfile view with current profile data
            $data = ['profile' => $profile];
            $this->view('Profile/editProfile', $data);
        }
    }

    
}

?>