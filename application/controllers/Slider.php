<?php

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!is_login('is_logged')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "List Slider";
        $data['desc'] = "List Slider";
        $data['breadcumb'] = breadcumb(['Slider' => 'slider']);
        $this->template->load('template-admin', 'content/slider/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'slider');
        echo json_encode($data->data);
    }
    function add()
    {
        $path = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];

        $parts = [
            [
                'name' => 'nama_slider',
                'contents' => $this->input->post('nama_slider'),
            ],
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'link',
                'contents' => $this->input->post('link'),
            ]
        ];
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('POST', 'slider/insert/', '', [
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
                'name' => 'nama_slider',
                'contents' => $this->input->post('nama_slider'),
            ],
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'link',
                'contents' => $this->input->post('link'),
            ]
        ];
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'slider/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated()
    {
        $id_promo = $this->input->post('id_slider');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'slider/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
