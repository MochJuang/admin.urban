<?php

class Subkategorilv2 extends CI_Controller
{
    function index()
    {

        $data['title'] = "List Sub Kategori Level 2";
        $data['desc'] = "List Sub Kategori Level 2";
        $data['breadcumb'] = breadcumb(['Sub Kategori Level 2' => 'subkategori']);
        $this->template->load('template-admin', 'content/subkategorilv2/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'subkategorilv2');
        echo json_encode($data->data);
    }
    function getMaxId()
    {
        // $kodeKategori = getservice('GET', 'kategori/' . $this->input->get('kategori_id'));
        // $subKategoriCode = $this->input->get('subKategoriCode');
        // $subKategoriCode = $subKategoriCode ? '&subKategoriCode=' . $subKategoriCode : '';
        $data = getservice('GET', 'subkategorilv2/maxId?', 'sub_kategori_id=' . $this->input->get('sub_kategori_id') );
        echo json_encode([$data->data]);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'kodeSubkategoriLv2',
                'contents' => $this->input->post('kodeSubkategoriLv2'),
            ],
            [
                'name' => 'nama_sub_kategori_lv2',
                'contents' => $this->input->post('nama_sub_kategori_lv2'),
            ],
            [
                'name' => 'sub_kategori_id',
                'contents' => $this->input->post('sub_kategori_id'),
            ]
        ];
        $data = getservice('POST', 'subkategorilv2/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
    }
    function delete()
    {
    }
}
