<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if(null == $user) {
            $this->redirect('/');
        }
    }

	public function index() {
        $this->_renderSponsor('sponsor/dashboard/index');
	}

}
