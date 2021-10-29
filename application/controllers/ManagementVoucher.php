<?php

class ManagementVoucher extends CI_Controller
{
    function index()
    {
        $data['title'] = "List Management Voucher";
        $data['desc'] = "List Management Voucher";

        $data['breadcumb'] = breadcumb(['List Voucher' => 'voucher', 'Management Voucher' => 'managementVoucher']);
        $this->template->load('template-admin', 'content/voucher/management', $data);
    }
    function detail($id)
    {
        $data['title'] = "List Pengguna Voucher";
        $data['desc'] = "List Pengguna Voucher";
        $data['breadcumb'] = breadcumb(['List Voucher' => 'voucher', 'Management Voucher' => 'managementVoucher', 'Pengguna Voucher' => 'managementVoucher/detail/' . $id]);
        $data['id_management'] = $id;
        $this->template->load('template-admin', 'content/voucher/pengguna', $data);
    }
    function get()
    {
        $data = getservice('GET', 'management_voucher');
        echo json_encode($data->data);
    }
    function getPengguna()
    {
        $data = getservice('GET', 'pengguna_voucher/getPengguna', '?id_management=' . $this->input->get('id_management'));
        echo json_encode($data->data);
    }
    function add()
    {

        $parts = [
            [
                'name' => 'kode_voucher',
                'contents' => $this->input->post('kode_voucher'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ],
            [
                'name' => 'jumlah_pengguna',
                'contents' => $this->input->post('jumlah_pengguna'),
            ],
            [
                'name' => 'is_active',
                'contents' => $this->input->post('is_active'),
            ]
        ];

        $data = getservice('POST', 'management_voucher/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {

        $parts = [
            [
                'name' => 'kode_voucher',
                'contents' => $this->input->post('kode_voucher'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ],
            [
                'name' => 'jumlah_pengguna',
                'contents' => $this->input->post('jumlah_pengguna'),
            ],
            [
                'name' => 'is_active',
                'contents' => $this->input->post('is_active'),
            ]
        ];

        $data = getservice('PUT', 'management_voucher/update/' . $this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
