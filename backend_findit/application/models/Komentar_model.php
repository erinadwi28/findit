<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_model extends CI_Model
{
    public function get_komentar()
    {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function soft_delete_data($id_komentar)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_komentar', $id_komentar);
        $this->db->update('komentar', $data);
    }
}
