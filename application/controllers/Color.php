<?php

class Color extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Color Product";
        $data['desc'] = "List Group Color";
        $data['title2'] = "List Size Product";
        $data['desc2'] = "List Size";
        $data['breadcumb'] = breadcumb(['List Warna & Ukuran' => 'color']);
        $this->template->load('template-admin', 'content/warna/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'warna');
        echo json_encode($data->data);
    }
    function getGroup()
    {
        $data = getservice('GET', 'gColor/colorGroup');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'nama_warna',
                'contents' => $this->input->post('nama_warna'),
            ],
            [
                'name' => 'color_id',
                'contents' => $this->input->post('group_id'),
            ],
            [
                'name' => 'warna',
                'contents' => $this->input->post('warna'),
            ]
        ];
        $data = getservice('POST', 'warna/insert/', '', [
            'multipart' => $parts,
        ]);

        echo json_encode($data);
    }
    function addGroup(){
        
        $parts = [
            [
                'name' => 'name_color',
                'contents' => $this->input->post('name_color'),
            ],
            
            [
                'name' => 'hex_color',
                'contents' => $this->input->post('hex_color'),
            ]
        ];
        $data = getservice('POST', 'gColor/insert/', '', [
            'multipart' => $parts,
        ]);

        echo json_encode($data);
    }
    function editGroup(){
        $parts = [
            [
                'name' => 'name_color',
                'contents' => $this->input->post('name_color'),
            ],
            [
                'name' => 'hex_color',
                'contents' => $this->input->post('hex_color'),
            ]
        ];

        $data = getservice('PUT', 'gColor/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);

        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_warna',
                'contents' => $this->input->post('nama_warna'),
            ],
            [
                'name' => 'warna',
                'contents' => $this->input->post('warna'),
            ]
        ];

        $data = getservice('PUT', 'warna/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);

        echo json_encode($data);
    }
}
