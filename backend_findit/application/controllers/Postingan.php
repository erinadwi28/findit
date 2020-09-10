<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Postingan_model');
    }

    public function index()
    {
        echo "Index";
    }

    public function list_postingan()
    {
        $data_postingan = $this->Postingan_model->get_postingan();

        $konten = '';

        foreach ($data_postingan->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nama . '</td>
                <td>' . $value->deskripsi . '</td>
                <td><img src="' . base_url() . '/foto_postingan/' . $value->id_postingan . '/' . $value->foto . '" width="100"</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_postingan . '" class="linkHapusPostingan"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
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

        $id_postingan = $this->input->get('id_postingan');

        $this->Postingan_model->soft_delete_data($id_postingan);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Postingan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Postingan');
        }
        echo json_encode($data_output);
    }
}
