<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $sponsor = $this->session->userdata('sponsor');
        if(null == $sponsor) {
            redirect('/');
        }
        $this->load->model('shop_model');
    }

	public function index() {
        $shop = $this->shop_model->get(array('sponsor_id' => $this->sponsor->sponsor_id));
        if($shop) {
            $this->data['shop'] = $shop;
        }
        $this->_renderL('shop/index');
	}

    public function action() {
        $action = $this->input->post('action');
        switch($action) {
            case 'shop_save' :
                $shop = $this->input->post('shop');
                $shop['sponsor_id'] = $this->sponsor->sponsor_id;
                if(isset($shop['shop_id'])) {
                    $result = $this->shop_model->update($shop['shop_id'], $shop);
                } else {
                    $result = $this->shop_model->add($shop);
                }
                break;
            default :
                $result = array('success' => false, 'message' => 'Action not found.');
        }
        echo json_encode($result);
    }

}
