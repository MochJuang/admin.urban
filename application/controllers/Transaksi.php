<?php

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        // print_r($id);
        $data['title'] = "List All Transaksi";
        $data['desc'] = "List Transaksi";
        $data['breadcumb'] = breadcumb(['transaksi' => 'transaksi']);

        $this->template->load('template-admin', 'content/transaksi/main', $data);
    }
    public function getTanggal()
    {
        $data = getservice('GET', 'mastertransaksi/getTanggal');
        echo json_encode($data->data);
    }
    public function countingNotif()
    {
        $data = getservice('GET', 'getTransaksi/count');
        echo json_encode($data->data);
    }
    public function get()
    {
        $statusTransaksi = $this->input->get('transaksiStatus');
        $search = '';
        // $search = $this->input->get('search') ? '?searchData=' . $this->input->get('search') : null;
        
        $startDate = $this->input->get('startDate') ? $this->input->get('startDate') : null;
        $lastDate = $this->input->get('lastDate') ? $this->input->get('lastDate') : null;
        // print_r($_GET);
        // $statusTransaksi = $statusTransaksi ? '?status=' . $statusTransaksi : null;
        $filter = '?status='.$statusTransaksi;

        if(($startDate == null && $lastDate == null) && in_array($statusTransaksi, ['5','6','7','9']) )
        {
            $filter .= '&startDate='.date('Y-m-01').'&lastDate='.date('Y-m-t');
        }else{
            if($startDate !== null && $lastDate !== null){
                $filter .= '&startDate='.$startDate.'&lastDate='.$lastDate;
            }
        }
        // if ($statusTransaksi) {
        //     if ($this->input->get('startDate')) {
        //         $filter .= $statusTransaksi . '&startDate=' . $this->input->get('startDate');
        //     } else {
        //         $filter .= $statusTransaksi;
        //     }
        //     if ($this->input->get('lastDate')) {
        //         $filter .= $lastDate;
        //     }
        // } else {
        //     $filter .= '?startDate=' . $this->input->get('startDate');
        //     if ($this->input->get('lastDate')) {
        //         $filter .= $lastDate;
        //     }
        // }
        // print_r($filter);
        $data = getservice('GET', 'getTransaksi' . $filter);
        echo json_encode($data->data);
    }
    public function getDetail()
    {
        $data = getservice('GET', 'getTransaksi/detail');
        echo json_encode($data->data);
    }
    public function detailTransaksi()
    {
        $datas = getservice('GET', 'getTransaksi/detail');
        $countCode = getservice('GET', 'getTransaksi/countKode');
        $data['title'] = "Detail Transaksi";
        $data['desc'] = "Detail Transaksi";
        $data['breadcumb'] = breadcumb(['List Transaksi' => 'transaksi', 'Detail Transaksi' => '#']);
        $data['data'] = $datas->data;
        $data['countCode'] = $countCode->data;
        $this->template->load('template-admin', 'content/transaksi/detailTransaksi', $data);
    }
    public function detail($kode)
    {
        $data['title'] = "Detail Transaksi";
        $data['desc'] = "Detail Transaksi";
        $data['breadcumb'] = breadcumb(['List Transaksi' => 'transaksi', 'Detail Transaksi' => '#']);
        $data['result'] = getservice('GET', 'getTransaksi', '/' . $kode)->data[0];
        // print_r($data['result']);
        if (!file_exists('./assets/user/' . $kode . '.jpg')) {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');
            $image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $kode), array())->draw();
            $image_name     = $kode . '.jpg';
            $image_dir      = './assets/user/'; // penyimpanan file barcode
            imagejpeg($image_resource, $image_dir . $image_name);
        }
        $this->template->load('template-admin', 'content/transaksi/detail', $data);
    }
    function updateStatus()
    {
        $parts = [
            [
                'name' => 'status',
                'contents' => $this->input->get('status'),
            ]
        ];
        $data = getservice('PUT', 'mastertransaksi/update/', $this->input->get('kd_transaksi'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
        // echo json_encode(['success' => true, 'status' => $this->input->get('status')]);
    }
    public function terbaru()
    {
        $data['title'] = "Data Transaksi";
        $data['breadcumb'] = breadcumb(['List Transaksi' => 'transaksi']);
        $this->template->load('template-admin', 'content/transaksi/terbaru', $data);
    }
    public function cekpesanan()
    {
        $data['title'] = "Cek Transaksi";
        $data['breadcumb'] = breadcumb(['List Transaksi' => 'transaksi']);
        $this->template->load('template-admin', 'content/transaksi/cekpesanan', $data);
    }
}

