<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Lookbook extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Look book";
        $data['desc'] = "List Look book";
        $data['breadcumb'] = breadcumb(['Look Book' => 'lookbook']);
        $this->template->load('template-admin', 'content/lookbook/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'lookbook');
        echo json_encode($data->data);
    }
    public function detail($id)
    {
        $data['id_product'] = $id;
        $data['breadcumb'] = breadcumb(['List Look Book' => 'lookbook/', 'Detail Gambar Lookbook' => '#']);
        $this->template->load('template-admin', 'content/lookbook/detail', $data);
    }
    function addNew()
    {
        $parts = [
            [
                'name' => 'kode_lookbook',
                'contents' => $this->input->post('kode_lookbook'),
            ],
            [
                'name' => 'nama_lookbook',
                'contents' => $this->input->post('nama_lookbook'),
            ],
            [
                'name' => 'status',
                'contents' => 1,
            ]
        ];
        $path = $_FILES['thumbnail']['tmp_name'];
        $filename = $_FILES['thumbnail']['name'];
        if ($_FILES['thumbnail']['name']) {
            $parts[] = [
                'name' => 'thumbnail',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        for ($i = 1; $i < 7; $i++) {
            if (isset($_FILES['gambar' . $i]['name'])) {
                array_push($parts, [
                    'name' => 'gambar' . $i,
                    'contents' => fopen($_FILES['gambar' . $i]['tmp_name'], 'r'),
                    'filename' => $_FILES['gambar' . $i]['name']
                ]);
            }
        }
        $dataInsert = getservice('POST', 'lookbook/insert/', '', [
            'multipart' => $parts,
        ]);

        if ($dataInsert) {
            if (!empty($_FILES['excell']['name'])) {
                $reader = IOFactory::createReader('Xlsx');
                $reader->setReadDataOnly(TRUE);
                $spreadsheet = $reader->load($_FILES['excell']['tmp_name']);
                $data = $spreadsheet->getSheet(0)
                    ->toArray(null, true, true, true);
                $i = 1;
                $tampung = [];
                foreach ($data as $key) {
                    if ($i == 1) {
                        if (
                            $key["B"] == "Kode Product"
                        ) {
                            $i++;
                            continue;
                        } else {
                            print_r("Error");
                            echo json_encode("test error");
                        }
                    }
                    // if ($i != 1) {
                    # code...
                    array_push($tampung, [
                        'kode_product' => $key["B"],
                        'kode_lookbook' => $this->input->post('kode_lookbook')
                        // 'kode_lookbook' => 'LB007'
                    ]);
                    // }
                }
                $data = getservice('POST', 'lookbook/insertExcell/', '', [
                    'json' => $tampung,
                    'headers' => ['Content-Type' => 'application/json']
                ]);
                echo json_encode(['success' => true]);
            }
        } else {
            echo json_encode(['success' => true]);
        }
    }
    function add()
    {
        $parts = [
            [
                'name' => 'product_id',
                'contents' => $this->input->post('product_id'),
            ],
            [
                'name' => 'keterangan',
                'contents' => $this->input->post('keterangan'),
            ]
        ];
        for ($i = 1; $i < 7; $i++) {
            if (isset($_FILES['gambar' . $i]['name'])) {
                array_push($parts, [
                    'name' => 'gambar' . $i,
                    'contents' => fopen($_FILES['gambar' . $i]['tmp_name'], 'r'),
                    'filename' => $_FILES['gambar' . $i]['name']
                ]);
            }
        }
        $data = getservice('POST', 'lookbook/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'nama_lookbook',
                'contents' => $this->input->post('nama_lookbook'),
            ]
        ];
        $path = $_FILES['thumbnail']['tmp_name'];
        $filename = $_FILES['thumbnail']['name'];
        if ($_FILES['thumbnail']['name']) {
            $parts[] = [
                'name' => 'thumbnail',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'lookbook/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function detailProduct($kode)
    {
        $data['kode_product'] = $kode;
        $data['title'] = "List Product Lookbook";
        $data['desc'] = "List Product Lookbook";
        // $data['breadcumb'] = breadcumb(['Look Book' => 'lookbook']);
        $data['breadcumb'] = breadcumb(['List Product LookBook' => 'lookbook/', 'Detail Product Lookbook' => '#']);
        $this->template->load('template-admin', 'content/lookbook/detailproduct', $data);
    }
    function getProduct()
    {
        $data = getservice('GET', 'lookbook/getProductLookbook/', '?kode_lookbook=' . $this->input->get('kode_lookbook'));
        echo json_encode($data->data);
    }
}
