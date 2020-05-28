<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dekripsi extends CI_Controller {

	function __construct() {
        parent::__construct();
        check_not_login();
		$this->load->model('enkripsi_m');
	}

	 //notifikasi berhasil atau tidak sweetalert
     public function message($title = NULL, $text = NULL, $icon = NULL)
     {
         return $this->session->set_flashdata([
             'title' => $title,
             'text' => $text,
             'icon' => $icon
         ]);
     }

	public function index()
	{
		$data['row'] = $this->enkripsi_m->getData()->result();
        $this->template->load('template/template_v2','metode/dekripsi_tabel', $data);

	}

	// fungsi decrypt
	public function dekripsi_plain_text($id) {
		$id = $this->uri->segment(3);
		$data['row'] = $this->enkripsi_m->getData($id)->row();

		$this->template->load('template/template_v2','metode/dekripsi_hasil', $data);
	}

	public function hapus() {
        $id = $this->input->post('idhapus');
        $item = $this->enkripsi_m->getData($id)->row();

        if($item->gambar1 != null) { //jika ada gambar, maka dihapus didalam direktori
			$target_file = './uploads/'.$item->gambar1;
			// $target_file2 = './uploads/'.$item->gambar2;
            unlink($target_file);
		}
		if($item->gambar2 != null) {
			$target_file2 = './uploads/'.$item->gambar2;
            unlink($target_file2);
		}

        $this->enkripsi_m->hapusData($id);
        if($this->db->affected_rows() > 0){
			$this->message('Berhasil !','Data Berhasil dihapus','success');
        }
        redirect('pxl/decryption');
    }
}