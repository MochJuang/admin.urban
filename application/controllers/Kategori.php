<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Kategori";
        $data['desc'] = "List Kategori";
        $data['breadcumb'] = breadcumb(['List Kategori' => 'kategori']);
        $this->template->load('template-admin', 'content/kategori/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'kategori');
        echo json_encode($data->data);
    }
    function getMaxId()
    {
        $data = getservice('GET', 'kategori/maxId');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'kode_kategori',
                'contents' => $this->input->post('kode_kategori'),
            ],
            [
                'name' => 'nama_kategori',
                'contents' => $this->input->post('nama_kategori'),
            ],
            [
                'name' => 'departemen_id',
                'contents' => $this->input->post('departemen_id'),
            ]
        ];
        $data = getservice('POST', 'kategori/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_kategori',
                'contents' => $this->input->post('nama_kategori'),
            ],
            [
                'name' => 'departemen_id',
                'contents' => $this->input->post('departemen_id'),
            ]
        ];
        $data = getservice('PUT', 'kategori/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
