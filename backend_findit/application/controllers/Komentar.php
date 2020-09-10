<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar_model');
    }

    public function index()
    {
        echo "Index";
    }

    public function list_komentar()
    {
        $data_komentar = $this->Komentar_model->get_komentar();

        $konten = '';

        foreach ($data_komentar->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->isi . '</td>
                <td>' . $value->id_pengguna . '</td>
                <td>' . $value->id_postingan . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_komentar . '" class="linkHapusKomentar"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
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

        $id_komentar = $this->input->get('id_komentar');

        $this->Komentar_model->soft_delete_data($id_komentar);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Komentar');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Komentar');
        }
        echo json_encode($data_output);
    }
}
