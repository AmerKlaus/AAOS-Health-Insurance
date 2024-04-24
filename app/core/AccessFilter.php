<?php
namespace app\core;

interface AccessFilter
{

	public function redirected()
	{

		//make sure that the user is logged in
		if (!isset($_SESSION['user_id'])) {
			header('location:/User/login');
			return true;
		}
		if ($_SESSION['secret'] != NULL) {
			header('location:/User/check2fa');
			return true;
		}
		return false;//not denied

	}

}