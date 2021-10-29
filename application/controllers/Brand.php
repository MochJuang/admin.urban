<?php

class Brand extends CI_Controller
{
    function index()
    {
        $data['title'] = "List Brand";
        $data['desc'] = "List Brand";
        $data['breadcumb'] = breadcumb(['List Brand' => '#']);
        $this->template->load('template-admin', 'content/brand/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'brand');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'nama_brand',
                'contents' => $this->input->post('nama_brand'),
            ]
        ];

        $data = getservice('POST', 'brand/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_brand',
                'contents' => $this->input->post('nama_brand'),
            ]
        ];
        $data = getservice('PUT', 'brand/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
