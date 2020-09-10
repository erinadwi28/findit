<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan_model extends CI_Model
{
    public function get_postingan()
    {
        $this->db->select('pengguna.nama, postingan.foto, postingan.deskripsi, , postingan.waktu, postingan.id_pengguna, postingan.id_postingan');
        $this->db->from('postingan');
        $this->db->join('pengguna', 'postingan.id_pengguna = pengguna.id_pengguna', 'INNER');
        $this->db->where('postingan.status_delete', 0);

        return $this->db->get();
    }

    public function soft_delete_data($id_postingan)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_postingan', $id_postingan);
        $this->db->update('postingan', $data);
    }
}
