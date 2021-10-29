<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Import extends CI_Controller

{
    function transaksiData()
    {
        if (!empty($_FILES['excell']['name'])) {
            $reader = IOFactory::createReader('Xlsx');
            $reader->setReadDataOnly(TRUE);
            $spreadsheet = $reader->load($_FILES['excell']['tmp_name']);
            $data = $spreadsheet->getSheet(0)
                ->toArray(null, true, true, true);
            
            $i = 1;
            // $no = 0;
            $tampung = [];
            foreach ($data as $key) {
                if ($i == 1) {
                    if (
                        $key["D"] == "Order"
                        && $key["N"] == "Merchant Has"
                    ) {
                        $i++;
                        continue;
                    } else {
                        print_r("Error");
                        echo json_encode("test error");
                    }
                }
                array_push($tampung, [
                    'kd_transaksi' => $key["D"],
                    'merchant' => $key["N"],
                    'status' => 11,
                    'kode_payout' => $this->input->post('payout')
                ]);
            }
         
            $data = getservice('POST', 'payout/transaksi/', '', [
                'json' => $tampung,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            echo json_encode($data);
        }
    }
    function gambar(){
        // echo json_encode($this->input->get());
        if ($_FILES['upload']['name']) {
            $data = uploadImage($_FILES['upload']['name'], $_FILES['upload']['tmp_name']);
            // echo json_encode($data);
            $function_number = $this->input->get('CKEditorFuncNum');
            $url = 'https://backend.urbanco.co.id/uploads/user_photo/' . $_FILES['upload']['name'];
            $message = 'Berhasil';
            // if ($data) {
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('$function_number', '$url', '$message');</script>";
            // } else {
            //     # code...
            // }
            
        }
    }
}