<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getservice')) {
    function getservice(
        $metode = 'GET',
        $uri = '',
        
        $params = '',
        $body = []
    ) {
        $ci = &get_instance();
        if (check_token()->status != 200) {
            login_service();
        }
        $body['headers'] = [
            'Authorization'     => 'Bearer ' . $ci->session->userdata('access_token'),
        ];
        $client = new GuzzleHttp\Client([
            'base_uri' => 'https://backend.urbanco.co.id/v1/',
            'verify'          => false,

        ]);
        $request = $client->request($metode, $uri . $params, $body);
        $response = $request->getBody();
        return json_decode($response);
    }
}
if (!function_exists('getserviceback')) {
    function getserviceback(
        $metode = 'GET',
        $uri = '',
        $params = '',
        $body = []
    ) {
        $ci = &get_instance();
        // if (check_token()->status != 200) {
        //     login_service();
        // }
        // $body['headers'] = [
        //     'Authorization'     => 'Bearer ' . $ci->session->userdata('access_token'),
        // ];
        $client = new GuzzleHttp\Client([
            'base_uri' => 'https://testbuild.urbanco.co.id/v1/',
            'verify'          => false,

        ]);
        $request = $client->request($metode, $uri . $params, $body);
        $response = $request->getBody();
        return json_decode($response);
    }
}
if (!function_exists('login_service')) {
    function login_service()
    {
        $ci = &get_instance();
        $client = new GuzzleHttp\Client([
            'base_uri' => 'https://backend.urbanco.co.id/v1/',
            'curl' => array(CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false),
            'allow_redirects' => false,
            'cookies'         => true,
            'verify'          => false
        ]);
        $request = $client->request('POST', 'auth', [
            'multipart' => [
                [
                    'name' => 'app_id',
                    'contents' => '13517985-087a-11ea-b177-0cc47adcb7b8',
                ],
                [
                    'name' => 'passwd',
                    'contents' => 'p@sw0rdN3w',
                ]
            ]
        ]);
        $response = $request->getBody();
        $token = json_decode($response);

        switch ($token->status) {
            case 200:
                $ci->session->set_userdata(['access_token' => $token->data->access_token]);
                return $token->data->access_token;
                break;
            case 401:
                return 'User or Pass Fail!<br> Repeat again for get your new token';
                break;

            default:
                return $token->status;
                break;
        }
    }
}
if (!function_exists('check_token')) {
    function check_token()
    {
        $ci = &get_instance();
        $client = new GuzzleHttp\Client(['base_uri' => 'https://backend.urbanco.co.id/v1/']);
        $request = $client->request('GET', 'auth/check_token', [
            'headers' => [
                'Authorization'     => 'Bearer ' . $ci->session->userdata('access_token'),
            ],
        ]);
        $response = $request->getBody();
        $token = json_decode($response);
        switch ($token->status) {
            case 200:
                return $token;
                break;
            case 401:
                return $token;
                break;

            default:
                return $token->status;
                break;
        }
    }
}
