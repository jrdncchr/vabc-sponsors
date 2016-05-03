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

    public function __construct($logged = false)
    {
        parent::__construct();
        $this->request_method = $_SERVER['REQUEST_METHOD'];

        $this->load->helper('url');
        $this->load->library('session');

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

    public function _render($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;

        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/nav', $data, true);
//        $data['footer'] = $this->load->view('templates/footer', $this->data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/skeleton', $data);
    }

    public function _renderL2($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;

        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['sidenav'] = $this->load->view('templates/logged/sidenav', $data, true);
        $data['nav'] = $this->load->view('templates/logged/nav', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/logged/skeleton', $data);
    }

    public function _renderL($view)
    {
        $data = $this->data;
        $data['css'] = $this->css;
        $data['js'] = $this->js;
        $data['bower'] = $this->bower;

        $data['head'] = $this->load->view('templates/head', $data, true);
        $data['nav'] = $this->load->view('templates/logged/nav2', $data, true);
        $data['footer'] = $this->load->view('templates/footer', $data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/logged/skeleton2', $data);
    }

    public function is_localhost() {
        $whitelist = array('127.0.0.1', '::1', 'sponsors.sdc');
        if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            return true;
        }
        return false;
    }

} 