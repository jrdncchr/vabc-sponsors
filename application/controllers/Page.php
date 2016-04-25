<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {
		$this->login();
	}

    public function login() {
        if($this->request_method == "POST") {
            $auth = $this->input->post();
            $this->load->model('sponsor_model');
            $result = $this->sponsor_model->login($auth);
            if($result['success']) {
                redirect('main');
            } else {
                $this->session->set_flashdata('error', $result['message']);
                $this->_render('login');
            }
        } else {
            $this->_render('login');
        }
    }

    public function register() {
        $this->_render('register');
    }

    public function test() {
        $sponsor = array(
            'company_name' => 'CCW',
            'email' => 'admin@vabc.com',
            'password' => 'admin',
            'name' => 'Danero'
        );

        $this->load->model('sponsor_model');
        $result = $this->sponsor_model->add($sponsor);
        var_dump($result);

    }

}
