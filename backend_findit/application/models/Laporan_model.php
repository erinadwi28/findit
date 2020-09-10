<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function get_laporan()
    {
        $this->db->select('pengguna.nama, laporan.tanggal, laporan.barang_hilang, laporan.deskripsi_barang, laporan.kronologi, laporan.foto, laporan.status, laporan.id_pengguna, kantor.nama_kantor, laporan.waktu, laporan.id_laporan, laporan.id_kantor');
        $this->db->from('laporan');
        $this->db->join('kantor', 'laporan.id_kantor = kantor.id_kantor', 'INNER');
        $this->db->join('pengguna', 'laporan.id_pengguna = pengguna.id_pengguna', 'INNER');
        $this->db->where('laporan.status_delete', 0);

        return $this->db->get();
    }

    public function get_namaKantor()
    {
        $this->db->select('kantor.*');
        $this->db->from('kantor');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function get_namaPengguna()
    {
        $this->db->select('pengguna.*');
        $this->db->from('pengguna');
        $this->db->where('status_delete', 0);

        return $this->db->get();
    }

    public function insert_data($data)
    {
        $this->db->insert('laporan', $data);
    }

    public function get_by_id($id_laporan)
    {
        $this->db->select('*');
        $this->db->from('laporan');
        $this->db->where('id_laporan', $id_laporan);
        return $this->db->get();
    }

    public function update_data($id_laporan, $data)
    {
        $this->db->where('id_laporan', $id_laporan);
        $this->db->update('laporan', $data);
    }

    public function soft_delete_data($id_laporan)
    {
        $data = array(
            'status_delete' => 1
        );
        $this->db->where('id_laporan', $id_laporan);
        $this->db->update('laporan', $data);
    }
}
