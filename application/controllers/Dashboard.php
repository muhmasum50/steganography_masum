<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $this->template->load('template/template_v2','dashboard_v2');
        // $this->load->view('template/template_v2');
	}
}