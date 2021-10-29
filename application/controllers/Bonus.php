<?php

class Bonus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Bonus";
        $data['desc'] = "List Bonus";
        $data['breadcumb'] = breadcumb(['List Bonus' => 'bonus']);
        $this->template->load('template-admin', 'content/bonus/main', $data);
    }
    public function get()
    {
        $data = getservice('GET', 'bonus');
        echo json_encode($data->data);
    }
    function add()
    {
        
        $parts = [
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'tipe',
                'contents' => $this->input->post('tipe'),
            ],
            [
                'name' => 'product',
                'contents' => str_replace(",",";",$this->input->post('product')),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'productDetail',
                'contents' => implode(';',$this->input->post('detail')),
            ],
            [
                'name' => 'masa_awal',
                'contents' => $this->input->post('masa_awal'),
            ],
            [
                'name' => 'masa_akhir',
                'contents' => $this->input->post('masa_akhir'),
            ],
        ];
        if ($this->input->post('productCek')) {
                $parts[] = [
                'name' => 'productCek',
                'contents' => str_replace(",",";",$this->input->post('productCek')),
            ];
        }
        if ($this->input->post('jumlah')) {
            $parts[] = [
            'name' => 'jumlah',
            'contents' => $this->input->post('jumlah'),
            ];
        }
       
        if ($_FILES['gambar']['name']) {
            $path = $_FILES['gambar']['tmp_name'];
            $filename = $_FILES['gambar']['name'];
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('POST', 'bonus/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated(){
        $id_promo = $this->input->post('id_bonus');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'bonus/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'title',
                'contents' => $this->input->post('title'),
            ],
            [
                'name' => 'tipe',
                'contents' => $this->input->post('tipe'),
            ],
            [
                'name' => 'product',
                'contents' => str_replace(",",";",$this->input->post('product')),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'productDetail',
                'contents' => implode(';',$this->input->post('detail')),
            ],
            [
                'name' => 'masa_awal',
                'contents' => $this->input->post('masa_awal'),
            ],
            [
                'name' => 'masa_akhir',
                'contents' => $this->input->post('masa_akhir'),
            ],
        ];
        if ($this->input->post('productCek')) {
                $parts[] = [
                'name' => 'productCek',
                'contents' => str_replace(",",";",$this->input->post('productCek')),
            ];
        }
        if ($this->input->post('jumlah')) {
            $parts[] = [
            'name' => 'jumlah',
            'contents' => $this->input->post('jumlah'),
            ];
        }
       
        if ($_FILES['gambar']['name']) {
            $path = $_FILES['gambar']['tmp_name'];
            $filename = $_FILES['gambar']['name'];
            $parts[] = [
                'name' => 'gambar',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'bonus/update/'.$this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
