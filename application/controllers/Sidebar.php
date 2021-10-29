<?php

class Sidebar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Sidebar";
        $data['desc'] = "List Sidebar";
        $data['breadcumb'] = breadcumb(['List Sidebar' => 'Sidebar']);
        $this->template->load('template-admin', 'content/sidebar/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'sidebar');
        echo json_encode($data->data);
    }
    function add()
    {
        
        $parts = [
            [
                'name' => 'listProduct',
                'contents' => $this->input->post('listProduct'),
            ]
        ];
    
        $data = getservice('POST', 'sidebar/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'listProduct',
                'contents' => $this->input->post('listProduct'),
            ]
        ];
    
        $data = getservice('PUT', 'sidebar/update/'.$this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
