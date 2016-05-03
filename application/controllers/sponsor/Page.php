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
            $this->load->model('user_model');
            $result = $this->user_model->login($auth);
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

    public function save_registration_details() {
        $sponsor = $this->input->post();
        $this->load->model('user_model');
        if(isset($sponsor['user_id'])) {
            $result = $this->user_model->update_sponsor($sponsor);
        } else {
            $result = $this->user_model->add_sponsor($sponsor);
        }
        echo json_encode($result);
    }

    public function confirm_email() {
        $this->load->model('user_model');
        $result = $this->user_model->confirm_email(
            $this->input->post('user_id'),
            $this->input->post('confirmation_code')
        );
        echo json_encode($result);
    }

    public function generate_registration_payment() {
        $events = $this->input->post('events');
        $level_id = $this->input->post('level_id');
        $user_id = $this->input->post('user_id');
        $this->load->model('event_model');
        $events_sponsoring = "user_id=$user_id&level_id=$level_id&events=";
        for($i = 0; $i < sizeof($events); $i++) {
            $events_sponsoring .= $events[$i];
            if(($i+1) != sizeof($events)) {
                $events_sponsoring .= "|";
            }
            $events[$i] = $this->event_model->get(array('event_id' => $events[$i]));
        }
        $this->load->model('level_model');
        $level = $this->level_model->get(array('level_id' => $level_id));

        if($this->is_localhost()) {
            $paypal['url'] = "https://www.sandbox.paypal.com/cgi-bin/webscr";
            $paypal['business'] = "jrdn-sb-business@gmail.com";
        } else {
            $paypal['url'] = "https://www.paypal.com/cgi-bin/webscr";
            $paypal['business'] = "soferamir@gmailc.om";
        }

        $data = array('events' => $events, 'level' => $level, 'paypal' => $paypal, 'events_sponsoring' => $events_sponsoring);
        $this->load->view('sponsor/partial/registration_payment', $data);
    }

    public function payment_success() {
        $status = $this->input->post('payment_status');
        if($status == "Completed") {
             parse_str($this->input->post('custom'), $event_sponsoring);
            var_dump($event_sponsoring);
        }
    }

}
