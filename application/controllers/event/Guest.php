<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('user_model');
    }

	public function index() {

	}

    public function register($event_id, $sponsor_id = 0) {
        $this->data['event'] = $this->event_model->get(array('event_id' => $event_id));
        if($sponsor_id > 0) {
            $this->data['sponsor'] = $this->user_model->get_details(array('user.user_id' => $sponsor_id));
        }
        $this->_renderEvent('event/guest/register');
    }

    public function register_action() {
        $action = $this->input->post('action');
        switch($action) {
            case 'guest_list':
                $list = $this->event_model->get_event_sponsors_guests(1, 2);
                echo json_encode(array('data' => $list));
                break;
            default:
        }
    }

}
