<?php
class Subkategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Sub Kategori";
        $data['desc'] = "List Sub Kategori";
        $data['breadcumb'] = breadcumb(['Sub Kategori' => 'subkategori']);
        $this->template->load('template-admin', 'content/subkategori/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'subkategori');
        echo json_encode($data->data);
    }
    function getMaxId()
    {
        $kodeKategori = getservice('GET', 'kategori/' . $this->input->get('kategori_id'));
        $subKategoriCode = $this->input->get('subKategoriCode');
        $subKategoriCode = $subKategoriCode ? '&subKategoriCode=' . $subKategoriCode : '';
        $data = getservice('GET', 'subkategori/maxId?', 'kategori_id=' . $this->input->get('kategori_id') . $subKategoriCode);
        echo json_encode([$data->data, $kodeKategori->data]);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'kodeSubKategori',
                'contents' => $this->input->post('kodeSubKategori'),
            ],
            [
                'name' => 'nama_sub_kategori',
                'contents' => $this->input->post('nama_sub_kategori'),
            ],
            [
                'name' => 'kategori_id',
                'contents' => $this->input->post('kategori_id'),
            ],
            [
                'name' => 'countCode',
                'contents' => $this->input->post('countCode'),
            ]
        ];
        $data = getservice('POST', 'subkategori/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_sub_kategori',
                'contents' => $this->input->post('nama_sub_kategori'),
            ], [
                'name' => 'kategori_id',
                'contents' => $this->input->post('kategori_id'),
            ],
        ];
        $data = getservice('PUT', 'subkategori/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
