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

	public function excelDokter(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelDokter($postData);

		echo json_encode($data);
	}
	public function excelObat(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelObat($postData);

		echo json_encode($data);
	}
	public function excelPasien(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelPasien($postData);

		echo json_encode($data);
	}
	public function excelProdusen(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelProdusen($postData);

		echo json_encode($data);
	}
	public function excelRuang(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelRuang($postData);

		echo json_encode($data);
	}
	public function excelTransaksi(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getExcelTransaksi($postData);

		echo json_encode($data);
	}

	public function dimensiDokter(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiDokter($postData);

		echo json_encode($data);
	}
	public function dimensiObat(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiObat($postData);

		echo json_encode($data);
	}
	public function dimensiPasien(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiPasien($postData);

		echo json_encode($data);
	}
	public function dimensiProdusen(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiProdusen($postData);

		echo json_encode($data);
	}
	public function dimensiRuang(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiRuang($postData);

		echo json_encode($data);
	}
	public function dimensiTransaksi(){

		// POST data
		$postData = $this->input->post();

		// Get data
		$data = $this->DataModel->getDimensiTransaksi($postData);

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

	public function excelBulanDokter($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanDokter($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanObat($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanObat($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanPasien($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);

		// Get data
		$data = $this->DataModel->getExcelBulanPasien($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanProdusen($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);
		// Get data
		$data = $this->DataModel->getExcelBulanProdusen($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanRuang($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);
		// Get data
		$data = $this->DataModel->getExcelBulanRuang($postData,$bulan);

		echo json_encode($data);
	}
	public function excelBulanTransaksi($tanggal){

		// POST data
		$postData = $this->input->post();
		$bulan = str_replace('-','/',$tanggal);
		// Get data
		$data = $this->DataModel->getExcelBulanTransaksi($postData,$bulan);

		echo json_encode($data);
	}
}
