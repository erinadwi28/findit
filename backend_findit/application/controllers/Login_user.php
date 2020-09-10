<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginUser_model');
    }
    public function index()
    {
        echo "Index";
    }
    public function check_login()
    {
        $nama_pengguna = $this->input->post('nama_pengguna');
        $kata_sandi = $this->input->post('kata_sandi');
        $cek = $this->LoginUser_model->cek_user($nama_pengguna, $kata_sandi);
        if ($cek->num_rows() > 0) {
            $data_json = array('sukses' => 'Ya', 'pesan' => 'Sukses Login !!', 'user' => $cek->row_array());
        } else {
            $data_json = array('sukses' => 'T', 'pesan' => 'Username dan Password Tidak Terdaftar !!');
        }
        echo json_encode($data_json);
    }
}
