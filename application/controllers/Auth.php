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


class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
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
 
     public function login(){
         check_already_login();
 
         // ambil captcha dari library recaptcha
         $data = array(
             'judul' => 'Apps Steganography - Log In'
         );
 
         $this->load->view('template/login',$data);
     }

    public function proses() {
        $post = $this->input->post(null, TRUE);

        if(isset($post['login']))
        {
            $query = $this->user_m->login($post);

            if($post['username'] == '') { // cek username apabila kosong
                $this->session->set_flashdata('errorcaptcha','Username tidak boleh kosong!');

                redirect('pxl/auth/login');
            }
            else if($post['password'] == '') {
                $this->session->set_flashdata('errorcaptcha','Password tidak boleh kosong!');

                redirect('pxl/auth/login');
            }
            else {

                if($query->num_rows() > 0){
                    $row = $query->row();
                    
                    date_default_timezone_set('Asia/Jakarta');
                    $date = date("Y-m-d");
                    $time = date("H:i:s");

                    $params = array(
                        'userid' => $row->id_user,
                        'username' => $row->username,
                        'nama' => $row->nama,
                        'lastlog' => nama_hari($date).', '.tgl_indo($date).' '.$time
                    );

                    $this->session->set_userdata($params);
                    // $this->log_m->tambah_log_login(); // menambah log login
                    $this->message('Selamat','Anda Berhasil Login','success');
                    redirect('pxl/dashboard');
                    
                }
                else {
                    $this->message('Ooppsss','Opps Username tidak terdaftar, silahkan coba username lain','error');
    
                    redirect('pxl/auth/login');
                }

            }
            redirect('pxl/auth/login');
        }
        redirect('pxl/auth/login');

    }

    public function logout()
    {
        // $this->log_m->tambah_log_logout(); //menambah log logout
        
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);

        $this->message('Selamat','Anda Berhasil Logout','success');
        redirect('pxl/auth/login');
    }

}