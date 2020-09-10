<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $konten = $this->load->view('admin/list_admin', null, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Data Admin FindIt',
        );
        echo json_encode($data_json);
    }

    public function form_create()
    {
        $data_view = array('titel' => 'Form Data Admin Baru');

        $konten = $this->load->view('admin/form_admin', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Data Admin Baru',
        );
        echo json_encode($data_json);
    }

    public function form_edit($id_admin)
    {
        $data_view = array('titel' => 'Form Edit Data Admin', 'id_admin' => $id_admin);

        $konten = $this->load->view('admin/form_edit_admin', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'titel' => 'Form Edit Data Admin',
            'id_admin' => $id_admin
        );

        echo json_encode($data_json);
    }
}
