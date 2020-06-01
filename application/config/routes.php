<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ==================================================================
 * 
 * @author Muhammad Ma'sum
 * @version 1.0
 * 
 * created 20 May 2020
 */

 
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';

$route['pxl/encryption'] = 'enkripsi';
$route['pxl/decryption'] = 'dekripsi';
$route['pxl/dashboard'] = 'dashboard';
$route['pxl/decryption/(:any)'] = 'dekripsi/dekripsi_plain_text/$1';

//login
$route['pxl/auth/login'] = 'auth/login';
$route['pxl/auth/logout'] ='auth/logout';

$route['translate_uri_dashes'] = FALSE;
