<?php

class LaporanController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('laporan/index');
		$this->load->view('templates/footer');
	}
}
