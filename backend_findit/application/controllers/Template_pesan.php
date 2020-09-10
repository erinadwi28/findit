<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_pesan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesan_model');
    }

    public function index()
    {
        echo "Index";
    }

    public function create_action()
    {
        $this->db->trans_start();

        $arr_input = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'isi' => $this->input->post('isi'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Pesan_model->insert_data($arr_input);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Input Data Pesan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Input Data Pesan');
        }

        echo json_encode($data_output);
    }
}
