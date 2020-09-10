<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
    }

    public function list_admin()
    {
        $data_admin = $this->Admin_model->get_admin();

        $konten = '';

        foreach ($data_admin->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nama . '</td>
                <td>' . $value->jeniskelamin . '</td>
                <td>' . $value->no_telp . '</td>
                <td>' . $value->email . '</td>
                <td>' . $value->nama_pengguna . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_admin . '" class="linkEditAdmin"><button class ="btn btn-primary"><i class="far fa-edit nav-icon"></i>  Edit</button></a>  <a href="#' . $value->id_admin . '" class="linkHapusAdmin"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
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
            'nama' => $this->input->post('nama'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'kata_sandi' => $this->input->post('kata_sandi'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Admin_model->insert_data($arr_input);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Input Data Admin');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Input Data Admin');
        }

        echo json_encode($data_output);
    }

    public function detail()
    {
        $id_admin = $this->input->get('id_admin');
        $data_detail = $this->Admin_model->get_by_id($id_admin);

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

        $id_admin = $this->input->post('id_admin');

        $arr_input = array(
            'nama' => $this->input->post('nama'),
            'jeniskelamin' => $this->input->post('jeniskelamin'),
            'no_telp' => $this->input->post('no_telp'),
            'email' => $this->input->post('email'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'kata_sandi' => $this->input->post('kata_sandi'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Admin_model->update_data($id_admin, $arr_input);

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Update Data Admin');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Update Data Admin');
        }

        echo json_encode($data_output);
    }

    public function soft_delete_data()
    {
        $this->db->trans_start();

        $id_admin = $this->input->get('id_admin');

        $this->Admin_model->soft_delete_data($id_admin);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Admin');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Admin');
        }
        echo json_encode($data_output);
    }
}
