<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan_model extends CI_Model
{

    public function insert_data($data)
    {
        $this->db->insert('pesan', $data);
    }


    public function get_pesan()
    {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }



    public function soft_delete_data($id_pesan)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_pesan', $id_pesan);
        $this->db->update('pesan', $data);
    }
}
