<?php
class Size extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Size Product";
        $data['desc'] = "List Size";
        $this->template->load('template-admin', 'content/ukuran/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'ukuran/withKategori');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'tipe',
                'contents' => $this->input->post('tipe'),
            ],
            [
                'name' => 'ukuran',
                'contents' => $this->input->post('ukuran'),
            ]
        ];
        $data = getservice('POST', 'ukuran/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
        // redirect('color');
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'tipe',
                'contents' => $this->input->post('tipe'),
            ],
            [
                'name' => 'ukuran',
                'contents' => $this->input->post('ukuran'),
            ]
        ];
        // $data = getservice('POST', 'warna/insert/', '', [
        //     'multipart' => $parts,
        // ]);
        $data = getservice('PUT', 'ukuran/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        // if ($data['success']) {

        //     $result = ['data' => true];
        // } else {
        //     $result = ['data' => false];
        // }
        echo json_encode($data);
    }
}
