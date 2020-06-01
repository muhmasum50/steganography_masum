<?php

/**
 * ==================================================================
 * 
 * @author Muhammad Ma'sum
 * @version 1.0
 * 
 * created 20 May 2020
 */


function check_already_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if($user_session)
    {
        redirect('pxl/dashboard');
    }
}

function check_not_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if(!$user_session)
    {
        redirect('pxl/auth/login');
    }
}

function check_role()
{
    $ci =& get_instance();
    $ci->load->library('libraryku');

    if($ci->libraryku->getData()->level != 'admin'){
        redirect('pxl/dashboard');
    }
}

function debug($var, $die=FALSE)
{
	echo '<pre>';
	print_r($var);
	echo '</pre>';
	if ($die) die;
}

function matauang_indo($nominal) {
    $result = "Rp. " . number_format($nominal, 2, ','. ',');
    return $result;
}

function tanggal_indo($date) {
    $d = substr($date,8,2);
    $m = substr($date,5,2);
    $y = substr($date,0,4);

    return $d.'/'.$m.'/'.$y;
}
