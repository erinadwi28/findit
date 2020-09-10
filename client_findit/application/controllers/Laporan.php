<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $konten = $this->load->view('laporan/list_laporan', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Pelaporan FindIt',
        );
        echo json_encode($data_json);
    }

    public function form_create()
    {
        $data_view = array('titel' => 'Form Data Pelaporan Baru');

        $konten = $this->load->view('laporan/form_laporan', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Data Pelaporan Baru',
        );
        echo json_encode($data_json);
    }

    public function form_edit($id_laporan)
    {
        $data_view = array('titel' => 'Form Edit Data Pelaporan', 'id_laporan' => $id_laporan);

        $konten = $this->load->view('laporan/form_edit_laporan', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Edit Data Pelaporan',
            'id_laporan' => $id_laporan
        );

        echo json_encode($data_json);
    }
}
