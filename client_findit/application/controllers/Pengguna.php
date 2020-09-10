<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
        $konten = $this->load->view('pengguna/list_pengguna', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Pengguna FindIt',
        );
        echo json_encode($data_json);
    }

    public function form_create()
    {
        $data_view = array('titel' => 'Form Data Pengguna Baru');

        $konten = $this->load->view('pengguna/form_pengguna', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Data Pengguna Baru',
        );
        echo json_encode($data_json);
    }

    public function form_edit($id_pengguna)
    {
        $data_view = array('titel' => 'Form Edit Data Pengguna', 'id_pengguna' => $id_pengguna);

        $konten = $this->load->view('pengguna/form_edit_pengguna', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Edit Data Pengguna',
            'id_pengguna' => $id_pengguna
        );

        echo json_encode($data_json);
    }
}
