<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dekripsi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('enkripsi_m');
	}

	public function index()
	{
		$data['row'] = $this->enkripsi_m->getData()->result();
        $this->template->load('template/template_v2','metode/dekripsi_tabel', $data);

	}

	public function dekripsi_plain_text($id) {
		$id = $this->uri->segment(3);
		$data['row'] = $this->enkripsi_m->getData($id)->row();

		$this->template->load('template/template_v2','metode/dekripsi_hasil', $data);
	}
}