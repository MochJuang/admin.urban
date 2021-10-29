<?php
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function test()
    {
        $data = getservice('GET', 'sliders', '');
        print_r($data);
    }
    function index()
    {
        $path = './captcha/';

        if (!file_exists($path)) {
            $create = mkdir($path, 0777);
            if (!$create)
                return;
        }
        $word = array_merge(range('1', '9'), range('a', 'z'));
        $acak = shuffle($word);
        $str  = substr(implode($word), 0, 6);
        $data_ses = array('captcha_str' => strtolower($str));
        $this->session->set_userdata($data_ses);
        $vals = array(
            'word' => $str,
            'img_path' => 'captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => '290',
            'font_path' => FCPATH . 'assets/font/Verdana.ttf',
            'img_height' => 65,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        // $data['captcha_image'] = $cap['image'];

        $this->load->view('content/auth/main');
    }
    function verify()
    {
        $parts = [
            [
                'name' => 'username',
                'contents' => $this->input->post('username'),
            ],
            [
                'name' => 'password',
                'contents' => $this->input->post('password'),
            ]
        ];
        $data = getservice('POST', 'admin/auth/', '', [
            'multipart' => $parts,
        ]);

        if ($data->data) {
            $result = $data->data;
            $this->session->set_userdata((array)$result);
            $this->session->set_userdata(['is_logged' => true]);
            $result = [
                'success' => true,
                'data' => (array)$data->data,
                // 'captcha' => $this->session->userdata('captcha_str'),
                // 'input_capctha' => $this->input->post('captcha')
            ];
        } else {
            $result = [
                'success' => false,
                // 'captcha' => $this->session->userdata('captcha_str'),
                // 'input_capctha' => $this->input->post('captcha')
            ];
        }
        echo json_encode($result);
    }
    function refresh_captcha()
    {
        $path = './captcha/';

        if (!file_exists($path)) {
            $create = mkdir($path, 0777);
            if (!$create)
                return;
        }
        $word = array_merge(range('1', '9'), range('a', 'z'));
        $acak = shuffle($word);
        $str  = substr(implode($word), 0, 6);
        $data_ses = array('captcha_str' => strtolower($str));
        $this->session->set_userdata($data_ses);
        $vals = array(
            'word' => $str,
            'img_path' => 'captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => '290',
            'font_path' => FCPATH . 'assets/font/Verdana.ttf',
            'img_height' => 65,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);
        echo $cap['image'];
    }
    function is_login($id)
    {
        $parts = [
            [
                'name' => 'activity_login',
                'contents' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'status_login',
                'contents' => 1,
            ]
        ];
        $data = getservice('PUT', 'admin/update/' . $id, '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function is_logout($id)
    {
        $parts = [
            [
                'name' => 'activity_login',
                'contents' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'status_login',
                'contents' => 0,
            ]
        ];
        $data = getservice('PUT', 'admin/update/' . $id, '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function logout()
    {
        $parts = [
            [
                'name' => 'status_login',
                'contents' => 0,
            ]
        ];
        $data = getservice('PUT', 'admin/update/' . $this->session->userdata('id_admin'), '', [
            'multipart' => $parts,
        ]);
        $this->session->sess_destroy();
        redirect('auth', 'refresh');
    }
}
