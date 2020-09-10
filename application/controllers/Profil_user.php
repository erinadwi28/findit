<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_user extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->session->userdata('nama')) {
            redirect('login');
        }
    }
    public function index()
    {
        $this->load->view('profil/profil');
    }
}
