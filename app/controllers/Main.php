<?php
namespace app\controllers;

class Main extends \app\core\Controller {

	public function landing() {
		$this->view('Main/main');
	}

}