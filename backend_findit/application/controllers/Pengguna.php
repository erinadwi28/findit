<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
    }

    public function index()
    {
    }

    public function list_pengguna()
    {
        $data_pengguna = $this->Pengguna_model->get_pengguna();

        $konten = '';

        foreach ($data_pengguna->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nik . '</td>
                <td>' . $value->nama . '</td>
                <td>' . $value->tempat_lahir . '</td>
                <td>' . $value->tanggal_lahir . '</td>
                <td>' . $value->jenis_kelamin . '</td>
                <td>' . $value->agama . '</td>
                <td>' . $value->alamat . '</td>
                <td>' . $value->pekerjaan . '</td>
                <td>' . $value->email . '</td>
                <td>' . $value->nama_pengguna . '</td>
                <td>' . $value->no_telp . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_pengguna . '" class="linkEditPengguna"><button class ="btn btn-primary"><i class="far fa-edit nav-icon"></i>  Edit</button></a>  <a href="#' . $value->id_pengguna . '" class="linkHapusPengguna"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
                </td>
            </tr>';
        }

        $data_json = array(
            'konten' => $konten,
        );
        echo json_encode($data_json);
    }

    public function create_action()
    {
        $this->db->trans_start();

        $arr_input = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'email' => $this->input->post('email'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'kata_sandi' => $this->input->post('kata_sandi'),
            'no_telp' => $this->input->post('no_telp'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Pengguna_model->insert_data($arr_input);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Input Data Pengguna');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Input Data Pengguna');
        }

        echo json_encode($data_output);
    }

    public function detail()
    {
        $id_pengguna = $this->input->get('id_pengguna');
        $data_detail = $this->Pengguna_model->get_by_id($id_pengguna);

        if ($data_detail->num_rows() > 0) {
            $data_output = array('sukses' => 'ya', 'detail' => $data_detail->row_array());
        } else {
            $data_output = array('sukses' => 'tidak');
        }

        echo json_encode($data_output);
    }

    public function update_action()
    {
        $this->db->trans_start();

        $id_pengguna = $this->input->post('id_pengguna');

        $arr_input = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'email' => $this->input->post('email'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'kata_sandi' => $this->input->post('kata_sandi'),
            'no_telp' => $this->input->post('no_telp'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Pengguna_model->update_data($id_pengguna, $arr_input);

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Update Data Pengguna');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Update Data Pengguna');
        }

        echo json_encode($data_output);
    }

    public function soft_delete_data()
    {
        $this->db->trans_start();

        $id_pengguna = $this->input->get('id_pengguna');

        $this->Pengguna_model->soft_delete_data($id_pengguna);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Pengguna');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Pengguna');
        }
        echo json_encode($data_output);
    }
}
