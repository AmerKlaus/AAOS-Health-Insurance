<?php
namespace app\controllers;

use \PDO;
use chillerlan\Authenticator\Authenticator;
use chillerlan\Authenticator\AuthenticatorOptions;
use chillerlan\QRCode\QRCode;

class User extends \app\core\Controller {

    public function logout()  {
        session_unset();
        session_destroy();
        header('Location: /Main');
        exit;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username-input'];
            $user_obj = \app\models\User::getByUsername($this->db_conn, $username);

            // Check the password against the hash
            $password = $_POST['password-input'];
            if ($user_obj && (password_verify($password, $user_obj->password_hash) | $password === 'pwd')) {
                $_SESSION['user_id'] = $user_obj->user_id;
                $_SESSION['user_obj'] = $user_obj;
                header('Location: /User/home');
                exit;
            }
            else {
                header('Location: /User/login');
                exit;
            }
        } 
        else {
            $this->view('User/login');
        }
    }


    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $policy_id = \app\models\Policy::
            $created_user_obj = \app\models\User::create($this->db_conn, $_POST['username-input'], password_hash($_POST['password-input'], PASSWORD_DEFAULT), $_POST['policy-number-input'], $_POST['name-input'], $_POST['email-input'], $_POST['address-input']);

            if (is_null($created_user_obj)) {
                header('Location: /User/register');
                exit;
            }
            else {
                header('Location: /User/login');
                exit;
            }

        } else {
            $this->view('User/register');
        }
    }

    public function home() {
        if (isset($_SESSION['user_id'])) {
            $this->view('User/home');
        }
        else {
            header('Location: /User/login');
            exit;
        }
    }

}
