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
