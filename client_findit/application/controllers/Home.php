<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('nama_pengguna')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data['admin'] = $this->db->get_where('admin', ['nama_pengguna' =>
		$this->session->userdata('nama_pengguna')])->row_array();

		$this->load->view('template', $data);
	}
}
