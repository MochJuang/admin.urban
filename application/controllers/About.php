<?php

class About extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List About";
        $data['desc'] = "List About";
        $data['breadcumb'] = breadcumb(['List About' => 'about']);
        $this->template->load('template-admin', 'content/about/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'about');
        echo json_encode($data->data);
    }
    function add()
    {
        // $path = $_FILES['gambar']['tmp_name'];
        // $filename = $_FILES['gambar']['name'];
        $parts = [
            [
                'name' => 'content',
                'contents' => $this->input->post('content'),
            ],
        ];
        // if ($_FILES['gambar']['name']) {
        //     $parts[] = [
        //         'name' => 'gambar',
        //         'contents' => fopen($path, 'r'),
        //         'filename' => $filename
        //     ];
        // }
        $data = getservice('POST', 'about/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'content',
                'contents' => $this->input->post('content'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ]
        ];
        $data = getservice('PUT', 'about/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
