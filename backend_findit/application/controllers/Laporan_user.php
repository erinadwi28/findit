<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model_user');
    }
    public function index()
    {
        echo "Index";
    }

    public function create_action()
    {
        $this->db->trans_start();

        $arr_input = array(
            'tanggal' => $this->input->post('tanggal'),
            'barang_hilang' => $this->input->post('barang_hilang'),
            'deskripsi_barang' => $this->input->post('deskripsi_barang'),
            'kronologi' => $this->input->post('kronologi'),
            'status' => $this->input->post('status'),
            'id_pengguna' => $this->input->post('id_pengguna'),
            'id_kantor' => $this->input->post('id_kantor'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Laporan_model_user->insert_data($arr_input);

        $id_laporan = $this->db->insert_id();

        if ($_FILES != null) {
            $this->upload_foto($id_laporan, $_FILES);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Unggah Data Pelaporan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Unggah Data Pelaporan');
        }

        echo json_encode($data_output);
    }

    public function get_kantor()
    {
        $data_namaKantor = $this->Laporan_model_user->get_namaKantor();

        $konten = '';

        foreach ($data_namaKantor->result() as $key => $value) {
            $konten .= '
            <select class="form-control form-user-input" name="id_kantor" id="kantor">
            <option value="' . $value->id_kantor . '">' . $value->nama_kantor . '</option>
            </select>';
        }

        $data_json = array(
            'konten' => $konten,
        );
        echo json_encode($data_json);
    }

    private function upload_foto($id_laporan, $files)
    {
        $gallerPath = realpath(APPPATH . '../foto_laporan');
        $path = $gallerPath . '/' . $id_laporan;

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);
        }

        $konfigurasi = array(
            'allowed_types' => 'jpg|png|jpeg',
            'upload_path' => $path,
            'overwrite' => true
        );

        $this->load->library('upload', $konfigurasi);

        $_FILES['file']['name'] = $files['file']['name'];
        $_FILES['file']['type'] = $files['file']['type'];
        $_FILES['file']['tmp_name'] = $files['file']['tmp_name'];
        $_FILES['file']['error'] = $files['file']['error'];
        $_FILES['file']['size'] = $files['file']['size'];

        if ($this->upload->do_upload('file')) {
            $data_laporan = array(
                'foto' => $this->upload->data('file_name')
            );

            $this->Laporan_model_user->update_data($id_laporan, $data_laporan);
            return 'Success Upload';
        } else {
            return 'Error Upload';
        }
    }
}
