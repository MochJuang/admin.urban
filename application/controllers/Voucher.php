<?php
class Voucher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $data['title'] = "List Voucher Product";
        $data['desc'] = "List Voucher";
        $word = array_merge(range('1', '9'), range('a', 'z'));
        $acak = shuffle($word);
        $str  = substr(implode($word), 0, 6);
        $data['kode_voucher'] = "VCR" . strtoupper($str);
        $data['breadcumb'] = breadcumb(['List Voucher' => 'voucher']);
        $this->template->load('template-admin', 'content/voucher/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'voucher/getVoucher');
        echo json_encode($data->data);
    }
    function add()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];
        $parts = [
            [
                'name' => 'kode',
                'contents' => $this->input->post('kode'),
            ],
            [
                'name' => 'nama_voucher',
                'contents' => $this->input->post('nama_voucher'),
            ],
            [
                'name' => 'besaran',
                'contents' => $this->input->post('besaran'),
            ],
            [
                'name' => 'jenis_voucher',
                'contents' => $this->input->post('jenis'),
            ],
            [
                'name' => 'tipe',
                'contents' => 'umum',
            ],
            [
                'name' => 'jumlah',
                'contents' => $this->input->post('jumlah') ?$this->input->post('jumlah') : null ,
            ],
            [
                'name' => 'status_voucher',
                'contents' => $this->input->post('status_voucher'),
            ],
            [
                'name' => 'keterangan_voucher',
                'contents' => $this->input->post('keterangan_voucher'),
            ],
            [
                'name' => 'pemakaian',
                'contents' => $this->input->post('jumlah_penggunaan'),
            ],
            [
                'name' => 'max_pem',
                'contents' => $this->input->post('max_pem'),
            ],
            [
                'name' => 'masa_awal',
                'contents' => $this->input->post('masa_awal'),
            ],
            [
                'name' => 'masa_akhir',
                'contents' => $this->input->post('masa_akhir'),
            ]
        ];
        if($this->input->post('product') && $this->input->post('tipe') == 'khusus'){
                $parts[] = [
                'name' => 'kode_product',
                'contents' => str_replace(',',';',$this->input->post('product'))
            ];
        }
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'gambar_v',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getserviceback('POST', 'voucher/insert/', '', [
            'multipart' => $parts,
        ]);
        $partsManage = [
            [
                'name' => 'kode_voucher',
                'contents' => $this->input->post('kode'),
            ],
            [
                'name' => 'jumlah_pengguna',
                'contents' => $this->input->post('jumlah_pengguna'),
            ],
            [
                'name' => 'jumlah_penggunaan',
                'contents' => $this->input->post('jumlah_penggunaan'),
            ],
        ];
        $datap = getserviceback('POST', 'management_voucher/insert/', '', [
            'multipart' => $partsManage,
        ]);
        echo json_encode($data);    
    }
    function edit()
    {
        $path = $_FILES['image']['tmp_name'];
        $filename = $_FILES['image']['name'];

        $parts = [
            
            [
                'name' => 'nama_voucher',
                'contents' => $this->input->post('nama_voucher'),
            ],
            [
                'name' => 'besaran',
                'contents' => $this->input->post('besaran'),
            ],
            [
                'name' => 'jenis',
                'contents' => $this->input->post('jenis'),
            ],
            [
                'name' => 'tipe',
                'contents' => $this->input->post('tipe'),
            ],
            // [
            //     'name' => 'kode_product',
            //     'contents' => str_replace(',',';',$this->input->post('kode_product')),
            // ],
            [
                'name' => 'status_voucher',
                'contents' => $this->input->post('status_voucher'),
            ],
            [
                'name' => 'keterangan_voucher',
                'contents' => $this->input->post('keterangan_voucher'),
            ],
            [
                'name' => 'max_pem',
                'contents' => $this->input->post('max_pem'),
            ]
        ];
        if($this->input->post('kode_product') && $this->input->post('tipe') == 'khusus'){
                $parts[] = [
                'name' => 'kode_product',
                'contents' => str_replace(',',';',$this->input->post('kode_product'))
            ];
        }
        if ($_FILES['image']['name']) {
            $parts[] = [
                'name' => 'gambar_v',
                'contents' => fopen($path, 'r'),
                'filename' => $filename
            ];
        }
        $data = getservice('PUT', 'voucher/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function activated()
    {
        $id_promo = $this->input->post('id_voucher');
        $status = $this->input->post('status') == 1 ? 2 : 1;

        $parts = [
            [
                'name' => 'status_voucher',
                'contents' => $status,
            ]
        ];
        $data = getservice('PUT', 'voucher/update/', $id_promo, [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function banner(){
        $data['title'] = "Banner Voucher";
        $data['desc'] = "List Banner";
        $data['breadcumb'] = breadcumb(['List Voucher' => 'voucher']);
        $this->template->load('template-admin', 'content/voucher/banner', $data);
    }
}
