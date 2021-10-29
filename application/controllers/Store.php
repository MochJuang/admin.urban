<?php

class Store extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Store";
        $data['desc'] = "List Store";
        $data['breadcumb'] = breadcumb(['List Store' => 'Store']);
        $this->template->load('template-admin', 'content/store/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'store');
        echo json_encode($data->data);
    }
    
    function add()
    {
        
        $parts = [
            [
                'name' => 'name',
                'contents' => $this->input->post('name'),
            ],
           
            [
                'name' => 'address',
                'contents' => $this->input->post('address'),
            ],
            [
                'name' => 'open',
                'contents' => $this->input->post('open'),
            ],
            [
                'name' => 'latitude',
                'contents' => $this->input->post('latitude'),
            ],
            [
                'name' => 'longitude',
                'contents' => $this->input->post('longitude'),
            ],
        ];
    
        $data = getservice('POST', 'store/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'name',
                'contents' => $this->input->post('name'),
            ],
           
            [
                'name' => 'address',
                'contents' => $this->input->post('address'),
            ],
            [
                'name' => 'open',
                'contents' => $this->input->post('open'),
            ],
            [
                'name' => 'latitude',
                'contents' => $this->input->post('latitude'),
            ],
            [
                'name' => 'longitude',
                'contents' => $this->input->post('longitude'),
            ],
        ];
    
        $data = getservice('PUT', 'store/update/'.$this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
