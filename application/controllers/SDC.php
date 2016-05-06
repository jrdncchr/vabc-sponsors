<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SDC extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {
        echo "Under Construction";
        $this->test_registration();

    }

    public function test_registration() {
        $this->session->set_userdata('client_code', 'vabc');
        $this->data['client_base_url'] = base_url() . 'vabc';
        $this->client_base_url = base_url() . 'vabc';
        $this->client_code = 'vabc';
        $this->session->set_userdata('client_id', '1100');
        define('CLIENT_ID', '1100');

        $events = [1, 2];
        $level_id = 1;
        $user_id = 19;

        $this->load->model('level_model');
        $level = $this->level_model->get(array('level_id' => $level_id));
        $price_total = 0;

        $this->load->model('event_model');
        $events_sponsoring = "user_id=$user_id&level_id=$level_id&events=";
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

}
