<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] =  "List User Admin";
        $data['desc'] = "List User";
        $data['breadcumb'] = breadcumb(['List User' => 'user']);
        $this->template->load('template-admin', 'content/user/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'admin');
        echo json_encode($data->data);
    }
    public function get_users()
    {
        $data = getservice('GET', 'user');
        echo json_encode($data->data);
    }
    public function add()
    {
        $parts = [
            [
                'name' => 'firstname',
                'contents' => $this->input->post('firstname'),
            ],
            [
                'name' => 'lastname',
                'contents' => $this->input->post('lastname'),
            ],
            [
                'name' => 'email',
                'contents' => $this->input->post('email'),
            ],
            [
                'name' => 'username',
                'contents' => $this->input->post('username'),
            ],
            [
                'name' => 'phone',
                'contents' => $this->input->post('phone'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'password',
                'contents' => $this->input->post('password'),
            ]
        ];
        $data = getservice('POST', 'admin/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    public function edit()
    {
        $parts = [
            [
                'name' => 'firstname',
                'contents' => $this->input->post('firstname'),
            ],
            [
                'name' => 'lastname',
                'contents' => $this->input->post('lastname'),
            ],
            [
                'name' => 'email',
                'contents' => $this->input->post('email'),
            ],
            [
                'name' => 'username',
                'contents' => $this->input->post('username'),
            ],
            [
                'name' => 'phone',
                'contents' => $this->input->post('phone'),
            ],
            [
                'name' => 'status',
                'contents' => 1,
            ]

        ];
        if ($this->input->post('password')) {
            $parts[] = [
                'name' => 'password',
                'contents' => $this->input->post('password')
            ];
        }
        if ($this->input->post('jenis')) {
            $parts[] = [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ];
        }
        $data = getservice('PUT', 'admin/update/' . $this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated()
    {
        $id_promo = $this->input->post('id_admin');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'admin/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function profile()
    {
        $data['title'] =  "Profile User Admin";
        $data['desc'] = "Profile User";
        $data['breadcumb'] = breadcumb(['Profile User' => '#']);
        $data['data'] = getservice('GET', 'admin/' . $this->session->userdata('id_admin'));
        $this->template->load('template-admin', 'content/user/profile', $data);
    }
}
