<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if(null == $user) {
            redirect('/');
        }
        $this->load->model('shop_model');
    }

	public function index() {
        $shop = $this->shop_model->get(array('user_id' => $this->user->user_id));
        if($shop) {
            $this->data['shop'] = $shop;
        }
        $this->_renderSponsor('sponsor/shop/index');
	}

    public function action() {
        $action = $this->input->post('action');
        switch($action) {
            case 'shop_save' :
                $shop = $this->input->post('shop');
                $shop['user_id'] = $this->user->user_id;
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
