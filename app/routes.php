<?php
//defined a few routes "url"=>"controller,method"


// Debug/test route, for development only
$this->addRoute('Home/debug', 'Home,debug');


$this->addRoute('User/login', 'User,login');
$this->addRoute('User/forgotPassword', 'User,forgotPassword');
$this->addRoute('User/resetPassword', 'User,resetPassword');
$this->addRoute('User/register', 'User,register');
$this->addRoute('User/logout', 'User,logout');
$this->addRoute('Home/index', 'Home,index');
$this->addRoute('Home/customerSupport', 'Home,customerSupport');
$this->addRoute('Home/insuranceClaimsInfo', 'Home,insuranceClaimsInfo');
$this->addRoute('Home/coverageOptions', 'Home,coverageOptions');
$this->addRoute('Home/industryNews', 'Home,industryNews');
$this->addRoute('User/setup2fa', 'User,setup2fa');
$this->addRoute('User/check2fa', 'User,check2fa');
$this->addRoute('Admin/dashboard', 'Admin,dashboard');
$this->addRoute('Admin/reviewClaim/{claimId}', 'Admin,reviewClaim');
$this->addRoute('Admin/requestInfo/{claimId}', 'Admin,requestInfo');
$this->addRoute('Admin/approveClaim/{claimId}', 'Admin,approveClaim');
$this->addRoute('Admin/denyClaim/{claimId}', 'Admin,denyClaim');
$this->addRoute('Admin/login', 'Admin,login');
$this->addRoute('Home/loginSelection', 'Home,loginSelection');
$this->addRoute('Admin/submitReview/{claimId}', 'Admin,submitReview');
$this->addRoute('Admin/submitRequestInfo/{claimId}', 'Admin,submitRequestInfo');
//$this->addRoute('Home/submitFeedback', 'Home,submitFeedback');
$this->addRoute('ProfileController/index', 'ProfileController,index');
$this->addRoute('ProfileController/create', 'ProfileController,create');
$this->addRoute('ProfileController/editProfile', 'ProfileController,editProfile');
$this->addRoute('ProfileController/changeProfile', 'ProfileController,changeProfile');
$this->addRoute('Admin/logout', 'Admin,logout');
$this->addRoute('Claim/claimSubmission', 'Claim,claimSubmission');
$this->addRoute('Claim/claimDetails', 'Claim,claimDetails');
$this->addRoute('Claim/submitClaim', 'Claim,submitClaim');
$this->addRoute('Claim/claimHistory', 'Claim,claimHistory');
$this->addRoute('User/notification', 'User,notification');
$this->addRoute('Claim/edit/{claimId}', 'Claim,edit');
$this->addRoute('Claim/changeClaim/{claimId}', 'Claim,changeClaim');