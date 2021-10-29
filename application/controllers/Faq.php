<?php

class Faq extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Faq";
        $data['desc'] = "List Faq";
        $data['breadcumb'] = breadcumb(['List Faq' => 'faq']);
        $this->template->load('template-admin', 'content/faq/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'faq');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'pertanyaan',
                'contents' => $this->input->post('pertanyaan'),
            ],
            [
                'name' => 'jawaban',
                'contents' => $this->input->post('jawaban'),
            ]
        ];
        $data = getservice('POST', 'faq/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'pertanyaan',
                'contents' => $this->input->post('pertanyaan'),
            ],
            [
                'name' => 'jawaban',
                'contents' => $this->input->post('jawaban'),
            ]
        ];
        $data = getservice('PUT', 'faq/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
