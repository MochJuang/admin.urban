<?php
class Uploadzip extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (is_login('is_logged') != true) redirect('auth');
    }
    function index()
    {
        $parts = [];
        if (isset($_FILES['zipfile']['name'])) {
            array_push($parts, [
                'name' => 'zipfile',
                'contents' => fopen($_FILES['zipfile']['tmp_name'], 'r'),
                'filename' => $_FILES['zipfile']['name']
            ]);
        }
        $data = getservice('POST', 'master_product/upload_zip/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
