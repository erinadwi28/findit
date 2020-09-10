<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
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

    public function list_pesan()
    {
        $data_pesan = $this->Pesan_model->get_pesan();

        $konten = '';

        foreach ($data_pesan->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nama . '</td>
                <td>' . $value->email . '</td>
                <td>' . $value->no_telp . '</td>
                <td>' . $value->isi . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_pesan . '" class="linkHapusPesan"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
                </td>
            </tr>';
        }

        $data_json = array(
            'konten' => $konten,
        );
        echo json_encode($data_json);
    }

    public function soft_delete_data()
    {
        $this->db->trans_start();

        $id_pesan = $this->input->get('id_pesan');

        $this->Pesan_model->soft_delete_data($id_pesan);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Pesan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Pesan');
        }
        echo json_encode($data_output);
    }
}
