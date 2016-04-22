<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {
		$this->login();
	}

    public function login() {
        $this->_render('login');
    }

    public function register() {
        $this->_render('register');
    }

}
