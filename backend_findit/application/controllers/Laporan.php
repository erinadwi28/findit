<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
    }

    public function index()
    {
        echo "Index";
    }

    public function list_laporan()
    {
        $data_laporan = $this->Laporan_model->get_laporan();

        $konten = '';

        foreach ($data_laporan->result() as $key => $value) {
            $konten .= '
            <tr>
                <td>' . $value->nama . '</td>
                <td>' . $value->tanggal . '</td>
                <td>' . $value->nama_kantor . '</td>
                <td>' . $value->barang_hilang . '</td>
                <td>' . $value->deskripsi_barang . '</td>
                <td>' . $value->kronologi . '</td>
                <td><img src="' . base_url() . '/foto_laporan/' . $value->id_laporan . '/' . $value->foto . '" width="100"</td>
                <td>' . $value->status . '</td>
                <td>' . $value->waktu . '</td>
                <td>
                    <a href="#' . $value->id_laporan . '" class="linkEditLaporan"><button class ="btn btn-primary"><i class="far fa-edit nav-icon"></i>  Edit</button></a>  <a href="#' . $value->id_laporan . '" class="linkHapusLaporan"><button class ="btn btn-danger"><i class="far fa-trash-alt nav-icon"></i>  Hapus</button></a>
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
            'tanggal' => $this->input->post('tanggal'),
            'barang_hilang' => $this->input->post('barang_hilang'),
            'deskripsi_barang' => $this->input->post('deskripsi_barang'),
            'kronologi' => $this->input->post('kronologi'),
            'status' => $this->input->post('status'),
            'id_pengguna' => $this->input->post('id_pengguna'),
            'id_kantor' => $this->input->post('id_kantor'),
            'waktu' => $this->input->post('waktu'),
        );

        $this->Laporan_model->insert_data($arr_input);

        $id_laporan = $this->db->insert_id();

        if ($_FILES != null) {
            $this->upload_foto($id_laporan, $_FILES);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Input Data Pelaporan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Input Data Pelaporan');
        }

        echo json_encode($data_output);
    }

    public function detail()
    {
        $id_laporan = $this->input->get('id_laporan');
        $data_detail = $this->Laporan_model->get_by_id($id_laporan);

        if ($data_detail->num_rows() > 0) {
            $data_output = array('sukses' => 'ya', 'detail' => $data_detail->row_array());
        } else {
            $data_output = array('sukses' => 'tidak');
        }

        echo json_encode($data_output);
    }

    public function get_kantor()
    {
        $data_namaKantor = $this->Laporan_model->get_namaKantor();

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

    public function get_pengguna()
    {
        $data_namaPengguna = $this->Laporan_model->get_namaPengguna();

        $konten = '';

        foreach ($data_namaPengguna->result() as $key => $value) {
            $konten .= '
            <select class="form-control form-user-input" name="id_pengguna" id="id_pengguna">
            <option value="' . $value->id_pengguna . '">' . $value->nama . '</option>
            </select>';
        }

        $data_json = array(
            'konten' => $konten,
        );
        echo json_encode($data_json);
    }

    public function update_action()
    {
        $this->db->trans_start();

        $id_laporan = $this->input->post('id_laporan');

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

        $this->Laporan_model->update_data($id_laporan, $arr_input);

        if ($_FILES != null) {
            $this->upload_foto($id_laporan, $_FILES);
        }

        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Update Data Pelaporan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Update Data Pelaporan');
        }

        echo json_encode($data_output);
    }

    public function soft_delete_data()
    {
        $this->db->trans_start();

        $id_laporan = $this->input->get('id_laporan');

        $this->Laporan_model->soft_delete_data($id_laporan);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $data_output = array('sukses' => 'tidak', 'pesan' => 'Gagal Hapus Data Pelaporan');
        } else {
            $this->db->trans_commit();
            $data_output = array('sukses' => 'ya', 'pesan' => 'Berhasil Hapus Data Pelaporan');
        }
        echo json_encode($data_output);
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

            $this->Laporan_model->update_data($id_laporan, $data_laporan);
            return 'Success Upload';
        } else {
            return 'Error Upload';
        }
    }
}
