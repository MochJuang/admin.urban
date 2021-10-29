<?php
class Chat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    public function index()
    {
        $this->load->view('content/chat/main');
    }
    public function get($id = 1)
    {
        $data = getservice('GET', 'chat/new?id=' . $id);
        echo json_encode($data->data);
    }
    public function chatlive()
    {
        $this->load->view('chatlive');
    }
    public function listData($id)
    {
        $parts = [
            [
                'name' => 'status',
                'contents' => 2,
            ]
        ];
        $data = getservice('PUT', 'chat/update/list?id=' . $id, '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    public function add()
    {
        $parts = [
            [
                'name' => 'user_id',
                'contents' => (int)$_POST['user_id'],
            ],
            [
                'name' => 'cs_id',
                'contents' => (int)$_POST['cs_id'],
            ],
            [
                'name' => 'isi',
                'contents' => $_POST['isi'],
            ],
            [
                'name' => 'tipe',
                'contents' => 2,
            ]
        ];
        // $data = getservice('POST', 'chat/insert/', '', [
        //     'multipart' => $parts,
        // ]);
        echo json_encode($_POST);
    }
}
