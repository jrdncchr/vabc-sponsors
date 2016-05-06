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
                $this->redirect('sponsor/dashboard');
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
        $this->redirect('');
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

        $this->load->model('level_model');
        $level = $this->level_model->get(array('level_id' => $level_id));
        $price_total = 0;

        $this->load->model('event_model');
        $events_sponsoring = "&user_id=$user_id&level_id=$level_id&events=";
        for($i = 0; $i < sizeof($events); $i++) {
            $events_sponsoring .= $events[$i];
            if(($i+1) != sizeof($events)) {
                $events_sponsoring .= "|";
            }
            $events[$i] = $this->event_model->get(array('event_id' => $events[$i]));
            $price_total += $level->price;
        }
        $events_sponsoring .= "&price_total=$price_total";
        $this->session->set_userdata('event_sponsoring', $events_sponsoring);
        $this->load->model('level_model');
        $level = $this->level_model->get(array('level_id' => $level_id));

        $this->data['stripe'] = $this->stripe;
        $this->data['price_total'] = $price_total;
        $this->data['events'] = $events;
        $this->data['level'] = $level;
        $this->data['events_sponsoring'] = $events_sponsoring;
        $this->load->view('sponsor/partial/registration_payment', $this->data);
    }

    public function payment_success_paypal() {
        $status = $this->input->post('payment_status');
        if($status == "Completed") {
             parse_str($this->input->post('custom'), $event_sponsoring);
            var_dump($event_sponsoring);
        }
    }

    public function payment_checkout_stripe() {
        $token = $this->input->post('stripeToken');

        $event_sponsoring = $this->session->userdata('event_sponsoring');
        parse_str($event_sponsoring, $event_sponsoring);

        $customer = \Stripe\Customer::create(array(
            'email' => $this->input->post('stripeEmail'),
            'card'  => $token
        ));

        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $event_sponsoring['price_total'] * 100,
            'currency' => 'usd'
        ));

        $events = explode('|', $event_sponsoring['events']);
        $this->load->model('event_model');
        foreach($events as $e) {
            $es = array(
                'event_id' => $e,
                'sponsor_id' => $event_sponsoring['user_id'],
                'level_id' => $event_sponsoring['level_id'],
            );
            $this->event_model->add_event_sponsors($es);
        }

        $this->load->model('user_model');
        $user = $this->user_model->get_details(array('user.user_id' => $event_sponsoring['user_id']));
        $_SESSION['user'] = $user;
        $this->session->set_userdata('user', $user);
        redirect($this->client_base_url . '/sponsor/dashboard');

    }

}
