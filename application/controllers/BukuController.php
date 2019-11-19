<?php

class BukuController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('BukuModel');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}
	public function index(){
		$data = array(
			'buku' => $this->BukuModel->lihat_semua()
		);
		$this->load->view('templates/header');
		$this->load->view('buku/index',$data);
		$this->load->view('templates/footer');
	}
	public function tambah(){
		if (isset($_POST['simpan'])){
			$data = array(
				'buku_kategori' => $this->input->post('kategori'),
				'buku_kode_klasifikasi' => $this->input->post('kode'),
				'buku_jumlah_judul' => $this->input->post('judul'),
				'buku_jumlah_eksemplar' => $this->input->post('eksemplar'),
			);
			$this->BukuModel->tambah_buku($data);
			redirect('buku');
		} else {
			$this->load->view('templates/header');
			$this->load->view('buku/tambah');
			$this->load->view('templates/footer');
		}
	}
	public function edit($id){
		if (isset($_POST['ubah'])){
			$data = array(
				'buku_kategori' => $this->input->post('kategori'),
				'buku_kode_klasifikasi' => $this->input->post('kode'),
				'buku_jumlah_judul' => $this->input->post('judul'),
				'buku_jumlah_eksemplar' => $this->input->post('eksemplar'),
			);
			$this->BukuModel->edit_buku($id,$data);
			redirect('buku');
		} else {
			$data = array(
				'buku' => $this->BukuModel->lihat_satu($id)
			);
			$this->load->view('templates/header');
			$this->load->view('buku/edit',$data);
			$this->load->view('templates/footer');
		}
	}
	public function hapus($id){
		$this->BukuModel->hapus_buku($id);
		redirect('buku');
	}
	public function grafik(){
		$this->load->view('templates/header');
		$this->load->view('buku/grafik');
		$this->load->view('templates/footer');
	}
	public function dataGrafik(){
		$buku = $this->BukuModel->lihat_semua();

		foreach($buku as $value){
			$kategori[] = $value['buku_kategori'];
			$kode[] = $value['buku_kode_klasifikasi'];
			$judul[] = (float) $value['buku_jumlah_judul'];
			$eksemplar[] = (float) $value['buku_jumlah_eksemplar'];
		}
		$data = array(
			'kategori' => $kategori,
			'kode' => $kode,
			'judul' => $judul,
			'eksemplar' => $eksemplar
		);
		echo json_encode($data);
	}
}
