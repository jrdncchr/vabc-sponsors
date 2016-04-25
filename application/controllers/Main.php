<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $sponsor = $this->session->userdata('sponsor');
        if(null == $sponsor) {
            redirect('/');
        }
    }

	public function index() {
        $this->dashboard();
	}

    public function dashboard() {
        $this->_renderL('main/dashboard');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }


}
