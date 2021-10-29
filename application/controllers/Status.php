<?php

class Status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "Check Order Status Transaction";
        $data['desc'] = "Status Transaction";
        $data['breadcumb'] = breadcumb(['Status Transaction' => '#']);
        $this->template->load('template-admin', 'content/status/main', $data);
    }
    function get(){

    }
}
