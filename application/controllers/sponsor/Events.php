<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if(null == $user) {
            redirect('/');
        }
        $this->load->model('event_model');
    }

	public function index() {
        $this->data['events'] = $this->event_model->get_event_sponsors($this->user->user_id);
        $this->_renderL('sponsor/events/index');
	}

    public function guests($event_id) {
        $this->data['event'] = $this->event_model->get(array('event_id' => $event_id));
        $this->_renderL('sponsor/events/guest');
    }

    public function action() {
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
