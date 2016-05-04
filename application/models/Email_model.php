<?php

class Email_Model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function send($to, $title, $message) {
        $client = new \Http\Adapter\Guzzle6\Client();
        $mailgun = new \Mailgun\Mailgun(MAILGUN_API, $client);
        $domain = MAILGUN_DOMAIN;

        $to = $this->is_localhost() ? 'danero.jrc@gmail.com' : $to;

        $mailgun->sendMessage($domain, array(
            'from'    => 'Hutarian - Sponsor Tool<no-reply@hutarian.com>',
            'to'      => $to,
            'subject' => $title,
            'text'    => $message)
        );
    }

    public function send_email_confirmation_code($to, $confirmation_code) {
        $title = "Sponsor Registration - Confirmation Code";
        $message = "Your email confirmation code is: " . $confirmation_code;
        $this->send($to, $title, $message);
    }

    public function is_localhost() {
        $whitelist = array('127.0.0.1', '::1', 'sponsors.sdc');
        if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            return true;
        }
        return false;
    }

} 