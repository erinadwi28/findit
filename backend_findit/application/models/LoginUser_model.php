<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginUser_model extends CI_Model
{
    public function cek_user($nama_pengguna, $kata_sandi)
    {
        $this->db->select('*');

        $this->db->from('pengguna');
        $this->db->where('nama_pengguna', $nama_pengguna);
        $this->db->where('kata_sandi', $kata_sandi);
        return $this->db->get();
    }
}
