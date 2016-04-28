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
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', $result['message']);
                $this->_render('sponsor/login');
            }
        } else {
            $this->_render('sponsor/login');
        }
    }

    public function register() {
        $this->load->model('event_model');
        $this->data['events']  = $this->event_model->get_list(array('status' => 'active'));
        $this->_render('sponsor/register');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
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