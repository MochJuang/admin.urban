<?php
class Component extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Component Promo";
        $data['desc'] = "List Component Promo";
        $data['breadcumb'] = breadcumb(['List Component Promo' => 'component']);
        $this->template->load('template-admin', 'content/component/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'component/find?jenis=' . $this->input->get('jenis') . '&id=' . $this->input->get('id'));
        echo json_encode($data->data);
    }
    function getNewArrival(){
        $data = getservice('GET', 'component/getNewArrival');
        echo json_encode($data->data);
    }
    function newArrival()
    {
        $data['title'] = "List New Arrival";
        $data['desc'] = "List Component New Arrival";
        $data['breadcumb'] = breadcumb(['List Component New Arrival' => 'component']);
        $this->template->load('template-admin', 'content/component/mainArrival', $data);
    }
    function add()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $parts = [
            [
                'name' => 'judul',
                'contents' => $this->input->post('judul'),
            ],
            [
                'name' => 'promo_id',
                'contents' => $this->input->post('promo_id'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'image',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        if ($_FILES['imageMobile']['name']) {
            $parts[] = [
                'name' => 'imageMobile',
                'contents' => fopen($_FILES['imageMobile']['tmp_name'], 'r'),
                'filename' => $_FILES['imageMobile']['name']
            ];
        }
        // if ($this->input->post('tipe')) {
        //     $parts[] = [
        //         'name' => 'tipe',
        //         'contents' => $this->input->post('tipe'),
        //     ];
        // }
        // if ($this->input->post('kategori')) {
        //     $parts[] = [
        //         'name' => 'kategori',
        //         'contents' => $this->input->post('kategori'),
        //     ];
        // }
        // if ($this->input->post('subkategori')) {
        //     $parts[] = [
        //         'name' => 'subkategori',
        //         'contents' => $this->input->post('subkategori'),
        //     ];
        // }
        // if ($this->input->post('sub_kategori_lv2')) {
        //     $parts[] = [
        //         'name' => 'sub_kategori_lv2',
        //         'contents' => $this->input->post('sub_kategori_lv2'),
        //     ];
        // }
        $data = getservice('POST', 'component/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function addArrival()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $parts = [
            [
                'name' => 'kode_product',
                'contents' => $this->input->post('kode_product'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'image',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        
        $data = getservice('POST', 'component/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function editArrival()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $parts = [
            [
                'name' => 'kode_product',
                'contents' => $this->input->post('kode_product'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'image',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'component/update/'.$this->input->post('id_manage'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $parts = [
            [
                'name' => 'judul',
                'contents' => $this->input->post('judul'),
            ],
            [
                'name' => 'promo_id',
                'contents' => $this->input->post('promo_id'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ]
        ];
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'image',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        if ($_FILES['imageMobile']['name']) {
            $parts[] = [
                'name' => 'imageMobile',
                'contents' => fopen($_FILES['imageMobile']['tmp_name'], 'r'),
                'filename' => $_FILES['imageMobile']['name']
            ];
        }
        // if ($this->input->post('tipe')) {
        //     $parts[] = [
        //         'name' => 'tipe',
        //         'contents' => $this->input->post('tipe'),
        //     ];
        // }
        // if ($this->input->post('kategori')) {
        //     $parts[] = [
        //         'name' => 'kategori',
        //         'contents' => $this->input->post('kategori'),
        //     ];
        // }
        // if ($this->input->post('subkategori')) {
        //     $parts[] = [
        //         'name' => 'subkategori',
        //         'contents' => $this->input->post('subkategori'),
        //     ];
        // }
        // if ($this->input->post('sub_kategori_lv2')) {
        //     $parts[] = [
        //         'name' => 'sub_kategori_lv2',
        //         'contents' => $this->input->post('sub_kategori_lv2'),
        //     ];
        // }
        $data = getservice('PUT', 'component/update/' . $this->input->post('id_manage'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function delete($id)
    {
    }
}
