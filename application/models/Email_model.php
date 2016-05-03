<?php

class Email_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function send_email($to, $title, $message) {
        if(!$this->is_localhost()) {
            $headers = "From: Sponsor Tool - Hutarian.com<no-reply@sdcdirectinc.com>"  . "\r\n";
            if(mail($to, $title, $message, $headers)) {
                return true;
            }
            return false;
        }
        return true;
    }

    public function is_localhost() {
        $whitelist = array('127.0.0.1', '::1', 'sponsors.sdc');
        if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            return true;
        }
        return false;
    }

} 