<?php

class Modal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Modal";
        $data['desc'] = "List Modal";
        $data['breadcumb'] = breadcumb(['List Modal' => 'modal']);
        $this->template->load('template-admin', 'content/modal/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'modal');
        echo json_encode($data->data);
    }
    function add()
    {
        
        $parts = [
            [
                'name' => 'deskripsi',
                'contents' => $this->input->post('deskripsi'),
            ],
            
            [
                'name' => 'masa_awal',
                'contents' => $this->input->post('startDate'),
            ],
            [
                'name' => 'time',
                'contents' => $this->input->post('time'),
            ],
            [
                'name' => 'masa_akhir',
                'contents' => $this->input->post('lastDate'),
            ],
            [
                'name' => 'url',
                'contents' => $this->input->post('url'),
            ],
        ];

        if ($_FILES['gambar_web']['name']) {
            $path = $_FILES['gambar_web']['tmp_name'];
            $filename = $_FILES['gambar_web']['name'];
            $parts[] = [
                'name' => 'gambar_web',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        if ($_FILES['gambar_mobile']['name']) {
            $path = $_FILES['gambar_mobile']['tmp_name'];
            $filename = $_FILES['gambar_mobile']['name'];
            $parts[] = [
                'name' => 'gambar_mobile',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('POST', 'modal/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated(){
        $id_promo = $this->input->post('id_modal');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'modal/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'deksripsi',
                'contents' => $this->input->post('deksripsi'),
            ],
            [
                'name' => 'masa_awal',
                'contents' => $this->input->post('startDate'),
            ],
            [
                'name' => 'time',
                'contents' => $this->input->post('time'),
            ],
            [
                'name' => 'masa_akhir',
                'contents' => $this->input->post('lastDate'),
            ],
            [
                'name' => 'url',
                'contents' => $this->input->post('url'),
            ],
        ];

        if ($_FILES['gambar_web']['name']) {
            $path = $_FILES['gambar_web']['tmp_name'];
            $filename = $_FILES['gambar_web']['name'];
            $parts[] = [
                'name' => 'gambar_web',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        if ($_FILES['gambar_mobile']['name']) {
            $path = $_FILES['gambar_mobile']['tmp_name'];
            $filename = $_FILES['gambar_mobile']['name'];
            $parts[] = [
                'name' => 'gambar_mobile',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'modal/update/'.$this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
