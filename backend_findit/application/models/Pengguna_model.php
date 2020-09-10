<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    public function get_pengguna()
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function insert_data($data) 
    {
        $this->db->insert('pengguna', $data);
    }

    public function get_by_id($id_pengguna){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get();
    }

    public function update_data($id_pengguna, $data)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);    
    }

    public function soft_delete_data($id_pengguna)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('pengguna', $data);    
    }
}