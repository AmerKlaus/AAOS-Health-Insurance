<?php
namespace app\filters;

use app\core\Controller;
use PDO;

#[\Attribute]
class HasProfile extends Controller implements \app\core\AccessFilter
{
    public function redirected()
    {
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($this->db_conn, $_SESSION['user_id']);
        //redirect a user that has no profile to the profile creation URL
        if ($profile) {
            return false;
        } else {
            header('location:/Profile/create');
            return true;
        }
    }

}