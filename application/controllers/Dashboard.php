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

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        check_not_login();
    }

	public function index()
	{
        $this->template->load('template/template_v2','dashboard_v2');
        // $this->load->view('template/template_v2');
	}
}