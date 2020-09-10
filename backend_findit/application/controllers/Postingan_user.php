<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Postingan_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Postingan_model_user');
    }
    public function index()
    {
        echo "Index";
    }

    public function list_postingan()
    {
        $data_postingan = $this->Postingan_model_user->get_postingan();

        $konten = '';

        foreach ($data_postingan->result() as $key => $value) {
            $konten .= '
            <h5><a href="#" class="profile-link">' . $value->nama . '</a></h5>
			    <p>' . $value->waktu . '</p>
			    <p>' . $value->deskripsi . '</p>
            <div class="line-divider"></div>';
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
            'deskripsi' => $this->input->post('deskripsi'),
            'id_pengguna' => $this->input->post('id_pengguna'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Postingan_model_user->insert_data($arr_input);

        $id_postingan = $this->db->insert_id();

        if ($_FILES != null) {
            $this->upload_foto($id_postingan, $_FILES);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Unggah Postingan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Unggah Postingan');
        }

        echo json_encode($data_output);
    }

    private function upload_foto($id_postingan, $files)
    {
        $gallerPath = realpath(APPPATH . '../foto_postingan');
        $path = $gallerPath . '/' . $id_postingan;

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
            $data_postingan = array(
                'foto' => $this->upload->data('file_name')
            );

            $this->Postingan_model_user->update_data($id_postingan, $data_postingan);
            return 'Success Upload';
        } else {
            return 'Error Upload';
        }
    }
}
