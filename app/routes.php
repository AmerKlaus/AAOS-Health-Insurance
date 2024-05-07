<?php
// "url"=>"controller,method"
$this->addRoute('/','Main,landing');
$this->addRoute('api','API,process');
$this->addRoute('main','Main,landing');
$this->addRoute('user/register','User,register');
$this->addRoute('user/login','User,login');
$this->addRoute('user/home','User,home');
$this->addRoute('user/logout','User,logout');