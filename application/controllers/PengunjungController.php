<?php

class PengunjungController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengunjungModel');
	}
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('pengunjung/index');
		$this->load->view('templates/footer');
	}
	public function tambah(){
		if (isset($_POST['simpan'])){
			$data = array(
				'pengunjung_tahun' => $this->input->post('tahun'),
				'pengunjung_tipe' => $this->input->post('uraian'),
				'pengunjung_pelajar_lk' => $this->input->post('pelajar-lk'),
				'pengunjung_pelajar_pr' => $this->input->post('pelajar-pr'),
				'pengunjung_mahasiswa_lk' => $this->input->post('mahasiswa-lk'),
				'pengunjung_mahasiswa_pr' => $this->input->post('mahasiswa-pr'),
				'pengunjung_umum_lk' => $this->input->post('umum-lk'),
				'pengunjung_umum_pr' => $this->input->post('umum-pr'),
			);
			$this->PengunjungModel->tambah_pengunjung($data);
			redirect('pengunjung');
		} else {
			$this->load->view('templates/header');
			$this->load->view('pengunjung/tambah');
			$this->load->view('templates/footer');
		}
	}

}
