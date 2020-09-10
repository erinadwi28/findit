<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model_user extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('laporan', $data);
    }

    public function update_data($id_laporan, $data)
    {
        $this->db->where('id_laporan', $id_laporan);
        $this->db->update('laporan', $data);
    }

    public function get_namaKantor()
    {
        $this->db->select('kantor.*');
        $this->db->from('kantor');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }
}
