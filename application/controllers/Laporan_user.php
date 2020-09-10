<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_user extends CI_Controller
{

  public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('login');
        }
    }
    public function index()
    {
    }

    public function form_create()
    {
        $data_view = array('title' => 'Unggah Data Pelaporan');

        $konten = $this->load->view('laporan_user/form_laporan_user', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'title' => 'Unggah Data Pelaporan'
        );
        echo json_encode($data_json);
    }
}
