<?php

class GenerateBarcode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['title'] = "List Faq";
        $data['desc'] = "List Faq";
        $data['breadcumb'] = breadcumb(['List Faq' => 'faq']);
        $this->template->load('template-admin', 'content/faq/main', $data);
    }
    public function barcodeProduct() {
            // $this->load->library('zend');
            // $this->zend->load('Zend/Barcode');
            // $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => 'xyzsahdkasj'), array())->draw();
            // $image_name     =  'xyzsahdkasjsssa.jpg';
            // $image_dir      = 'http://36.91.140.211:3000/barcodeProduct/'; // 
            // $image_dir      = './assets/user/';
            // $coba= imagejpeg($image_resource, $image_dir . $image_name);
            
            //  $parts[] = [
            // 'name' => 'kode_product',
            // 'contents' => fopen($image_dir.$image_name, 'r'),
            // 'filename' => $image_name
            // ];
            // $data = getservice('POST', 'product/insertBarcode/', '', [
            // 'multipart' => $parts,
            // ]);
            // print_r($data->message);
            $data = barcodeProduct('opsahsdasjd');
            echo $data;
    }
    public function barcodeTransaksi() {
    
    }
  
}
