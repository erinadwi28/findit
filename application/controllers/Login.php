<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function index()
	{

		$this->load->library('session');
		if ($this->session->userdata('id_pengguna') != null && $this->session->userdata('id_pengguna') != '') {
			redirect('beranda');
		} else {
			$this->load->view('login');
		}
	}

	public function setSession()
	{
		$this->load->library('session');
		$id_pengguna = $this->input->post('id_pengguna');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
		$email = $this->input->post('email');
		$nama_pengguna = $this->input->post('nama_pengguna');
		$kata_sandi = $this->input->post('kata_sandi');
		$no_telp = $this->input->post('no_telp');

		$this->session->set_userdata('id_pengguna', $id_pengguna);
		$this->session->set_userdata('nik', $nik);
		$this->session->set_userdata('nama', $nama);
		$this->session->set_userdata('tempat_lahir', $tempat_lahir);
		$this->session->set_userdata('tanggal_lahir', $tanggal_lahir);
		$this->session->set_userdata('jenis_kelamin', $jenis_kelamin);
		$this->session->set_userdata('agama', $agama);
		$this->session->set_userdata('alamat', $alamat);
		$this->session->set_userdata('pekerjaan', $pekerjaan);
		$this->session->set_userdata('email', $email);
		$this->session->set_userdata('nama_pengguna', $nama_pengguna);
		$this->session->set_userdata('kata_sandi', $kata_sandi);
		$this->session->set_userdata('no_telp', $no_telp);
	}

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('login');
	}
}
