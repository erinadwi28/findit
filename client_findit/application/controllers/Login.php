<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
        $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'trim|required');
        if ($this->session->userdata('nama_pengguna')) {
            redirect('home');
        }
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign In Admin FindIt';
            $this->load->view('admin/login');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $nama_pengguna = $this->input->post('nama_pengguna');
        $kata_sandi = $this->input->post('kata_sandi');

        $admin = $this->db->get_where('admin', ['nama_pengguna' => $nama_pengguna])->row_array();

        //cek data ada tidak
        // var_dump($admin);
        // die;

        if ($admin) {
            //admin ada
            if ($kata_sandi === $admin['kata_sandi']) {
                //kata sandi benar

                $data = [
                    'nama_pengguna' => $admin['nama_pengguna'],
                    'id_admin' => $admin['id_admin'],
                ];

                $this->session->set_userdata($data);

                redirect('home');
            } else {
                //kata sandi salah

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Kata Sandi salah !</div>');
                redirect('login');
            }
        } else {
            //gagal login
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Nama Pengguna tidak terdaftar sebagai admin !</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        //untuk membersihkan session dan mengembalikannya ke halaman login

        $this->session->unset_userdata('nama_pengguna');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil Logout</div>');
        redirect('login');
    }
}
