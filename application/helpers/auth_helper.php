<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('is_login')) {
    function is_login($data)
    {
        $ci = &get_instance();
        $userdata = $ci->session->userdata($data);
        return $userdata;
    }
}
