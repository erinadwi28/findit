<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan_user extends CI_Controller
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

        $konten = $this->load->view('postingan_user/list_postingan_user', null, true);

        $data_json = array(
            'konten' => $konten,
            'title' => 'List postingan',
        );

        echo json_encode($data_json);
    }

    public function form_create()
    {
        $data_view = array('title' => 'Unggah Postingan Baru');

        $konten = $this->load->view('postingan_user/form_postingan_user', $data_view, true);

        $data_json = array(
            'konten' => $konten,
            'title' => 'Unggah Postingan Baru'
        );
        echo json_encode($data_json);
    }
}
