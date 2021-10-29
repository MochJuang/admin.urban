<?php
class Promo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Promo Product";
        $data['desc'] = "List Promo";
        $data['breadcumb'] = breadcumb(['List Promo' => 'promo']);
        $this->template->load('template-admin', 'content/promo/main', $data);
    }
    function item(){
        $data['title'] = "List Promo Product";
        $data['desc'] = "List Promo";
        $data['breadcumb'] = breadcumb(['List Promo' => 'promo']);
        $this->template->load('template-admin', 'content/promo/main', $data);
    }
    function gratisongkir(){
        $data['title'] = "List Promo Product";
        $data['desc'] = "List Promo Gratis Ongkir";
        $data['breadcumb'] = breadcumb(['List Promo Gratis Ongkir' => 'promo']);
        $this->template->load('template-admin', 'content/promo/gratisOngkir', $data);
    }
    function get()
    {
        $data = getservice('GET', 'promo');
        echo json_encode($data->data);
    }
    function add()
    {
        $path = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];
        $parts = [
            [
                'name' => 'nama_promo',
                'contents' => $this->input->post('nama_promo'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'startDate',
                'contents' => $this->input->post('startDate'),
            ],
            [
                'name' => 'lastDate',
                'contents' => $this->input->post('lastDate'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($this->input->post('promo')) {
            $parts[] = [
                'name' => 'promo',
                'contents' => $this->input->post('promo'),
            ];
        }
        if ($this->input->post('khusus')) {
            $parts[] = [
                'name' => 'khusus',
                'contents' => $this->input->post('khusus'),
            ];
        }
        if ($this->input->post('harga')) {
            $parts[] = [
                'name' => 'harga',
                'contents' => $this->input->post('harga'),
            ];
        }
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('POST', 'promo/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $path = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];
        $parts = [
            [
                'name' => 'nama_promo',
                'contents' => $this->input->post('nama_promo'),
            ],
          
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'startDate',
                'contents' => $this->input->post('startDate'),
            ],
            [
                'name' => 'lastDate',
                'contents' => $this->input->post('lastDate'),
            ],
            [
                'name' => 'khusus',
                'contents' => $this->input->post('khusus') ? 1 : 0,
            ]
        ];
        // if ($this->input->post('khusus')) {
        //     $parts[] = [
        //         'name' => 'khusus',
        //         'contents' => $this->input->post('khusus'),
        //     ];
        // }
        if ($_FILES['gambar']['name']) {
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        if ($this->input->post('promo')) {
            $parts[] = [
                'name' => 'promo',
                'contents' => $this->input->post('promo'),
            ];
        }
        if ($this->input->post('harga')) {
            $parts[] = [
                'name' => 'harga',
                'contents' => $this->input->post('harga'),
            ];
        }
        $data = getservice('POST', 'promo/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated()
    {
        $id_promo = $this->input->post('id_promo');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('POST', 'promo/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function promokhusus(){
        $data['title'] = "List Promo Khusus";
        $data['desc'] = "List Promo Khusus";
        $data['breadcumb'] = breadcumb(['List Promo Khusus' => 'promo']);
        $this->template->load('template-admin', 'content/promo/promokhusus', $data);
    }
    function getpromokhusus()
    {
        $data = getservice('GET', 'promoKhusus');
        echo json_encode($data->data);
    }
}
