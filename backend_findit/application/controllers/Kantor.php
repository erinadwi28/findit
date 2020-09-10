<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kantor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kantor_model');
    }

    public function index()
    {
        echo "Index";
    }

    public function list_kantor()
    {
        $data_kantor = $this->Kantor_model->get_kantor();

        $konten = '';

        foreach ($data_kantor->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nama_kantor . '</td>
                <td>' . $value->no_telp . '</td>
                <td>' . $value->alamat . '</td>
                <td>' . $value->nama_pimpinan . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_kantor . '" class="linkEditKantor"><button class ="btn btn-primary"><i class="far fa-edit nav-icon"></i>  Edit</button></a>  <a href="#' . $value->id_kantor . '" class="linkHapusKantor"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
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
            'nama_kantor' => $this->input->post('nama_kantor'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'nama_pimpinan' => $this->input->post('nama_pimpinan'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Kantor_model->insert_data($arr_input);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Input Data Kantor');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Input Data Kantor');
        }

        echo json_encode($data_output);
    }

    public function detail()
    {
        $id_kantor = $this->input->get('id_kantor');
        $data_detail = $this->Kantor_model->get_by_id($id_kantor);

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

        $id_kantor = $this->input->post('id_kantor');

        $arr_input = array(
            'nama_kantor' => $this->input->post('nama_kantor'),
            'no_telp' => $this->input->post('no_telp'),
            'alamat' => $this->input->post('alamat'),
            'nama_pimpinan' => $this->input->post('nama_pimpinan'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Kantor_model->update_data($id_kantor, $arr_input);

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Update Data Kantor');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Update Data Kantor');
        }

        echo json_encode($data_output);
    }

    public function soft_delete_data()
    {
        $this->db->trans_start();

        $id_kantor = $this->input->get('id_kantor');

        $this->Kantor_model->soft_delete_data($id_kantor);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Kantor');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Kantor');
        }
        echo json_encode($data_output);
    }
}
