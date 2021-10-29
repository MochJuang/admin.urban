<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('return_json')) {
    function return_json($data = NULL, $http_code = 200, $exit = true)
    {
        $output = json_encode($data, JSON_UNESCAPED_UNICODE);
        set_status_header($http_code);
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Length: ' . strlen($output));
        echo $output;
        if ($exit) {
            exit;
        }
    }
}
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
function tanggal_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}
function check_file_exist($url)
{
    $handle = @fopen($url, 'r');
    if (!$handle) {
        return false;
    } else {
        return true;
    }
}
function uploadImage($filename, $path)
{
    $parts = [];
    $parts[] = [
        'name' => 'thumbnail',
        'contents' => fopen($path, 'r'),
        'filename' => $filename
    ];
    $data = getservice('POST', 'master_product/insertThumbnail/', '', [
        'multipart' => $parts,
    ]);
    if ($data->message == 'Success') {
        return true;
    } else {
        return false;
    }
    return $parts;
}
// function changeCaracter($caracter)
// {

// }
function barcodeProduct($kode)
{
    $ci = &get_instance();
    $ci->load->library('zend');
    $ci->zend->load('Zend/Barcode');

    if (check_file_exist('https://backend.urbanco.co.id/barcodeProduct/' . $kode)) {
        return true;
    } else {
        $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $kode), array())->draw();
        $image_name     =  $kode . '.jpg';
        //$image_dir      = 'https://backend.urbanco.co.id/barcodeProduct/'; // 
        $image_dir      = './assets/barcodeProduct/';
        $coba = imagejpeg($image_resource, $image_dir . $image_name);
        $parts[] = [
            'name' => 'kode_product',
            'contents' => fopen($image_dir . $image_name, 'r'),
            'filename' => $image_name
        ];
        $data = getservice('POST', 'product/insertBarcode/', '', [
            'multipart' => $parts,
        ]);
        if ($data->message == 'Success') {
            return true;
        } else {
            return false;
        }
    }
    // print_r($data->message);
}
function getBarcodeReturn($kode)
{
    $ci = &get_instance();
    if (check_file_exist('http://36.91.140.211:3000/barcodeProduct/' . $kode . '.jpg')) {
        return 'http://36.91.140.211:3000/barcodeProduct/' . $kode . '.jpg';
    } else {
        $getReturn = barcodeProduct($kode);
        if ($getReturn) {
            return 'http://36.91.140.211:3000/barcodeProduct/' . $kode . '.jpg';
        } else {
            return false;
        }
    }
}
