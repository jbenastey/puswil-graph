<?php


class DataController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProsesModel', 'proses');
		$this->load->model('DataModel');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function fakta(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getFakta($postData);

		echo json_encode($data);
	}

	public function excelAnggota(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelAnggota($postData);

		echo json_encode($data);
	}
	public function excelBuku(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelBuku($postData);

		echo json_encode($data);
	}
	public function excelPeminjam(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelPeminjam($postData);

		echo json_encode($data);
	}
	public function excelPengunjung(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelPengunjung($postData);

		echo json_encode($data);
	}

	public function dimensiAnggota(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiAnggota($postData);

		echo json_encode($data);
	}
	public function dimensiBuku(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiBuku($postData);

		echo json_encode($data);
	}
	public function dimensiPeminjam(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiPeminjam($postData);

		echo json_encode($data);
	}
	public function dimensiPengunjung(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiPengunjung($postData);

		echo json_encode($data);
	}
	public function dimensiWaktu(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiWaktu($postData);

		echo json_encode($data);
	}

	public function laporan(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getLaporan($postData);

		echo json_encode($data);
	}

	public function excelBulan(){
		$data['getHapus'] = $this->proses->getHapus();
		$this->load->view('template/header');
		$this->load->view('excel/pilih_bulan',$data);
		$this->load->view('template/footer');
	}

	public function lihatExcelPerbulan($tanggal){
		$data['bulan'] = $tanggal;
		$this->load->view('template/header');
		$this->load->view('excel/index_bulan',$data);
		$this->load->view('template/footer');
	}

	public function excelBulanAnggota($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanAnggota($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanBuku($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanBuku($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanPeminjam($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanPeminjam($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanPengunjung($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);
		// Get data
		$data = $this->DataModel->getExcelBulanPengunjung($postData,$bulan);

		echo json_encode($data);
	}
}
