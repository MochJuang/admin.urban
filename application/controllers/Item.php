<?php
class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        // echo $id;
        $data['kode_product'] = $this->input->get('id_product') ? $this->input->get('id_product') : "";
        $data['title'] = "List Item Product";
        $data['desc'] = "List Item";
        $data['breadcumb'] = breadcumb(['List Item Produk' => 'item/index/' . $this->uri->segment('3')]);
        $this->template->load('template-admin', 'content/product/main', $data);
    }
    
    function index2($id)
    {
        // echo $id;
        $dataBrand = getservice('GET', 'brand/' . $id);
        // print_r($dataBrand->success);
        if ($dataBrand->success && $dataBrand->data != null) {
            $data['kode_product'] = $this->input->get('id_product') ? $this->input->get('id_product') : "";
            $data['brand'] = $dataBrand->data;
            $data['title'] = "List Item Product";
            $data['desc'] = "List Item Brand " . ucwords(strtolower($dataBrand->data->nama_brand));
            $data['breadcumb'] = breadcumb(['List Item Produk' => 'item/index/']);
            $this->template->load('template-admin', 'content/product/main2', $data);
        }

        // $data['kode_product'] = $this->input->get('id_product') ? $this->input->get('id_product') : "";
        // $data['title'] = "List Item Product";
        // $data['desc'] = "List Item";
        // $data['breadcumb'] = breadcumb(['List Item Produk' => 'item/index/' . $this->uri->segment('3')]);
        // $this->template->load('template-admin', 'content/product/main2', $data);
    }
    function search()
    {
        $data = getservice('GET', 'product/search/', $this->input->get('search'));
        echo json_encode($data->data);
    }
    function get($id = null)
    {
        $subkategori = $this->input->get('subKategori') ? "&subkategori_id=" . $this->input->get('subKategori') : '';
        $subkategoriLv2 = $this->input->get('subKategoriLv2') ? "&subkategorilv2_id=" . $this->input->get('subKategoriLv2') : '';
        $kode_product = $this->input->get('kode_product') ? "&kode_product=" . $this->input->get('kode_product') : "";
        $data = getservice('GET', 'product', '/find?kategori=' . $id . $kode_product . $subkategori . $subkategoriLv2);
        echo json_encode($data->data);
    }
    function get2()
    {
        // $kategori = $this->input->get('kategori_id') ? "&kategori_id=" . $this->input->get('kategori_id') : '';
        $subkategori = $this->input->get('subKategori') ? "&subkategori_id=" . $this->input->get('subKategori') : '';
        $subKategoriLv2 = $this->input->get('subKategoriLv2') ? "&subkategorilv2_id=" . $this->input->get('subKategoriLv2') : '';
        // $kode_product = $this->input->get('kode_product') ? "&kode_product=" . $this->input->get('kode_product') : "";
        // if ($this->input->get('kategori_id')) {
        # code...
        $data = getservice('GET', 'product', '/find?kategori=' . $this->input->get('kategori_id') . $subkategori.$subKategoriLv2);
        // } else {
        // $data = getservice('GET', 'product');
        // }

        echo json_encode($data->data);
    }
    function updatePromo($id)
    {
        $data = getservice('GET', 'product', '/find?kategori=' . $id)->data;
        $kumpulanData = [];
        foreach ($data as $key) {
            if ($this->input->post($key->kode_product)) {
                array_push($kumpulanData, ['promo_id'=> $this->input->post($key->kode_product) == '9999999' ? 0 : $this->input->post($key->kode_product),'kode_product'=>$key->kode_product]);
            }
        }
        $dataMasuk = getservice('POST', 'product/updatePromo/', '', [
            'json' => $kumpulanData,
            'headers' => ['Content-Type' => 'application/json']
        ]);
        echo json_encode($dataMasuk);
        // echo json_encode($kumpulanData);
        // echo json_encode([
        //     'name' => 'promo_id',
        //     'contents' => $this->input->post($key->kode_product) ? $this->input->post($key->kode_product) : null,
        // ]);
    }
    function updatePromo2($id)
    {
        $data = getservice('GET', 'product', '/find?kategori=' . $id)->data;
        $mapData = [];
        foreach ($data as $key) {
            $parts = [
                [
                    'name' => 'promo_id',
                    'contents' => $this->input->post($key->kode_product),
                ]
            ];
            $datas = getservice('PUT', 'product/update/', $key->kode_product, [
                'multipart' => $parts,
            ]);
        }

        echo json_encode($datas);
    }
    function adds()
    {
        echo json_encode($this->input->post());
    }
    function add()
    {
        $parts = [
            [
                'name' => 'nama_artikel',
                'contents' => $this->input->post('nama_artikel'),
            ],
            [
                'name' => 'harga',
                'contents' => $this->input->post('harga'),
            ],
            [
                'name' => 'brand_id',
                'contents' => $this->input->post('brand_id'),
            ],
            [
                'name' => 'kode_product',
                'contents' => $this->input->post('kode_product'),
            ],
            [
                'name' => 'kategori_id',
                'contents' => $this->input->post('kategori_id'),
            ], [
                'name' => 'subkategorilv2_id',
                'contents' => $this->input->post('subkategorilv2_id'),
            ],
            [
                'name' => 'subkategori_id',
                'contents' => $this->input->post('subkategori_id'),
            ],
            [
                'name' => 'deskripsi',
                'contents' => $this->input->post('deskripsi'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'countCodeProduct',
                'contents' => $this->input->post('countCodeProduct'),
            ],
            [
                'name' => 'arrival',
                'contents' => $this->input->post('arrival'),
            ],
            [
                'name' => 'lokasi',
                'contents' => $this->input->post('lokasi'),
            ]
        ];
        if ($this->input->post('promo_id')) {
            array_push($parts, [
                'name' => 'promo_id',
                'contents' => $this->input->post('promo_id') ? $this->input->post('promo_id') : null,
            ]);
        }
        $warna = explode(',', $this->input->post('warna_id'));
        $ukuran = explode(',', $this->input->post('ukuran_id'));

        // if ($_FILES['thumbnail']['name']) {
        //     uploadImage($_FILES['thumbnail']['name'], $_FILES['thumbnail']['tmp_name']);
        //     // echo json_encode($data);
        // }
        $dataMaster = [];
        foreach ($warna as $key) {
            foreach ($ukuran as $k) {
                $dataMastering = getservice('GET', 'master_product', '/find?product_id=' . $this->input->post('kode_product') . '&warna_id=' . $key . '&ukuran_id=' . $k);
                if ($dataMastering->total_data == 0) {
                    array_push($dataMaster, [
                        'kodeDetailProduct' => $this->input->post('kode_product') . '-' . $this->getting('warna/' . $key)->nama_warna . '-' . $this->getting('ukuran/' . $k)->ukuran,
                        'warna_id' => $key,
                        'ukuran_id' => $k,
                        'product_id' => $this->input->post('kode_product'),
                        // 'thumbnail' => $_FILES['thumbnail']['name'],
                        'weight' => $this->input->post('weight')
                    ]);
                }
            }
        }
        if (count($dataMaster) > 0) {
            getservice('POST', 'master_product/master_product_insert_bulk/', '', [
                'json' => $dataMaster,
                'headers' => ['Content-Type' => 'application/json']
            ]);
        }
        $data = getservice('POST', 'product/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function getting($endpoint = "")
    {
        $data = getservice('GET', $endpoint);
        return $data->data;
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_artikel',
                'contents' => $this->input->post('nama_artikel'),
            ],
            [
                'name' => 'brand_id',
                'contents' => $this->input->post('brand_id'),
            ],
            [
                'name' => 'kategori_id',
                'contents' => $this->input->post('kategori_id'),
            ],
            [
                'name' => 'harga',
                'contents' => $this->input->post('harga'),
            ],
             [
                'name' => 'subkategorilv2_id',
                'contents' => $this->input->post('subkategorilv2_id'),
            ],
            [
                'name' => 'subkategori_id',
                'contents' => $this->input->post('subkategori_id'),
            ],
            [
                'name' => 'deskripsi',
                'contents' => $this->input->post('deskripsi'),
            ],
            [
                'name' => 'status',
                'contents' => $this->input->post('status'),
            ],
            [
                'name' => 'arrival',
                'contents' => $this->input->post('arrival'),
            ],
            [
                'name' => 'lokasi',
                'contents' => $this->input->post('lokasi'),
            ],
            [
                'name' => 'promo_id',
                'contents' => $this->input->post('promo_id') ? $this->input->post('promo_id') : null,
            ]
        ];
        // if ($this->input->post('promo_id')) {
        //     array_push($parts, [
        //         'name' => 'promo_id',
        //         'contents' => $this->input->post('promo_id') ? $this->input->post('promo_id') : null,
        //     ]);
        // }
        $warna = explode(',', $this->input->post('warna_id'));
        $ukuran = explode(',', $this->input->post('ukuran_id'));
        $dataMaster = [];

        $dataProductNowarna = getservice('GET', 'master_product', '/findProduct?product_id=' . $this->input->post('id'));
        $dataProductNoUkuran = getservice('GET', 'master_product', '/findProductWithSize?product_id=' . $this->input->post('id'));
        if ($dataProductNowarna->total_data > 0) {
            foreach ($dataProductNowarna->data as $key) {
                if (in_array($key->warna_id, $warna) || in_array($key->warna_id, $warna) != '') {
                    // next();
                } else {
                    getservice('DELETE', 'master_product', "/deleteProduct/" . $this->input->post('id') . "/" . $key->warna_id);
                }
            }
        }
        if ($dataProductNoUkuran->total_data > 0) {
            foreach ($dataProductNoUkuran->data as $key) {
                if (in_array($key->ukuran_id, $ukuran) || in_array($key->ukuran_id, $ukuran) != '') {
                    // next();
                } else {
                    getservice('DELETE', 'master_product', "/deleteProductSize/" . $this->input->post('id') . "/" . $key->ukuran_id);
                }
            }
        }

        foreach ($warna as $key) {
            foreach ($ukuran as $k) {
                $dataMastering = getservice('GET', 'master_product', '/find?product_id=' . $this->input->post('id') . '&warna_id=' . $key . '&ukuran_id=' . $k);
                if ($dataMastering->total_data == 0) {
                    $getImageSize = getservice('GET', 'master_product', '/findProductWithColorExistImage?product_id=' . $this->input->post('id') . '&warna_id=' . $key);
                    if ($getImageSize->total_data > 0) {
                        $getImageDataSize = $getImageSize->data[0];
                        array_push($dataMaster, [
                            'kodeDetailProduct' => $this->input->post('id') . '-' . $this->getting('warna/' . $key)->nama_warna . '-' . $this->getting('ukuran/' . $k)->ukuran,
                            'warna_id' => $key,
                            'ukuran_id' => $k,
                            'product_id' => $this->input->post('id'),
                            'weight' => $this->input->post('weight'),
                            'images1' => $getImageDataSize->images1,
                            'images2' => $getImageDataSize->images2,
                            'images3' => $getImageDataSize->images3,
                            'images4' => $getImageDataSize->images4,
                            'images5' => $getImageDataSize->images5,
                        ]);
                    } else {
                        array_push($dataMaster, [
                            'kodeDetailProduct' => $this->input->post('id') . '-' . $this->getting('warna/' . $key)->nama_warna . '-' . $this->getting('ukuran/' . $k)->ukuran,
                            'warna_id' => $key,
                            'ukuran_id' => $k,
                            'product_id' => $this->input->post('id'),
                            'weight' => $this->input->post('weight')
                        ]);    
                    }
                    
                    
                }
            }
        }
        if (count($dataMaster) > 0) {
            getservice('POST', 'master_product/master_product_insert_bulk/', '', [
                'json' => $dataMaster,
                'headers' => ['Content-Type' => 'application/json']
            ]);
        }
        $parts2 = [];


        if ($this->input->post('weight')) {
            array_push($parts2, [
                'name' => 'weight',
                'contents' => $this->input->post('weight'),
            ]);
        }
     
        if ($this->input->post('weight')) {

            getservice('PUT', 'master_product/updateMaster/', $this->input->post('id'), [
                'multipart' => $parts2,
            ]);
        }

        $data = getservice('PUT', 'product/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function testingData(){
        $getImageSize = getservice('GET', 'master_product', '/findProductWithColorExistImage?product_id=BRG002-004-0005&warna_id=1');
        print_r($getImageSize->data[0]->images1);
    }
    function activated()
    {
        $id_promo = $this->input->post('id_product');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'product/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function arrivalUpdate()
    {
        $id_promo = $this->input->post('id_product');
        $status = $this->input->post('status') == 1 ? 0 : 1;

        $parts = [
            [
                'name' => 'arrival',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'product/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function bestUpdate(){
        $id_promo = $this->input->post('id_product');
        $status = $this->input->post('status') == 1 ? 0 : 1;

        $parts = [
            [
                'name' => 'best',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'product/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
