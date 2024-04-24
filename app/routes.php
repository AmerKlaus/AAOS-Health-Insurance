<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/login', 'User,login');
$this->addRoute('User/forgotPassword', 'User,forgotPassword');
$this->addRoute('User/register', 'User,register');
$this->addRoute('User/profile', 'User,profile');
$this->addRoute('Home/index', 'Home,index');
$this->addRoute('Home/claimSubmission', 'Home,claimSubmission');
$this->addRoute('Home/claimDetails', 'Home,claimDetails');
$this->addRoute('Home/customerSupport', 'Home,customerSupport');
$this->addRoute('Home/submitClaim', 'Home,submitClaim');
$this->addRoute('User/setup2fa' , 'User,setup2fa');
$this->addRoute('User/check2fa', 'User,check2fa');
