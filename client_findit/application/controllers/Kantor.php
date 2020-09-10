<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kantor extends CI_Controller
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
        $konten = $this->load->view('kantor/list_kantor', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Kantor FindIt',
        );
        echo json_encode($data_json);
    }

    public function form_create()
    {
        $data_view = array('titel' => 'Form Data Kantor Baru');

        $konten = $this->load->view('kantor/form_kantor', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Data Kantor Baru',
        );
        echo json_encode($data_json);
    }

    public function form_edit($id_kantor)
    {
        $data_view = array('titel' => 'Form Edit Data Kantor', 'id_kantor' => $id_kantor);

        $konten = $this->load->view('kantor/form_edit_kantor', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Edit Data Kantor',
            'id_kantor' => $id_kantor
        );

        echo json_encode($data_json);
    }
}
