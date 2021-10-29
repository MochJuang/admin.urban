<?php

class Departemen extends CI_Controller
{
    function index()
    {
        $data['title'] = "List Departemen";
        $data['desc'] = "List Departemen";
        $data['breadcumb'] = breadcumb(['List Departemen' => '#']);
        $this->template->load('template-admin', 'content/departemen/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'departemen');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'nama',
                'contents' => $this->input->post('nama'),
            ],
            [
                'name' => 'brand_id',
                'contents' => $this->input->post('brand_id'),
            ]
        ];

        $data = getservice('POST', 'departemen/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama',
                'contents' => $this->input->post('nama'),
            ],
            [
                'name' => 'brand_id',
                'contents' => $this->input->post('brand_id'),
            ]
        ];
        $data = getservice('PUT', 'departemen/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
