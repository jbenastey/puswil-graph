<?php

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Reader;


class ProsesController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProsesModel','proses');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}
	public function upload(){
		if (isset($_POST['upload'])){
			$upload = $this->proses->upload_excel('excel');
			if ($upload['result'] == 'success'){
				$reader = new Reader\Xlsx();
				$reader->setLoadSheetsOnly('pengunjung');
				$spreadsheet = $reader->load(FCPATH.'excel/import/'.$upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true ,true);
//				var_dump($sheet);
				$data = array();
				$numrow = 1;
				foreach($sheet as $row){
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if($numrow > 3){
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'pengunjung_nama'=>$row['A'],
							'pengunjung_nik'=>$row['B'],
							'pengunjung_umum_l'=>$row['C'],
							'pengunjung_umum_p'=>$row['D'],
							'pengunjung_mahasiswa_l'=>$row['E'],
							'pengunjung_mahasiswa_p'=>$row['F'],
							'pengunjung_pelajar_l'=>$row['G'],
							'pengunjung_pelajar_p'=>$row['H'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}
				$this->proses->insert_pengunjung($data);
//				var_dump($data);

				$reader->setLoadSheetsOnly('anggota');
				$spreadsheet = $reader->load(FCPATH.'excel/import/'.$upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true ,true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach($sheet as $row){
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if($numrow > 3){
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'anggota_nama'=>$row['A'],
							'anggota_nomor'=>$row['B'],
							'anggota_umum_l'=>$row['C'],
							'anggota_umum_p'=>$row['D'],
							'anggota_mahasiswa_l'=>$row['E'],
							'anggota_mahasiswa_p'=>$row['F'],
							'anggota_pelajar_l'=>$row['G'],
							'anggota_pelajar_p'=>$row['H'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_anggota($data);

				$reader->setLoadSheetsOnly('buku');
				$spreadsheet = $reader->load(FCPATH.'excel/import/'.$upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true ,true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach($sheet as $row){
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if($numrow > 1){
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'buku_id'=>$row['A'],
							'buku_judul'=>$row['B'],
							'buku_edisi'=>$row['C'],
							'buku_penerbit'=>$row['D'],
							'buku_fisik'=>$row['E'],
							'buku_subjek'=>$row['F'],
							'buku_eksemplar'=>$row['G'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_buku($data);

				$reader->setLoadSheetsOnly('peminjam');
				$spreadsheet = $reader->load(FCPATH.'excel/import/'.$upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true ,true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach($sheet as $row){
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if($numrow > 3){
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'peminjam_nama'=>$row['A'],
							'peminjam_no_anggota'=>$row['B'],
							'peminjam_umum_l'=>$row['C'],
							'peminjam_umum_p'=>$row['D'],
							'peminjam_mahasiswa_l'=>$row['E'],
							'peminjam_mahasiswa_p'=>$row['F'],
							'peminjam_pelajar_l'=>$row['G'],
							'peminjam_pelajar_p'=>$row['H'],
							'peminjam_klas_000'=>$row['I'],
							'peminjam_klas_100'=>$row['J'],
							'peminjam_klas_200'=>$row['K'],
							'peminjam_klas_300'=>$row['L'],
							'peminjam_klas_400'=>$row['M'],
							'peminjam_klas_500'=>$row['N'],
							'peminjam_klas_600'=>$row['O'],
							'peminjam_klas_700'=>$row['P'],
							'peminjam_klas_800'=>$row['Q'],
							'peminjam_klas_900'=>$row['R'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_peminjam($data);

					redirect('mentah');
			}
		}
	}

	public function excel(){
		$data = array(
			'anggota' => $this->proses->lihat('excel_anggota'),
			'buku' => $this->proses->lihat('excel_buku'),
			'peminjam' => $this->proses->lihat('excel_peminjam'),
			'pengunjung' => $this->proses->lihat('excel_pengunjung'),
		);
		$this->load->view('templates/header');
		$this->load->view('excel/index', $data);
		$this->load->view('templates/footer');
	}
	public function dimensi(){
		$data = array(
			'anggota' => $this->proses->lihat('excel_anggota'),
			'buku' => $this->proses->lihat('excel_buku'),
			'peminjam' => $this->proses->lihat('excel_peminjam'),
			'pengunjung' => $this->proses->lihat('excel_pengunjung'),
		);
		$this->load->view('templates/header');
		$this->load->view('dimensi/index', $data);
		$this->load->view('templates/footer');
	}
}
