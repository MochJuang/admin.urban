<?php
class Hak_akses extends CI_Controller
{
    function index()
    {

        $data['title'] = "List User Role Menu";
        $data['desc'] = "List Management User Role Menu";
        $data['breadcumb'] = breadcumb(['List Management User Role Menu' => '#']);
        $this->template->load('template-admin', 'content/hakAkses/main', $data);
    }
    function get()
    {
        $data = getservice('GET', 'role');
        echo json_encode($data->data);
    
    }
    function detail($id)
    {
        $data['title'] = "List User Role Menu";
        $data['desc'] = "List Management User";
        $data['desc'] = "List Management User Role Menu";
        $data['breadcumb'] = breadcumb([
            'List Management User Role Menu' => 'hak_akses',
            'List Detail Management User Role Menu' => '#'
        ]);
        $data['jenis'] = $id;
        $this->template->load('template-admin', 'content/hakAkses/detail', $data);
    }
    function get_child($id)
    {
        $id_bahan =$this->input->get('id_role') ?'&id='.$this->input->get('id_role') : '';
        $data = getservice('GET', 'hakAkses/find', '?id_usr_role='.$id.$id_bahan);
        echo json_encode($data->data);
    }
    function get_option($jenis)
    {
        $data = getservice('GET', 'menu/menuGet', '?jenis=' . $jenis);
        echo json_encode($data);
    }
    function add()
    {
        $parts = [
            [
                'name' => 'role_menu',
                'contents' => $this->input->post('role_menu'),
            ],
            [
                'name' => 'keterangan',
                'contents' => $this->input->post('keterangan'),
            ]
        ];
        $data = getservice('POST', 'role/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function addPrivillage()
    {
        $parts = [
            [
                'name' => 'id_usr_role',
                'contents' => $this->input->post('id_usr_role'),
            ],
            [
                'name' => 'id_menu',
                'contents' => $this->input->post('id_menu'),
            ]
        ];
        $data = getservice('POST', 'hakAkses/insert/', '', [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
    function editPrivillage()
    {
        $parts = [
            [
                'name' => 'id_usr_role',
                'contents' => $this->input->post('id_usr_role'),
            ],
            [
                'name' => 'id_menu',
                'contents' => $this->input->post('id_menu'),
            ]
        ];
        $data = getservice('POST', 'hakAkses/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
        // echo json_encode($this->input->post());
    }
    function edit()
    {
        $parts = [
            [
                'name' => 'label',
                'contents' => $this->input->post('label'),
            ],
            [
                'name' => 'link',
                'contents' => $this->input->post('link'),
            ],
            [
                'name' => 'icon',
                'contents' => $this->input->post('icon'),
            ],
            [
                'name' => 'parent',
                'contents' => $this->input->post('parent') == "" ? 0 : $this->input->post('parent'),
            ],
            [
                'name' => 'is_head_section',
                'contents' => $this->input->post('is_head_section'),
            ]
        ];
        $data = getservice('PUT', 'menu/update/', $this->input->post('id'), [
            'multipart' => $parts,
        ]);
        echo json_encode($data);
    }
}
