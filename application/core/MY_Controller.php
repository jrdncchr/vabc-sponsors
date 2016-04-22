<?php

class MY_Controller extends CI_Controller {

    protected $user;
    protected $data;

    protected $css;
    protected $js;
    protected $bower;

    protected $project = "Voices Against Brain Cancer";
    protected $title = "Voices - Sponsors";
    protected $description = "Voices Against Brain Cancer - Sponsors";
    protected $keywords = "Voices Against Brain Cancer - Sponsors";
    protected $author = "Danero";

    public function __construct($logged = false)
    {
        parent::__construct();
        $this->load->helper('url');

        $this->data['project'] = $this->project;
        $this->data['title'] = $this->title;
        $this->data['description'] = $this->description;
        $this->data['keywords'] = $this->keywords;
        $this->data['author'] = $this->author;
    }

    public function _render($view)
    {
        $this->data['css'] = $this->css;
        $this->data['js'] = $this->js;
        $this->data['bower'] = $this->bower;

        $data['head'] = $this->load->view('templates/head', $this->data, true);
        $data['nav'] = $this->load->view('templates/nav', $this->data, true);
        $data['footer'] = $this->load->view('templates/footer', $this->data, true);
        $data['content'] = $this->load->view($view, $data, true);

        $this->load->view('templates/skeleton', $data);
    }

} 