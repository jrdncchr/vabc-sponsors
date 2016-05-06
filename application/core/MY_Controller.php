<?php

class MY_Controller extends CI_Controller {

    protected $user;
    protected $data;

    protected $css;
    protected $js;
    protected $bower;

    protected $project = "Hutarian - Sponsorship";
    protected $title = "Sponsorship - Sponsors";
    protected $description = "Hutarian - Sponsorship - Sponsors";
    protected $keywords = "Hutarian - Sponsorship - Sponsors";
    protected $author = "Danero";
    protected $stripe;

    public function __construct($logged = false)
    {
        parent::__construct();

        $this->request_method = $_SERVER['REQUEST_METHOD'];
        $this->load->helper('url');
        $this->load->library('session');

        $this->check_client();
        $this->define_settings();

        $this->user = $this->session->userdata('user');
        if(null != $this->user) {
            $this->data['user'] = $this->user;
        }

        $this->data['project'] = $this->project;
        $this->data['title'] = $this->title;
        $this->data['description'] = $this->description;
        $this->data['keywords'] = $this->keywords;
        $this->data['author'] = $this->author;
    }


    /* Configure the settings based from host.
     */
    public function define_settings()
    {
        $localhost = array('127.0.0.1', '::1', 'sponsors.sdc');
        if(in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
            $this->stripe = array(
                "secret_key"      => "sk_test_pamZzG9V4Zm7QhkenF8IGZrf",
                "publishable_key" => "pk_test_61MXzXFzVMcUWGMcvDvJCIn1"
            );
            define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
            define('PAYPAL_BUSINESS', 'jrdn-sb-business@gmail.com');
            define('MAILGUN_API', 'key-0a22dc9b70f19379be7b3d0b589597d7');
            define('MAILGUN_DOMAIN', 'sandbox42bb7fca122043d4a2db264e4d5c6167.mailgun.org');
        } else {
            $this->stripe = array(
                "secret_key"      => "sk_test_pamZzG9V4Zm7QhkenF8IGZrf",
                "publishable_key" => "pk_test_61MXzXFzVMcUWGMcvDvJCIn1"
            );
            define('PAYPAL_URL', 'https://www.paypal.com/cgi-bin/webscr');
            define('PAYPAL_BUSINESS', 'soferamir@gmail.com');
            define('MAILGUN_API', 'key-0a22dc9b70f19379be7b3d0b589597d7');
            define('MAILGUN_DOMAIN', 'sandbox42bb7fca122043d4a2db264e4d5c6167.mailgun.org');
        }

        \Stripe\Stripe::setApiKey($this->stripe['secret_key']);
    }

    /* Check the first segment which is the client code. If exists, it will create the client base url,
     * and will allow the user to continue.
     */
    protected $client_base_url;
    protected $client_code;
    public function check_client() {
        $uri = uri_string();
        if(!empty($uri)) {
            $uri_array = explode('/',$uri);
            $client_code = $uri_array[0];
            if(isset($client_code)) {
                $session_client_code = $this->session->userdata('client_code');
                if(null == $session_client_code) {
                    $this->load->model('client_model');
                    $client = $this->client_model->get(array('client_code' => $client_code));
                    if($client) {
                        $this->session->set_userdata('client_code', $client->client_code);
                        $this->data['client_base_url'] = base_url() . $client_code;
                        $this->client_base_url = base_url() . $client_code;
                        $this->client_code = $client_code;
                        $this->session->set_userdata('client_id', $client->client_id);
                        define('CLIENT_ID', $client->client_id);
                        return true;
                    }
                } else {
                    if($client_code == $session_client_code) {
                        $this->data['client_base_url'] = base_url() . $client_code;
                        $this->client_base_url = base_url() . $client_code;
                        $this->client_code = $client_code;
                        $client_id = $this->session->userdata('client_id');
                        define('CLIENT_ID', $client_id);
                        return true;
                    }
                }
                redirect(base_url());
            }
        }
        return false;
    }

    public function redirect($path) {
        redirect($this->client_code . '/' . $path);
    }

    public function _render($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;
        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/nav', $data, true);
        $data['content'] = $this->load->view($view, $data, true);
        $this->load->view('templates/skeleton', $data);
    }

    public function _renderSponsor($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;
        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/sponsor/nav', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/sponsor/skeleton', $data);
    }

    public function _renderEvent($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;
        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/event/nav', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/event/skeleton', $data);
    }

} 