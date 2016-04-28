<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VABC extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

	public function index() {

        switch ($_SERVER['HTTP_HOST']) {
            case 'sponsors.voicesagainstbraincancer.com':
            case 'sponsors.vabc':
                $this->sponsor();
                break;

            case 'events.voicesagainstbraincancer.org':
            case 'events.vabc':
                $this->events();
                break;
        }

    }

    public function sponsor() {
        $this->_render('sponsor/login');
    }

}
