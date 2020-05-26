<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enkripsi_m extends CI_Model {

    public function tambahData($post = null)
    {
        $params = [
            "gambar1" => $post['gambar1'],
            "gambar2" => $post['gambar2']
        ];

        $this->db->insert('enkripsi', $params);
    }

    public function getData($id = null) {
        $this->db->select('*');
        $this->db->from('enkripsi');
        $this->db->order_by('id_enkripsi', 'desc');

        if($id != null){
            $this->db->where('id_enkripsi',$id);
        }

        $query = $this->db->get();
        return $query;
    }

}