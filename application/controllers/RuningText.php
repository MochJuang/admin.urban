<?php

class RuningText extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Runing Text";
        $data['desc'] = "List Runing Text";
        $data['breadcumb'] = breadcumb(['List Runing Text' => 'runingText']);
        $this->template->load('template-admin', 'content/runingText/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'runingText');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'runingText',
                'contents' => $this->input->post('content'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($this->input->post('kd_voucher')) {
            $parts[] = [
                'name' => 'kd_voucher',
                'contents' => $this->input->post('kd_voucher'),
            ];
        }
        if ($this->input->post('kd_promo')) {
            $parts[] = [
                'name' => 'kd_promo',
                'contents' => $this->input->post('kd_promo'),
            ];
        }
        $data = getservice('POST', 'runingText/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'runingText',
                'contents' => $this->input->post('content'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($this->input->post('kd_voucher')) {
            $parts[] = [
                'name' => 'kd_voucher',
                'contents' => $this->input->post('kd_voucher'),
            ];
        }
        if ($this->input->post('kd_promo')) {
            $parts[] = [
                'name' => 'kd_promo',
                'contents' => $this->input->post('kd_promo'),
            ];
        }
        $data = getservice('PUT', 'runingText/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
