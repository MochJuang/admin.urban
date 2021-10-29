<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $data['transaksi'] = json_encode(getservice('GET', 'dashboard')->data);
        $data['kategori'] = json_encode(getservice('GET', 'dashboard/TP?brand_id=1')->data);
        // echo $data['transaksi'];
        $this->template->load('template-admin', 'content/dashboard', $data);
    }
    function cek()
    {
        print_r(getservice('GET', 'slider'));
    }
    function test()
    {
        phpinfo();
    }
    function testing()
    {
        // $param = '{"detail":[{"username":"URBANCO","api_key":"KGAI9U","orderid":"ORDERID-0001","shipper_name":"Sender Name","shipper_contact":"PENGIRIM","shipper_phone":"+628123456789","shipper_addr":"JL. Pengirim no.88, RT\/RW:001\/010, Pluit","origin_code":"JKT","receiver_name":"PENERIMA","receiver_phone":"+62812348888","receiver_addr":"Jl.Raya Bekas KM28 Kota Kabupaten Bekasi","receiver_zip":"11170","destination_code":"JKT","receiver_area":"JKT001","qty":"10","weight":"3.126111","goodsdesc":"TESTING","insurance":"500","servicetype":"6","orderdate":"2019-09-25 09:30:00","item_name":"Smartphone dan HP","cod":"","sendstarttime":"","sendendtime":"","expresstype":"1","goodsvalue":"1000"}]}';
        $param = '{"detail":[{"username":"URBANCO","api_key":"KGAI9U","orderid":"ORDERID-0001","shipper_name":"Sender Name","shipper_contact":"PENGIRIM","shipper_phone":"+628123456789","shipper_addr":"JL. Pengirim no.88, RT\/RW:001\/010, Pluit","origin_code":"JKT","receiver_name":"PENERIMA","receiver_phone":"+62812348888","receiver_addr":"Jl.Raya Bekas KM28 Kota Kabupaten Bekasi","receiver_zip":"11170","destination_code":"JKT","receiver_area":"JKT001","qty":"10","weight":"3.126111","goodsdesc":"TESTING","insurance":"500","servicetype":"6","orderdate":"2019-09-25 09:30:00","item_name":"Smartphone dan HP","cod":"","sendstarttime":"","sendendtime":"","expresstype":"1","goodsvalue":"1000"}]}';

        $key = 'AKe62df84bJ3d8e4b1hea2R45j11klsb';


        $nah = $this->input->post('data_param') . 'AKe62df84bJ3d8e4b1hea2R45j11klsb';
        // echo md5($nah);
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo base64_encode(md5($nah));
        // echo json_encode(["data" => base64_encode(md5($nah))]);
        // echo json_encode(["data" => base64_encode((md5(urldecode(file_get_contents("php://input")) . "AKe62df84bJ3d8e4b1hea2R45j11klsb")))]);
        echo json_encode(["data" => $this->input->post('data_param')]);
    }
}
