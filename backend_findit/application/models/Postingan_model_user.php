<?php defined('BASEPATH') or exit('No direct script access allowed');

class Postingan_model_user extends CI_Model
{

    public function get_postingan()
    {
        $this->db->select('postingan.deskripsi, postingan.waktu, pengguna.nama, postingan.id_pengguna');
        $this->db->from('postingan');
        $this->db->join('pengguna', 'postingan.id_pengguna = pengguna.id_pengguna', 'INNER');
        $this->db->where('postingan.status_delete', 0);
        $this->db->order_by('postingan.waktu', 'DESC');

        return $this->db->get();
    }


    public function insert_data($data)
    {
        $this->db->insert('postingan', $data);
    }

    public function update_data($id_postingan, $data)
    {
        $this->db->where('id_postingan', $id_postingan);
        $this->db->update('postingan', $data);
    }
}
