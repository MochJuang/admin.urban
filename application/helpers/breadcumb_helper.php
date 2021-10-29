<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('breadcumb')) {
    function breadcumb($data = array())
    {

        $breadcumb = '';
        $breadcumb .= '<div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="' . base_url() . '"> <i class="feather icon-home"></i> </a>
            </li>
            
        ';
        foreach ($data as $key => $value) {
            $breadcumb .= '<li class="breadcrumb-item"><a href="' . base_url($value) . '">' . $key . '</a></li>';
        }
        $breadcumb .= '</ul></div>';
        return $breadcumb;
    }
}
