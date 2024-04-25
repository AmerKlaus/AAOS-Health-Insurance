<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/login', 'User,login');
$this->addRoute('User/forgotPassword', 'User,forgotPassword');
$this->addRoute('User/register', 'User,register');
$this->addRoute('User/profile', 'User,profile');
$this->addRoute('User/logout', 'User,logout');
$this->addRoute('Home/index', 'Home,index');
$this->addRoute('Home/claimSubmission', 'Home,claimSubmission');
$this->addRoute('Home/claimDetails', 'Home,claimDetails');
$this->addRoute('Home/customerSupport', 'Home,customerSupport');
$this->addRoute('Home/submitClaim', 'Home,submitClaim');
$this->addRoute('Home/insuranceClaimsInfo', 'Home,insuranceClaimsInfo');
$this->addRoute('Home/coverageOptions', 'Home,coverageOptions');
$this->addRoute('Home/industryNews', 'Home,industryNews');
$this->addRoute('User/setup2fa', 'User,setup2fa');
$this->addRoute('User/check2fa', 'User,check2fa');
$this->addRoute('User/check2fa', 'User,check2fa');
$this->addRoute('Admin/dashboard', 'Admin,dashboard');
$this->addRoute('Admin/reviewClaim/{claimId}', 'Admin,reviewClaim');
$this->addRoute('Admin/requestInfo/{claimId}', 'Admin,requestInfo');
$this->addRoute('Admin/approveClaim/{claimId}', 'Admin,approveClaim');
$this->addRoute('Admin/denyClaim/{claimId}', 'Admin,denyClaim');
$this->addRoute('Admin/login', 'Admin,login');
$this->addRoute('Admin/register', 'Admin,register');
$this->addRoute('Home/loginSelection', 'Home,loginSelection');
