<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('login');
        }
    }

    public function index()
    {
        $konten = $this->load->view('pesan/list_pesan', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Pesan FindIt',
        );
        echo json_encode($data_json);
    }
}
