<?php 

class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index(){
        $data['title'] = "List Pelanggan";
        $data['desc'] = "List Pelanggan";
        $data['breadcumb'] = breadcumb(['List Pelanggan' => '#']);
        $this->template->load('template-admin', 'content/pelanggan/main', $data);
    }
    function get(){
        $data = getservice('GET', 'user');
        echo json_encode($data->data);
    }
}
