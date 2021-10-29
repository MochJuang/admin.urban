<?php
class MenuManagement extends CI_Controller
{
    function index()
    {

        $data['title'] = "List Menu Management";
        $data['desc'] = "List Management";
        $data['breadcumb'] = breadcumb(['List Menu Management' => '#']);
        $this->template->load('template-admin', 'content/menu/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'menu/menu_admin');
        echo json_encode($data->data);
    }
    function get_header()
    {
        $data = getservice('GET', 'menu/header_section');
        echo json_encode($data->data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'label',
                'contents' => $this->input->post('label'),
            ],
            [
                'name' => 'link',
                'contents' => $this->input->post('link'),
            ],
            [
                'name' => 'icon',
                'contents' => $this->input->post('icon'),
            ],
            [
                'name' => 'parent',
                'contents' => $this->input->post('parent') == "" ? 0 : $this->input->post('parent'),
            ],
            [
                'name' => 'is_head_section',
                'contents' => $this->input->post('is_head_section'),
            ]
        ];

        $data = getservice('POST', 'menu/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'label',
                'contents' => $this->input->post('label'),
            ],
            [
                'name' => 'link',
                'contents' => $this->input->post('link'),
            ],
            [
                'name' => 'icon',
                'contents' => $this->input->post('icon'),
            ],
            [
                'name' => 'parent',
                'contents' => $this->input->post('parent') == "" ? 0 : $this->input->post('parent'),
            ],
            [
                'name' => 'is_head_section',
                'contents' => $this->input->post('is_head_section'),
            ]
        ];
        $data = getservice('PUT', 'menu/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
