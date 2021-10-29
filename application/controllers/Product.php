<?php
class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index2()
    {
        $data['title'] = "List Master Product";
        $data['desc'] = "List Master Product";
        $data['breadcumb'] = breadcumb([
            'List Item Produk' => 'item/index/' . $this->uri->segment('3'),
            'List Produk' => 'product/index/' . $this->uri->segment('4')
        ]);
        $this->template->load('template-admin', 'content/product/detail', $data);
    }
    function index()
    {
        $data['title'] = "List Master Product";
        $data['desc'] = "List Master Product";
        $data['breadcumb'] = breadcumb([
            'List Item Produk' => 'item/index/' . $this->uri->segment('3'),
            'List Produk' => 'product/index/' . $this->uri->segment('4')
        ]);
        $this->template->load('template-admin', 'content/product/detail2', $data);
    }
    function get($id = null)
    {
        $data = getservice('GET', 'master_product/', 'findProduct?product_id=' . $id);
        echo json_encode($data->data);
    }
    public function detail($subkategori, $idproduct, $id)
    {
        $data['id_product'] = $id;
        $data['kode_prod'] = $idproduct;
        $data['breadcumb'] = breadcumb(['List Produk' => 'product/' . $subkategori . '/' . $idproduct, 'Detail Gambar Produk' => '#']);
        $this->template->load('template-admin', 'content/product/detailgambar', $data);
    }
    public function generateBarcodeProduct(){
        // echo json_encode(barcodeProduct($this->input->post('barcode'),'barcode'));
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $this->input->post('barcode')), array())->draw();
        $image_name     = $this->input->post('barcode') . '.jpg';
        $image_dir      = './assets/user/'; // penyimpanan file barcode
        $images = imagejpeg($image_resource, $image_dir . $image_name);
        echo json_encode($images);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'kategori_id',
                'contents' => $this->input->post('kategori_id'),
            ],
            [
                'name' => 'product_id',
                'contents' => $this->input->post('product_id'),
            ],
            [
                'name' => 'brand_id',
                'contents' => $this->input->post('brand_id'),
            ],
            [
                'name' => 'warna_id',
                'contents' => $this->input->post('warna_id'),
            ],
            [
                'name' => 'ukuran_id',
                'contents' => $this->input->post('ukuran_id'),
            ],
            [
                'name' => 'stok',
                'contents' => $this->input->post('stok'),
            ],
            [
                'name' => 'detail',
                'contents' => $this->input->post('detail'),
            ],
            [
                'name' => 'kodeDetailProduct',
                'contents' => $this->input->post('kodeDetailProduct'),
            ],
            [
                'name' => 'barcode',
                'contents' => $this->input->post('barcode'),
            ]
        ];
        barcodeProduct($this->input->post('barcode'));
        if (!$_FILES['images1']['name']) {
            $path = $_FILES['thumbnail']['tmp_name'];
            $filename = $_FILES['thumbnail']['name'];
            if ($_FILES['thumbnail']['name']) {
                $parts[] = [
                    'name' => 'thumbnail',
                    'contents' => fopen($path, 'r'),
                    'filename' => $filename
                ];
            }
        }

        if (!$_FILES['thumbnail']['tmp_name']) {
            for ($i = 1; $i < 7; $i++) {
                if (isset($_FILES['images' . $i]['name'])) {
                    array_push($parts, [
                        'name' => 'images' . $i,
                        'contents' => fopen($_FILES['images' . $i]['tmp_name'], 'r'),
                        'filename' => $_FILES['images' . $i]['name']
                    ]);
                }
            }
        }

        $data = getservice('POST', 'master_product/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function editBarcodeWarna(){
        $data = getservice('POST', 'master_product/updateWarnaBarcode/', '', [
            'json' => json_decode($this->input->post('dataProduct')),
            'headers' => ['Content-Type' => 'application/json']
        ]);
        // echo json_encode(json_decode($this->input->post('dataProduct')));
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'id_warna',
                'contents' => $this->input->post('id_warna'),
            ],
            // [
            //     'name' => 'weight',
            //     'contents' => $this->input->post('weight'),
            // ],
            // [
            //     'name' => 'barcode',
            //     'contents' => $this->input->post('barcode'),
            // ]
        ];

        if (!$_FILES['images1']['name']) {
            $path = $_FILES['thumbnail']['tmp_name'];
            $filename = $_FILES['thumbnail']['name'];
            if ($_FILES['thumbnail']['name']) {
                $parts[] = [
                    'name' => 'thumbnail',
                    'contents' => fopen($path, 'r'),
                    'filename' => $filename
                ];
            }
        }

        if (!$_FILES['thumbnail']['tmp_name']) {
            for ($i = 1; $i < 7; $i++) {
                if (isset($_FILES['images' . $i]['name'])) {
                    array_push($parts, [
                        'name' => 'images' . $i,
                        'contents' => fopen($_FILES['images' . $i]['tmp_name'], 'r'),
                        'filename' => $_FILES['images' . $i]['name']
                    ]);
                }
            }
        }

        $data = getservice('PUT', 'master_product/updateImage/' . $this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function add_gambar()
    {
        $id = $this->input->post('id');
        $cek = getservice('GET', 'master_product/' . $id)->data;
        $datas = [
            1 => $cek->images1,
            2 => $cek->images2,
            3 => $cek->images3,
            4 => $cek->images4,
            5 => $cek->images5,
            6 => $cek->images6
        ];
        $parts = [];
        $b = [];
        foreach ($datas as $a => $value) {
            if (!$value) {
                $b += [$a];
            }
        }
        if ($_FILES['images']['name']) {
            $parts[] = [
                'name' => 'images' . $b[0],
                'contents' => fopen($_FILES['images']['tmp_name'], 'r'),
                'filename' => $_FILES['images']['name']
            ];
            $data = getservice('PUT', 'master_product/update/' . $this->input->post('id'), '', [
                'multipart' => $parts,
            ]);
            echo json_encode($data);
        }
    }
    function edit_gambar()
    {
        $id = $this->input->post('id');
        if ($_FILES['images']['name']) {
            $parts[] = [
                'name' => $this->input->post('field'),
                'contents' => fopen($_FILES['images']['tmp_name'], 'r'),
                'filename' => $_FILES['images']['name']
            ];
        }
        $data = getservice('PUT', 'master_product/update/' . $this->input->post('id'), '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
