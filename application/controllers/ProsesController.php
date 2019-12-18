<?php

require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader;


class ProsesController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProsesModel', 'proses');

		if (!$this->session->has_userdata('pengguna_id')) {
			redirect(base_url('login'));
		}
	}

	public function upload()
	{
		if (isset($_POST['upload'])) {
			$upload = $this->proses->upload_excel('excel');
			if ($upload['result'] == 'success') {
				$reader = new Reader\Xlsx();
				$reader->setLoadSheetsOnly('pengunjung');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 3) {
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'pengunjung_nama' => $row['A'],
							'pengunjung_nik' => $row['B'],
							'pengunjung_umum_l' => $row['C'],
							'pengunjung_umum_p' => $row['D'],
							'pengunjung_mahasiswa_l' => $row['E'],
							'pengunjung_mahasiswa_p' => $row['F'],
							'pengunjung_pelajar_l' => $row['G'],
							'pengunjung_pelajar_p' => $row['H'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}
				$this->proses->insert_pengunjung($data);
//				var_dump($data);

				$reader->setLoadSheetsOnly('anggota');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 3) {
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'anggota_nama' => $row['A'],
							'anggota_nomor' => $row['B'],
							'anggota_umum_l' => $row['C'],
							'anggota_umum_p' => $row['D'],
							'anggota_mahasiswa_l' => $row['E'],
							'anggota_mahasiswa_p' => $row['F'],
							'anggota_pelajar_l' => $row['G'],
							'anggota_pelajar_p' => $row['H'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_anggota($data);

				$reader->setLoadSheetsOnly('buku');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 1) {
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'buku_kode' => $row['A'],
							'buku_judul' => $row['B'],
							'buku_edisi' => $row['C'],
							'buku_penerbit' => $row['D'],
							'buku_fisik' => $row['E'],
							'buku_subjek' => $row['F'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_buku($data);

				$reader->setLoadSheetsOnly('peminjam');
				$spreadsheet = $reader->load(FCPATH . 'excel/import/' . $upload['file']['file_name']);
				$sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
//				var_dump($sheet);die;
				$data = array();
				$numrow = 1;
				foreach ($sheet as $row) {
					// Cek $numrow apakah lebih dari 1
					// Artinya karena baris pertama adalah nama-nama kolom
					// Jadi dilewat saja, tidak usah diimport
					if ($numrow > 3) {
						// Kita push (add) array data ke variabel data
						array_push($data, array(
							'peminjam_nama' => $row['A'],
							'peminjam_no_anggota' => $row['B'],
							'peminjam_umum_l' => $row['C'],
							'peminjam_umum_p' => $row['D'],
							'peminjam_mahasiswa_l' => $row['E'],
							'peminjam_mahasiswa_p' => $row['F'],
							'peminjam_pelajar_l' => $row['G'],
							'peminjam_pelajar_p' => $row['H'],
							'peminjam_klas_000' => $row['I'],
							'peminjam_klas_100' => $row['J'],
							'peminjam_klas_200' => $row['K'],
							'peminjam_klas_300' => $row['L'],
							'peminjam_klas_400' => $row['M'],
							'peminjam_klas_500' => $row['N'],
							'peminjam_klas_600' => $row['O'],
							'peminjam_klas_700' => $row['P'],
							'peminjam_klas_800' => $row['Q'],
							'peminjam_klas_900' => $row['R'],
							'time' => $row['S'],
						));
					}

					$numrow++; // Tambah 1 setiap kali looping
				}

				$this->proses->insert_peminjam($data);

				redirect('mentah');
			}
		}
	}

	public function excel()
	{
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

	public function dimensi()
	{
		$data = array(
			'anggota' => $this->proses->lihat('dim_anggota'),
			'buku' => $this->proses->lihat('dim_buku'),
			'peminjam' => $this->proses->lihat('dim_peminjam'),
			'pengunjung' => $this->proses->lihat('dim_pengunjung'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);
		$this->load->view('templates/header');
		$this->load->view('dimensi/index', $data);
		$this->load->view('templates/footer');
	}

	public function refresh()
	{
		$data = array(
			'anggota' => $this->proses->lihat('excel_anggota'),
			'buku' => $this->proses->lihat('excel_buku'),
			'peminjam' => $this->proses->lihat('excel_peminjam'),
			'pengunjung' => $this->proses->lihat('excel_pengunjung'),
		);

		$dimensiLama = array(
			'anggota' => $this->proses->lihat('dim_anggota'),
			'buku' => $this->proses->lihat('dim_buku'),
			'peminjam' => $this->proses->lihat('dim_peminjam'),
			'pengunjung' => $this->proses->lihat('dim_pengunjung'),
		);

		$dataDimensi = array(
			'anggota' => array(),
			'buku' => array(),
			'peminjam' => array(),
			'pengunjung' => array(),
			'waktu' => array(),
		);
		//---------------------------------------------------------------------------------
		if (count($data['anggota']) == 0) {
			foreach ($data['anggota'] as $key => $value) {
				array_push($dataDimensi['anggota'], array(
					'id_anggota' => $value['anggota_id'],
					'nama_anggota' => $value['anggota_nama'],
					'nomor_anggota' => $value['anggota_nomor'],
				));
			}
			$this->proses->insert_dimensi('dim_anggota', $dataDimensi['anggota']);
		} elseif (count($data['anggota']) == count($dimensiLama['anggota'])) {
			$dataDimensi['anggota'] = null;
		} else {
			foreach ($dimensiLama['anggota'] as $key => $value) {
				if ($value['id_anggota'] == $data['anggota'][$key]['anggota_id']) {
					unset($data['anggota'][$key]);
				}
			}
			foreach ($data['anggota'] as $key => $value) {
				array_push($dataDimensi['anggota'], array(
					'id_anggota' => $value['anggota_id'],
					'nama_anggota' => $value['anggota_nama'],
					'nomor_anggota' => $value['anggota_nomor'],
				));
			}
			$this->proses->insert_dimensi('dim_anggota', $dataDimensi['anggota']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['buku']) == 0) {
			foreach ($data['buku'] as $key => $value) {
				array_push($dataDimensi['buku'], array(
					'id_buku' => $value['buku_id'],
					'kode_buku' => $value['buku_kode'],
					'judul_buku' => $value['buku_judul'],
				));
			}
			$this->proses->insert_dimensi('dim_buku', $dataDimensi['buku']);
		} elseif (count($data['buku']) == count($dimensiLama['buku'])) {
			$dataDimensi['buku'] = null;
		} else {
			foreach ($dimensiLama['buku'] as $key => $value) {
				if ($value['id_buku'] == $data['buku'][$key]['buku_id']) {
					unset($data['buku'][$key]);
				}
			}
			foreach ($data['buku'] as $key => $value) {
				array_push($dataDimensi['buku'], array(
					'id_buku' => $value['buku_id'],
					'kode_buku' => $value['buku_kode'],
					'judul_buku' => $value['buku_judul'],
				));
			}
			$this->proses->insert_dimensi('dim_buku', $dataDimensi['buku']);
		}
		//---------------------------------------------------------------------------------
		if (count($data['peminjam']) == 0) {
			foreach ($data['peminjam'] as $key => $value) {
				array_push($dataDimensi['peminjam'], array(
					'id_peminjam' => $value['peminjam_id'],
					'nama_peminjam' => $value['peminjam_nama'],
					'nomor_anggota' => $value['peminjam_no_anggota'],
				));
				$waktu = $value['time'];
				$pecah = explode('-',$waktu);
				array_push($dataDimensi['waktu'], array(
					'waktu' => date('H:i:s'),
					'hari_waktu' => $this->hari(date('l')),
					'bulan_waktu' => $pecah[0],
					'tahun_waktu' => $pecah[1],
				));
			}
			$this->proses->insert_dimensi('dim_peminjam', $dataDimensi['peminjam']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		} elseif (count($data['peminjam']) == count($dimensiLama['peminjam'])) {
			$dataDimensi['peminjam'] = null;
		} else {
			foreach ($dimensiLama['peminjam'] as $key => $value) {
				if ($value['id_peminjam'] == $data['peminjam'][$key]['peminjam_id']) {
					unset($data['peminjam'][$key]);
				}
			}
			foreach ($data['peminjam'] as $key => $value) {
				array_push($dataDimensi['peminjam'], array(
					'id_peminjam' => $value['peminjam_id'],
					'nama_peminjam' => $value['peminjam_nama'],
					'nomor_anggota' => $value['peminjam_no_anggota'],
				));
				$waktu = $value['time'];
				$pecah = explode('-',$waktu);
				array_push($dataDimensi['waktu'], array(
					'waktu' => date('H:i:s'),
					'hari_waktu' => $this->hari(date('l')),
					'bulan_waktu' => $pecah[0],
					'tahun_waktu' => $pecah[1],
				));
			}
			$this->proses->insert_dimensi('dim_peminjam', $dataDimensi['peminjam']);
			$this->proses->insert_dimensi('dim_waktu', $dataDimensi['waktu']);
		}
		//---------------------------------------------------------------------------------

		if (count($data['pengunjung']) == 0) {
			foreach ($data['pengunjung'] as $key => $value) {
				array_push($dataDimensi['pengunjung'], array(
					'id_pengunjung' => $value['pengunjung_id'],
					'nama_pengunjung' => $value['pengunjung_nama'],
					'nik_pengunjung' => $value['pengunjung_nik'],
				));
			}
			$this->proses->insert_dimensi('dim_pengunjung', $dataDimensi['pengunjung']);
		} elseif (count($data['pengunjung']) == count($dimensiLama['pengunjung'])) {
			$dataDimensi['pengunjung'] = null;
		} else {
			foreach ($dimensiLama['pengunjung'] as $key => $value) {
				if ($value['id_pengunjung'] == $data['pengunjung'][$key]['pengunjung_id']) {
					unset($data['pengunjung'][$key]);
				}
			}
			foreach ($data['pengunjung'] as $key => $value) {
				array_push($dataDimensi['pengunjung'], array(
					'id_pengunjung' => $value['pengunjung_id'],
					'nama_pengunjung' => $value['pengunjung_nama'],
					'nik_pengunjung' => $value['pengunjung_nik'],
				));
			}
			$this->proses->insert_dimensi('dim_pengunjung', $dataDimensi['pengunjung']);
		}
		//---------------------------------------------------------------------------------


		redirect('dimensi');
	}

	public function fakta(){
		$data = array(
			'fakta' => $this->proses->lihat('fact_peminjaman')
		);
		$this->load->view('templates/header');
		$this->load->view('fakta/index', $data);
		$this->load->view('templates/footer');
	}

	public function refreshFakta(){
		$data = $this->proses->lihat('fact_peminjaman');

		$dataDimensi = array(
			'anggota' => $this->proses->lihat('dim_anggota'),
			'buku' => $this->proses->lihat('dim_buku'),
			'peminjam' => $this->proses->lihat('dim_peminjam'),
			'pengunjung' => $this->proses->lihat('dim_pengunjung'),
			'waktu' => $this->proses->lihat('dim_waktu'),
		);

		$dataFakta = array();

		if (count($data) == 0){
			foreach ($dataDimensi['anggota'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_anggota' => $value['id_anggota'],
					'id_peminjam' => $dataDimensi['peminjam'][$key]['id_peminjam'],
					'id_pengunjung' => $dataDimensi['pengunjung'][$key]['id_pengunjung'],
					'id_buku' => $dataDimensi['buku'][$key]['id_buku'],
					'id_waktu' => $dataDimensi['waktu'][$key]['id_waktu'],
				));
			}
			$this->proses->insert_dimensi('fact_peminjaman', $dataFakta);
		} elseif (count($data) == count($dataDimensi['anggota'])) {
			$dataFakta = null;
		} else {
//			var_dump('asdad');die;
//			var_dump($dataDimensi);
			foreach ($data as $key => $value) {
				if ($value['id_anggota'] == $dataDimensi['anggota'][$key]['id_anggota']) {
					unset($dataDimensi['anggota'][$key]);
					unset($dataDimensi['peminjam'][$key]);
					unset($dataDimensi['pengunjung'][$key]);
					unset($dataDimensi['buku'][$key]);
					unset($dataDimensi['waktu'][$key]);
				}
			}
//			var_dump($dataDimensi);
			foreach ($dataDimensi['anggota'] as $key=>$value) {
				array_push($dataFakta, array(
					'id_anggota' => $dataDimensi['anggota'][$key]['id_anggota'],
					'id_peminjam' => $dataDimensi['peminjam'][$key]['id_peminjam'],
					'id_pengunjung' => $dataDimensi['pengunjung'][$key]['id_pengunjung'],
					'id_buku' => $dataDimensi['buku'][$key]['id_buku'],
					'id_waktu' => $dataDimensi['waktu'][$key]['id_waktu'],
				));
			}
			$this->proses->insert_dimensi('fact_peminjaman', $dataFakta);
		}
//		echo "<pre>";
//		print_r ($dataFakta);
//		echo "</pre>";die;
		redirect('fakta');
	}

	//-----------------------------------------------------------------------------------------
	function hari($days){
		$hari = array(
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu',
			'Sunday' => 'Minggu',
		);
		return $hari[$days];
	}
	//-----------------------------------------------------------------------------------------

	public function grafik_anggota(){
		$anggota = $this->proses->lihat('excel_anggota');
		$data = array(
			'umum' => 0,
			'mahasiswa' => 0,
			'pelajar' => 0,
			'pria' => 0,
			'wanita' => 0,
		);
		foreach ($anggota as $key=>$value) {
			if ($value['anggota_umum_l'] != null){
				$data['umum'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_umum_p'] != null){
				$data['umum'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['anggota_mahasiswa_l'] != null){
				$data['mahasiswa'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_mahasiswa_p'] != null){
				$data['mahasiswa'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['anggota_pelajar_l'] != null){
				$data['pelajar'] += 1;
				$data['pria'] += 1;
			}elseif ($value['anggota_pelajar_p'] != null){
				$data['pelajar'] += 1;
				$data['wanita'] += 1;
			}
		}
		echo json_encode($data);
	}

	public function grafik_pengunjung(){
		$pengunjung = $this->proses->lihat('excel_pengunjung');
		$data = array(
			'umum' => 0,
			'mahasiswa' => 0,
			'pelajar' => 0,
			'pria' => 0,
			'wanita' => 0,
		);
		foreach ($pengunjung as $key=>$value) {
			if ($value['pengunjung_umum_l'] != null){
				$data['umum'] += 1;
				$data['pria'] += 1;
			}elseif ($value['pengunjung_umum_p'] != null){
				$data['umum'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['pengunjung_mahasiswa_l'] != null){
				$data['mahasiswa'] += 1;
				$data['pria'] += 1;
			}elseif ($value['pengunjung_mahasiswa_p'] != null){
				$data['mahasiswa'] += 1;
				$data['wanita'] += 1;
			}elseif ($value['pengunjung_pelajar_l'] != null){
				$data['pelajar'] += 1;
				$data['pria'] += 1;
			}elseif ($value['pengunjung_pelajar_p'] != null){
				$data['pelajar'] += 1;
				$data['wanita'] += 1;
			}
		}
		echo json_encode($data);
	}

	public function grafik_waktu($tahun){
		$waktu = $this->proses->lihat('dim_waktu');
		$data = array(
			'jan' => 0,
			'feb' => 0,
			'mar' => 0,
			'apr' => 0,
			'mei' => 0,
			'jun' => 0,
			'jul' => 0,
			'agu' => 0,
			'sep' => 0,
			'okt' => 0,
			'nov' => 0,
			'des' => 0,
		);
		foreach ($waktu as $key=>$value) {
			if ($value['tahun_waktu'] == $tahun){
				if ($value['bulan_waktu'] == '01'){
					$data['jan']++;
				}elseif ($value['bulan_waktu'] == '02'){
					$data['feb']++;
				}elseif ($value['bulan_waktu'] == '03'){
					$data['mar']++;
				}elseif ($value['bulan_waktu'] == '04'){
					$data['apr']++;
				}elseif ($value['bulan_waktu'] == '05'){
					$data['mei']++;
				}elseif ($value['bulan_waktu'] == '06'){
					$data['jun']++;
				}elseif ($value['bulan_waktu'] == '07'){
					$data['jul']++;
				}elseif ($value['bulan_waktu'] == '08'){
					$data['agu']++;
				}elseif ($value['bulan_waktu'] == '09'){
					$data['sep']++;
				}elseif ($value['bulan_waktu'] == '10'){
					$data['okt']++;
				}elseif ($value['bulan_waktu'] == '11'){
					$data['nov']++;
				}elseif ($value['bulan_waktu'] == '12'){
					$data['des']++;
				}
			}
		}
		echo json_encode($data);
	}

	public function terbanyak(){
		$data = array(
			'buku' => $this->proses->buku_terbanyak(),
			'pinjam' => $this->proses->pinjam_terbanyak(),
			'anggota' => $this->proses->anggota_terbanyak(),
			'pengunjung' => $this->proses->pengunjung_terbanyak(),
		);
		echo json_encode($data);
	}
}
