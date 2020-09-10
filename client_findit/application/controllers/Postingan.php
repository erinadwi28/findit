<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan extends CI_Controller
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
        $konten = $this->load->view('postingan/list_postingan', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Postingan FindIt',
        );
        echo json_encode($data_json);
    }
}
