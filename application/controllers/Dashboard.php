<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $sponsor = $this->session->userdata('sponsor');
        if(null == $sponsor) {
            redirect('/');
        }
    }

	public function index() {
        $this->_renderL('dashboard/index');
	}

}
