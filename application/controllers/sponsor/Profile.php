<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if(null == $user) {
            redirect('/');
        }
    }

	public function index() {
        $this->_renderSponsor('sponsor/profile/index');
	}

}
