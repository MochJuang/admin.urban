<?php

class Magazine extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Magazine";
        $data['desc'] = "List Magazine";
        $data['breadcumb'] = breadcumb(['List Magazine' => 'Magazine']);
        $this->template->load('template-admin', 'content/magazine/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'magazine');
        echo json_encode($data->data);
    }
    function add()
    {
        $path = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];
        $parts = [
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'url',
                'contents' => $this->input->post('url'),
            ]
        ];
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('POST', 'magazine/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $path = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];
        $parts = [
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'url',
                'contents' => $this->input->post('url'),
            ]
        ];
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'magazine/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
