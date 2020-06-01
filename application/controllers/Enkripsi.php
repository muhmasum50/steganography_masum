<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

/**
 * ==================================================================
 * 
 * @author Muhammad Ma'sum
 * @version 1.0
 * 
 * created 20 May 2020
 */


class Enkripsi extends CI_Controller {

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
    

	public function index() {
        $this->template->load('template/template_v2','metode/enkripsi_data');

    }
    
    public function tambah()
    {
        if(isset($_POST['enkripsi'])) {
            $post = $this->input->post(null, true);
            $config['upload_path']      = './uploads';
                $config['allowed_types']     = 'jpeg|jpg';
                $config['max_size']         = 2048;
                $config['file_name']        = 'gambarsebelum-'.substr(md5(rand()),0,10);
                $this->load->library('upload', $config);

                if(@$_FILES['gambar1']['name'] != null) {
                    if($this->upload->do_upload('gambar1')) {
                        $post['gambar1'] = $this->upload->data('file_name'); 

                        function toBin($str) {
                            $str = (string)$str;
                            $l = strlen($str);
                            $result = '';
                            while($l--){
                              $result = str_pad(decbin(ord($str[$l])),8,"0",STR_PAD_LEFT).$result;
                            }
                            return $result;
                        }
                
                        function toString($str) {
                            $text_array = explode("\r\n", chunk_split($str, 8));
                            $newstring = '';
                            for ($n = 0; $n < count($text_array) - 1; $n++) {
                                $newstring .= chr(base_convert($text_array[$n], 2, 10));
                            }
                            return $newstring;
                        }
                        
                
                
                            //simpan pesan dan gambar pada new variable
                            $msg = $post['pesan']; 
                            $src = 'uploads/'.$post['gambar1']; 
                
                            $msg .='|'; //EOF sign, decided to use the pipe symbol to show our decrypter the end of the message
                            $msgBin = toBin($msg); //convert pesan kedalam binary
                            $msgLength = strlen($msgBin); //ambil panjang karakter pesan
                            $img = imagecreatefromjpeg($src); //returns an image identifier

                            list($width, $height, $type, $attr) = getimagesize($src); //get image size
                
                            if($msgLength>($width*$height)){ //The image has more bits than there are pixels in our image
                            echo('Message too long. This is not supported as of now.');
                            die();
                            }
                
                            $pixelX=0; //Coordinates of our pixel that we want to edit
                            $pixelY=0; //^
                
                            for($x=0;$x<$msgLength;$x++){ //Encrypt message bit by bit (literally)
                
                            if($pixelX === $width+1){ //If this is true, we've reached the end of the row of pixels, start on next row
                                $pixelY++;
                                $pixelX=0;
                            }
                
                            if($pixelY===$height && $pixelX===$width){ //Check if we reached the end of our file
                                echo('Max Reached');
                                die();
                            }
                
                            $rgb = imagecolorat($img,$pixelX,$pixelY); //Color of the pixel at the x and y positions
                            $r = ($rgb >>16) & 0xFF; //returns red value for example int(119)
                            $g = ($rgb >>8) & 0xFF; //^^ but green
                            $b = $rgb & 0xFF;//^^ but blue
                
                            $newR = $r; 
                            $newG = $g; 
                            $newB = toBin($b); //Convert our blue to binary
                            $newB[strlen($newB)-1] = $msgBin[$x]; //Change least significant bit with the bit from out message
                            $newB = toString($newB); //Convert our blue back to an integer value (even though its called tostring its actually toHex)
                
                            $new_color = imagecolorallocate($img,$newR,$newG,$newB); //swap pixel with new pixel that has its blue lsb changed (looks the same)
                            imagesetpixel($img,$pixelX,$pixelY,$new_color); //Set the color at the x and y positions
                            $pixelX++; //next pixel (horizontally)
                
                            }
                            $randomDigit = rand(1,9999); //Random digit for our filename
                            imagepng($img,'uploads/encrypted' . $randomDigit . '.jpg'); //Create image
                
                            echo('done: ' . 'encrypted' . $randomDigit . '.jpg'); //Echo our image file name

                            $post['gambar2'] = 'encrypted'. $randomDigit . '.jpg';
                            $post['pesannew'] = $msg;

                    
                        $this->enkripsi_m->tambahData($post);
                        $this->message('Wawww','Kamu Berhasil Menenkripsi Pesan','success');
                        redirect('pxl/encryption');
                    }
                }
                $this->message('Oopps','Kamu gagal Menenkripsi Pesan','error');
                redirect('pxl/encryption');
        }
    }
}