<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SDC extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {
        echo "Under Construction";

        $this->load->model('email_model');
        $this->email_model->send();
    }

}
