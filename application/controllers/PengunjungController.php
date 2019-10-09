<?php

class PengunjungController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PengunjungModel');
	}
	public function index(){
		$data = array(
			'pengunjung' => $this->PengunjungModel->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('pengunjung/index',$data);
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
	public function grafik(){
		$this->load->view('templates/header');
		$this->load->view('pengunjung/grafik');
		$this->load->view('templates/footer');
	}
	public function dataGrafik(){
		$pengunjung = $this->PengunjungModel->lihat_semua();

		foreach($pengunjung as $value){
			$label[] = $value['pengunjung_tipe'].', '.$value['pengunjung_tahun'];
			$uraian[] = $value['pengunjung_tipe'];
			$tahun[] = $value['pengunjung_tahun'];
			$pelajar_lk[] = (float) $value['pengunjung_pelajar_lk'];
			$pelajar_pr[] = (float) $value['pengunjung_pelajar_pr'];
			$mahasiswa_lk[] = (float) $value['pengunjung_mahasiswa_lk'];
			$mahasiswa_pr[] = (float) $value['pengunjung_mahasiswa_pr'];
			$umum_lk[] = (float) $value['pengunjung_umum_lk'];
			$umum_pr[] = (float) $value['pengunjung_umum_pr'];
		}
		$data = array(
			'label' => $label,
			'uraian' => $uraian,
			'tahun' => $tahun,
			'pelajar_lk' => $pelajar_lk,
			'pelajar_pr' => $pelajar_pr,
			'mahasiswa_lk' => $mahasiswa_lk,
			'mahasiswa_pr' => $mahasiswa_pr,
			'umum_lk' => $umum_lk,
			'umum_pr' => $umum_pr
		);
		echo json_encode($data);
	}
}
