<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Export extends CI_Controller

{
    // function __construct()
    // {
    //     parent::__construct();
    //     if (is_login('is_logged') != true) redirect('auth');
    // }
    function index()
    {
        $kode = "testing ajadassds";
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $kode), array())->draw();
        $image_name     =  $kode . '.jpg';
        $image_dir      = 'https://backend.urbanco.co.id/barcodeProduct/'; // 
        $image_dir      = './assets/barcodeProduct/';
        $coba = imagejpeg($image_resource, $image_dir . $image_name);
        // $parts[] = [
        //     'name' => 'kode_product',
        //     'contents' => fopen($image_dir . $image_name, 'r'),
        //     'filename' => $image_name
        // ];
        print_r($coba);
    }
    function formatUpdateStok()
    {
    }
    function getKodeMaxProduct($subkategori, $no)
    {
        $datanya = $this->getting('product/maxId?subkategori_id=' . $subkategori);
        $kodeBarang = sprintf("%05s", $datanya->jumlah + $no);
        // print_r($kodeBarang);
        return $kodeBarang;
    }
    function getKodeMaxProductParam($subkategori, $no)
    {
        $datanya = $this->getting('product/maxId?subkategori_id=' . $subkategori);
        $kodeBarang = $datanya->jumlah + $no;
        // print_r($kodeBarang);
        return $kodeBarang;
    }
    function exampleParams()
    {
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Urban')
            ->setLastModifiedBy('Urban')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Urban')
            ->setKeywords('Urban')
            ->setCategory('Urban');
        // Format of products data insert
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kode Product')
            ->setCellValue('C1', 'Promo_id')
            ->setCellValue('D1', 'Brand_id')
            ->setCellValue('E1', 'Kategori_id')
            ->setCellValue('F1', 'Subkategori_id')
            ->setCellValue('G1', 'Subkategorilv2_id')
            ->setCellValue('H1', 'Nama Artikel')
            ->setCellValue('I1', 'Harga')
            ->setCellValue('J1', 'Deskripsi')
            ->setCellValue('K1', 'Status')
            ->setCellValue('L1', 'Parameter')
            ->setCellValue('M1', 'New Arrival')
            ->setCellValue('N1', 'Lokasi');
        $spreadsheet->getActiveSheet()->setTitle('format insert product');
        foreach (range('A', 'N') as $col) {
            $spreadsheet->getSheet(0)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        $id = $this->input->get('radioId');
        if ($id == 1) {
            $kategori = $this->input->get('kategori_id');
            $dataSubkategori = $this->getting('subkategori/find?kategori_id=' . $kategori);
            $no = 2;
            $no1 = 1;
            foreach ($dataSubkategori as $key) {
                for ($i = 1; $i <= $this->input->get($key->kodeSubKategori); $i++) {
                    $spreadsheet->getSheet(0)
                        ->setCellValue('A' . $no, $no1)
                        ->setCellValue('B' . $no, $key->kodeSubKategori . '-' . $this->getKodeMaxProduct($key->kodeSubKategori, $i))
                        ->setCellValue('D' . $no, $key->kategori->departemen->brand_id)
                        ->setCellValue('E' . $no, $kategori)
                        ->setCellValue('F' . $no, $key->kodeSubKategori)
                        ->setCellValue('K' . $no, 1)
                        ->setCellValue('L' . $no, $this->getKodeMaxProductParam($key->kodeSubKategori, $i));
                    $no++;
                    $no1++;
                }
            }
        } else if ($id == 2) {
            $kategori = $this->input->get('kategori_id');
            $subkategoriId = $this->input->get('sub_kategori_id');
            $dataSubkategori = $this->getting('subkategorilv2/find?sub_kategori_id=' . $subkategoriId);
            $no = 2;
            $no1 = 1;
            foreach ($dataSubkategori as $key) {
                for ($i = 1; $i <= $this->input->get($key->kodeSubkategoriLv2); $i++) {
                    $spreadsheet->getSheet(0)
                        ->setCellValue('A' . $no, $no1)
                        ->setCellValue('B' . $no, $subkategoriId . '-' . $this->getKodeMaxProduct($subkategoriId, $no1))
                        ->setCellValue('D' . $no, $key->sub_kategori->kategori->departemen->brand_id)
                        ->setCellValue('E' . $no, $kategori)
                        ->setCellValue('F' . $no, $subkategoriId)
                        ->setCellValue('G' . $no, $key->kodeSubkategoriLv2)
                        ->setCellValue('K' . $no, 1)
                        ->setCellValue('L' . $no, $this->getKodeMaxProductParam($key->kodeSubKategori, $i));
                    $no++;
                    $no1++;
                }
            }
        }

        //data of detail product
        $spreadsheet->createSheet(1);
        $spreadsheet->setActiveSheetIndex(1)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Product_id')
            ->setCellValue('C1', 'Warna_id')
            ->setCellValue('D1', 'Ukuran_id')
            ->setCellValue('E1', 'Gambar1')
            ->setCellValue('F1', 'Gambar2')
            ->setCellValue('G1', 'Gambar3')
            ->setCellValue('H1', 'Gambar4')
            ->setCellValue('I1', 'Gambar5')
            ->setCellValue('J1', 'Gambar6')
            ->setCellValue('K1', 'Stok')
            ->setCellValue('L1', 'Detail')
            ->setCellValue('M1', 'Thumbnail')
            ->setCellValue('N1', 'Berat')
            ->setCellValue('O1', 'Barcode');
        $spreadsheet->getActiveSheet()->setTitle('Format Detail Master Product');
        foreach (range('A', 'O') as $col) {
            $spreadsheet->getSheet(1)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        //data of promo
        $spreadsheet->createSheet(2);
        $spreadsheet->setActiveSheetIndex(2)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID promo')
            ->setCellValue('C1', 'Nama Promo')
            ->setCellValue('D1', 'Promo')
            ->setCellValue('E1', 'Status');
        $spreadsheet->getActiveSheet()->setTitle('Data Promo');
        foreach (range('A', 'E') as $col) {
            $spreadsheet->getSheet(2)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        $promo_id = 2;
        $no = 1;
        foreach ($this->getting('promo') as $key) {
            $spreadsheet->getSheet(2)
                ->setCellValue('A' . $promo_id, $no++)
                ->setCellValue('B' . $promo_id, $key->id_promo)
                ->setCellValue('C' . $promo_id, $key->nama_promo)
                ->setCellValue('D' . $promo_id, $key->promo)
                ->setCellValue('E' . $promo_id, $key->status);
            $promo_id++;
        }


        //data of subkategori
        $spreadsheet->createSheet(3);
        $spreadsheet->setActiveSheetIndex(3)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Sub Kategori')
            ->setCellValue('C1', 'Nama Sub Kategori');
        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(3)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        $subkategori_id = 2;
        $no1 = 1;
        foreach ($this->getting('subkategori') as $key) {
            $spreadsheet->getSheet(3)
                ->setCellValue('A' . $subkategori_id, $no1++)
                ->setCellValue('B' . $subkategori_id, $key->id_sub_kategori)
                ->setCellValue('C' . $subkategori_id, $key->nama_sub_kategori);
            $subkategori_id++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Sub Kategori');


        //data kategori
        $spreadsheet->createSheet(4);
        $spreadsheet->setActiveSheetIndex(4)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Kategori')
            ->setCellValue('C1', 'Nama Kategori');
        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(4)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $kategori_id = 2;
        $no1 = 1;
        foreach ($this->getting('kategori') as $key) {
            $spreadsheet->getSheet(4)
                ->setCellValue('A' . $kategori_id, $no1++)
                ->setCellValue('B' . $kategori_id, $key->id_kategori)
                ->setCellValue('C' . $kategori_id, $key->nama_kategori);
            $kategori_id++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Kategori');


        //data brand
        $spreadsheet->createSheet(5);
        $spreadsheet->setActiveSheetIndex(5)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Brand')
            ->setCellValue('C1', 'Nama Brand');
        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(5)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $brand_id = 2;
        $no1 = 1;
        foreach ($this->getting('brand') as $key) {
            $spreadsheet->getSheet(5)
                ->setCellValue('A' . $brand_id, $no1++)
                ->setCellValue('B' . $brand_id, $key->id_brand)
                ->setCellValue('C' . $brand_id, $key->nama_brand);
            $brand_id++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Brand');

        //warna
        $spreadsheet->createSheet(6);
        $spreadsheet->setActiveSheetIndex(6)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Warna')
            ->setCellValue('C1', 'Nama Warna');

        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(6)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        $promo_id = 2;
        $no = 1;
        foreach ($this->getting('warna') as $key) {
            $spreadsheet->getSheet(6)
                ->setCellValue('A' . $promo_id, $no++)
                ->setCellValue('B' . $promo_id, $key->id_warna)
                ->setCellValue('C' . $promo_id, $key->nama_warna);
            $promo_id++;
            // $no++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Warna');



        //ukuran
        $spreadsheet->createSheet(7);
        $spreadsheet->setActiveSheetIndex(7)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Ukuran')
            ->setCellValue('C1', 'Ukuran');

        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(7)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $subkategori_id = 2;
        $no1 = 1;
        foreach ($this->getting('ukuran') as $key) {
            $spreadsheet->getSheet(7)
                ->setCellValue('A' . $subkategori_id, $no1++)
                ->setCellValue('B' . $subkategori_id, $key->id_ukuran)
                ->setCellValue('C' . $subkategori_id, $key->ukuran);
            $subkategori_id++;
            // $no++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Ukuran');

        $spreadsheet->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Import-produk.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
    function example()
    {
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Urban')
            ->setLastModifiedBy('Urban')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Urban')
            ->setKeywords('Urban')
            ->setCategory('Urban');
        // Format of products data insert
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kode Product')
            ->setCellValue('C1', 'Promo_id')
            ->setCellValue('D1', 'Brand_id')
            ->setCellValue('E1', 'Kategori_id')
            ->setCellValue('F1', 'Subkategori_id')
            ->setCellValue('G1', 'Subkategorilv2_id')
            ->setCellValue('H1', 'Nama Artikel')
            ->setCellValue('I1', 'Harga')
            ->setCellValue('J1', 'Deskripsi')
            ->setCellValue('K1', 'Status');
        $spreadsheet->getActiveSheet()->setTitle('format insert product');
        foreach (range('A', 'K') as $col) {
            $spreadsheet->getSheet(0)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Import-produk.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
    function example_product()
    {
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Urban')
            ->setLastModifiedBy('Urban')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Urban')
            ->setKeywords('Urban')
            ->setCategory('Urban');

        // Format of products data insert
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Product_id')
            ->setCellValue('C1', 'Warna_id')
            ->setCellValue('D1', 'Ukuran_id')
            ->setCellValue('E1', 'Gambar1')
            ->setCellValue('F1', 'Gambar2')
            ->setCellValue('G1', 'Gambar3')
            ->setCellValue('H1', 'Gambar4')
            ->setCellValue('I1', 'Gambar5')
            ->setCellValue('J1', 'Gambar6')
            ->setCellValue('K1', 'Stok')
            ->setCellValue('L1', 'Detail');

        $spreadsheet->getActiveSheet()->setTitle('format insert master product');

        foreach (range('A', 'L') as $col) {
            $spreadsheet->getSheet(0)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        //data of promo
        $spreadsheet->createSheet(1);
        $spreadsheet->setActiveSheetIndex(1)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Warna')
            ->setCellValue('C1', 'Nama Warna');


        $spreadsheet->getActiveSheet()->setTitle('Data Warna');

        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(1)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
        $promo_id = 2;
        $no = 1;
        foreach ($this->getting('warna') as $key) {
            $spreadsheet->getSheet(1)
                ->setCellValue('A' . $promo_id, $no++)
                ->setCellValue('B' . $promo_id, $key->id_warna)
                ->setCellValue('C' . $promo_id, $key->nama_warna);
            $promo_id++;
            // $no++;
        }

        //data of subkategori
        $spreadsheet->createSheet(2);
        $spreadsheet->setActiveSheetIndex(2)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Ukuran')
            ->setCellValue('C1', 'Ukuran');

        foreach (range('A', 'C') as $col) {
            $spreadsheet->getSheet(2)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $subkategori_id = 2;
        $no1 = 1;
        foreach ($this->getting('ukuran') as $key) {
            $spreadsheet->getSheet(2)
                ->setCellValue('A' . $subkategori_id, $no1++)
                ->setCellValue('B' . $subkategori_id, $key->id_ukuran)
                ->setCellValue('C' . $subkategori_id, $key->ukuran);
            $subkategori_id++;
            // $no++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Ukuran');


        $spreadsheet->createSheet(3);
        $spreadsheet->setActiveSheetIndex(3)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID Product')
            ->setCellValue('C1', 'Nama Artikel')
            ->setCellValue('D1', 'Harga');

        foreach (range('A', 'D') as $col) {
            $spreadsheet->getSheet(3)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        $subkategori_id = 2;
        $no1 = 1;
        foreach ($this->getting('product/find?status=1') as $key) {
            $spreadsheet->getSheet(3)
                ->setCellValue('A' . $subkategori_id, $no1++)
                ->setCellValue('B' . $subkategori_id, $key->id_product)
                ->setCellValue('C' . $subkategori_id, $key->nama_artikel)
                ->setCellValue('D' . $subkategori_id, $key->nama_artikel);
            $subkategori_id++;
            // $no++;
        }
        $spreadsheet->getActiveSheet()->setTitle('Data Product');



        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Master Produk.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
    function getting($endpoint = "")
    {
        $data = getservice('GET', $endpoint);
        return $data->data;
    }
    function cobain($id)
    {
        print_r($this->getting('warna/' . $id)->nama_warna);
    }
    function insertdata()
    {
        // echo json_encode("test error");

        if (!empty($_FILES['excell']['name'])) {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($_FILES['excell']['tmp_name']);
            $data = $spreadsheet->getSheet(0)
                ->toArray(null, true, true, true);

            $data2 = $spreadsheet->getSheet(1)
                ->toArray(null, true, true, true);
            $i = 1;
            // $no = 0;
            $tampung = [];
            foreach ($data as $key) {
                if ($i == 1) {
                    if (
                        $key["B"] == "Kode Product"
                        && $key["C"] == "Promo_id"
                        && $key["D"] == "Brand_id"
                        && $key["E"] == "Kategori_id"
                        && $key["F"] == "Subkategori_id"
                        && $key["G"] == "Subkategorilv2_id"
                        && $key["H"] == "Nama Artikel"
                        && $key["I"] == "Harga"
                        && $key["J"] == "Deskripsi"
                        && $key["K"] == "Status"
                        && $key["L"] == "Parameter"
                        && $key["M"] == "New Arrival"
                        && $key["N"] == "Lokasi"
                    ) {
                        $i++;
                        continue;
                    } else {
                        print_r("Error");
                        echo json_encode("test error");
                    }
                }

                array_push($tampung, [
                    'kode_product' => $key["B"],
                    'promo_id' => $key["C"],
                    'brand_id' => $key["D"],
                    'kategori_id' => $key["E"],
                    'subkategori_id' => $key["F"],
                    'subkategoriLV2_id' => $key["G"],
                    'nama_artikel' => $key["H"],
                    'harga' => $key['I'],
                    'deskripsi' => $key['J'],
                    'status' => $key["K"],
                    'countCodeProduct' => $key["L"],
                    'arrival' => $key["M"],
                    'lokasi' => $key["N"]
                ]);
            }
            $i2 = 1;
            // $no = 0;
            $tampung2 = [];
            foreach ($data2 as $key) {
                if ($i2 == 1) {
                    if (
                        $key["B"] == "Product_id"
                        && $key["C"] == "Warna_id"
                        && $key["D"] == "Ukuran_id"
                        && $key["E"] == "Gambar1"
                        && $key["F"] == "Gambar2"
                        && $key["G"] == "Gambar3"
                        && $key["H"] == "Gambar4"
                        && $key["I"] == "Gambar5"
                        && $key["J"] == "Gambar6"
                        && $key["K"] == "Stok"
                        && $key["L"] == "Detail"
                        && $key["M"] == "Thumbnail"
                        && $key["N"] == "Berat"
                        && $key["O"] == "Barcode"
                    ) {
                        $i2++;
                        continue;
                    } else {
                        print_r("Error");
                        echo json_encode("test error");
                    }
                }
                array_push($tampung2, [
                    'product_id' => $key["B"],
                    'warna_id' => $key["C"],
                    'ukuran_id' => $key["D"],
                    'images1' => $key['E'],
                    'images2' => $key['F'],
                    'images3' => $key['G'],
                    'images4' => $key['H'],
                    'images5' => $key['I'],
                    'images6' => $key['J'],
                    'stok' => $key['K'],
                    'detail' => $key["L"],
                    'thumbnail' => $key["M"],
                    'weight' => $key["N"],
                    'barcode' => $key["O"],
                    'kodeDetailProduct' => $key["B"] . '-' . $this->getting('warna/' . $key["C"])->nama_warna . '-' . $this->getting('ukuran/' . $key["D"])->ukuran
                ]);
                barcodeProduct($key["O"]);
                // $this->getting('warna/' . $id)->nama_warna
            }
            $data = getservice('POST', 'product/product_insert_bulk/', '', [
                'json' => $tampung,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            $datanya = getservice('POST', 'master_product/master_product_insert_bulk/', '', [
                'json' => $tampung2,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            echo json_encode($data);
        }
    }
    function insertdatamaster()
    {
        if (!empty($_FILES['excell']['name'])) {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($_FILES['excell']['tmp_name']);
            $data = $spreadsheet->getSheet(0)
                ->toArray(null, true, true, true);
            $i = 1;
            $no = 0;
            $tampung = [];
            foreach ($data as $key) {
                if ($i == 1) {
                    if (
                        $key["B"] == "Product_id"
                        && $key["C"] == "Warna_id"
                        && $key["D"] == "Ukuran_id"
                        && $key["E"] == "Gambar1"
                        && $key["F"] == "Gambar2"
                        && $key["G"] == "Gambar3"
                        && $key["H"] == "Gambar4"
                        && $key["I"] == "Gambar5"
                        && $key["J"] == "Gambar6"
                        && $key["K"] == "Stok"
                        && $key["L"] == "Detail"
                    ) {
                        $i++;
                        continue;
                    } else {
                        print_r("Error");
                        echo json_encode("test error");
                    }
                }
                array_push($tampung, [
                    'product_id' => $key["B"],
                    'warna_id' => $key["C"],
                    'ukuran_id' => $key["D"],
                    'images1' => $key['E'],
                    'images2' => $key['F'],
                    'images3' => $key['G'],
                    'images4' => $key['H'],
                    'images5' => $key['I'],
                    'images6' => $key['J'],
                    'stok' => $key['K'],
                    'detail' => $key["L"],
                    "kodeDetailProduct" => $key["B"]
                ]);
            }
            $data = getservice('POST', 'master_product/master_product_insert_bulk/', '', [
                'json' => $tampung,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            echo json_encode($data);
        }
    }
    function exampleLookbook()
    {
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Urban')
            ->setLastModifiedBy('Urban')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Urban')
            ->setKeywords('Urban')
            ->setCategory('Urban');
        // Format of products data insert
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Kode Product');
        $spreadsheet->getActiveSheet()->setTitle('format insert lookbook');
        foreach (range('A', 'B') as $col) {
            $spreadsheet->getSheet(0)
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Import Lookbook.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
    function pdf()
    {
        $this->load->view('export_pdf/template');
    }
    function generateCode()
    {
        $sku_number     = 'new bro';
        $id = file_exists('./assets/user/new bro.jpg');
        // echo base_url() . '/assets/user/new bro.jpg';
        print_r($id);
    }

    function pdf2($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => array(148, 210), 'orientation' => 'L']);
        $data['result'] = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
        $html = $this->load->view('export_pdf/template', $data, true);
        // $html = $this->load->view('export_pdf/templateJNTA4', $data, true);
        $nama = str_replace(" ", "_", $data['result']->nama_user);
        $file_name = $data['result']->kd_transaksi . $nama . time() . ".pdf";
        $pdfFilePath = 'assets/file/' . $file_name;
        if (!file_exists('./assets/user/' . $id . '.jpg')) {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');
            $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $id), array())->draw();
            $image_name     = $id . '.jpg';
            $image_dir      = './assets/user/'; // penyimpanan file barcode
            imagejpeg($image_resource, $image_dir . $image_name);
        }

        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, 'F');
        $path = $pdfFilePath;
        $filename = $file_name;
        $parts[] = [
            'name' => 'invoice',
            'contents' => fopen($path, 'r'),
            'filename' => $filename
        ];
        $data = getservice('PUT', 'mastertransaksi/update/', $id, [
            'multipart' => $parts,
        ]);
        redirect(base_url() . $pdfFilePath);
    }
    function pdfA6($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => array(74, 105), 'orientation' => 'L']);
        $data['result'] = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
        $html = $this->load->view('export_pdf/templatev2', $data, true);
        $nama = str_replace(" ", "_", $data['result']->nama_user);
        $file_name = $data['result']->kd_transaksi . $nama . time() . ".pdf";
        $pdfFilePath = 'assets/file/' . $file_name;
        if (!file_exists('./assets/user/' . $id . '.jpg')) {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');
            $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $id), array())->draw();
            $image_name     = $id . '.jpg';
            $image_dir      = './assets/user/'; // penyimpanan file barcode
            imagejpeg($image_resource, $image_dir . $image_name);
        }

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function printAllSticker()
    {
        // 15x10
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => array(150, 100), 'orientation' => 'L']);
        // Display at 90% zoom - note the 90 is a number not a string
        // $mpdf->SetHeader('Document Title');
        // $mpdf->shrink_tables_to_fit = 1;

        // Display two pages side by side (book style)

        foreach ($this->input->get('kode') as $id){
            $res = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
            $data['results'][] = $res;
            $nama = str_replace(" ", "_", $res->nama_user);
            $file_name = $res->kd_transaksi . $nama . time() . ".pdf";
            $pdfFilePath = 'assets/file/' . $file_name;
            if (!file_exists('./assets/user/' . $id . '.jpg')) {
                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $id), array())->draw();
                $image_name     = $id . '.jpg';
                $image_dir      = './assets/user/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir . $image_name);
            }
        }
        
        
        $html = $this->load->view('export_pdf/templateJNT', $data, true);
        // $mpdf->SetDisplayMode('fullwidth');

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function pdfA9($id)
    {
        // 15x10
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => array(150, 100), 'orientation' => 'L']);
        // Display at 90% zoom - note the 90 is a number not a string
        // $mpdf->SetHeader('Document Title');
        // $mpdf->shrink_tables_to_fit = 1;

        // Display two pages side by side (book style)
        $api = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
        $data['results'][0] = $api;
        $html = $this->load->view('export_pdf/templateJNT', $data, true);
        $nama = str_replace(" ", "_", $api->nama_user);
        $file_name = $api->kd_transaksi . $nama . time() . ".pdf";
        $pdfFilePath = 'assets/file/' . $file_name;
        if (!file_exists('./assets/user/' . $id . '.jpg')) {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');
            $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $id), array())->draw();
            $image_name     = $id . '.jpg';
            $image_dir      = './assets/user/'; // penyimpanan file barcode
            imagejpeg($image_resource, $image_dir . $image_name);
        }

        // $mpdf->SetDisplayMode('fullwidth');

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function pdfA5($id)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5', 'orientation' => 'L']);
        $data['result'] = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
        // $html = $this->load->view('export_pdf/templatev3', $data, true);
        $html = $this->load->view('export_pdf/templateJNTA5', $data, true);
        $nama = str_replace(" ", "_", $data['result']->nama_user);
        $file_name = $data['result']->kd_transaksi . $nama . time() . ".pdf";
        $pdfFilePath = 'assets/file/' . $file_name;
        if (!file_exists('./assets/user/' . $id . '.jpg')) {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');
            $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $id), array())->draw();
            $image_name     = $id . '.jpg';
            $image_dir      = './assets/user/'; // penyimpanan file barcode
            imagejpeg($image_resource, $image_dir . $image_name);
        }

        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
    function test($id){
        $data['result'] = getservice('GET', 'getTransaksi', '/' . $id)->data[0];
        print_r($data);
    }
}
