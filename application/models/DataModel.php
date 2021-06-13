<?php


class DataModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getFakta($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (id_fact like '%".$searchValue."%' or id_anggota like '%".$searchValue."%' or id_peminjam like'%".$searchValue."%' or id_pengunjung like'%".$searchValue."%' or id_buku like'%".$searchValue."%' or id_waktu like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('fact_peminjaman')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('fact_peminjaman')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('fact_peminjaman')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_fact"=>$record->id_fact,
				"id_anggota"=>$record->id_anggota,
				"id_peminjam"=>$record->id_peminjam,
				"id_pengunjung"=>$record->id_pengunjung,
				"id_buku"=>$record->id_buku,
				"id_waktu"=>$record->id_waktu
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelAnggota($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			anggota_id like '%".$searchValue."%' or 
			anggota_nama like '%".$searchValue."%' or
			anggota_nomor like '%".$searchValue."%' or
			anggota_umum_l like '%".$searchValue."%' or
			anggota_umum_p like '%".$searchValue."%' or
			anggota_mahasiswa_l like '%".$searchValue."%' or
			anggota_mahasiswa_p like '%".$searchValue."%' or
			anggota_pelajar_l like '%".$searchValue."%' or
			anggota_pelajar_l like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_anggota')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_anggota')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_anggota')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"anggota_id"=>$record->anggota_id,
				"anggota_nama"=>$record->anggota_nama,
				"anggota_nomor"=>$record->anggota_nomor,
				"anggota_umum_l"=>$record->anggota_umum_l,
				"anggota_umum_p"=>$record->anggota_umum_p,
				"anggota_mahasiswa_l"=>$record->anggota_mahasiswa_l,
				"anggota_mahasiswa_p"=>$record->anggota_mahasiswa_p,
				"anggota_pelajar_l"=>$record->anggota_pelajar_l,
				"anggota_pelajar_p"=>$record->anggota_pelajar_p,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelBuku($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			buku_id like '%".$searchValue."%' or
			 buku_kode like '%".$searchValue."%' or
			  buku_judul like'%".$searchValue."%' or
			   buku_edisi like'%".$searchValue."%' or
			    buku_penerbit like'%".$searchValue."%' or
			    buku_fisik like'%".$searchValue."%' or
			     buku_subjek like'%".$searchValue."%'
			     ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_buku')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_buku')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_buku')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"buku_id"=>$record->buku_id,
				"buku_kode"=>$record->buku_kode,
				"buku_judul"=>$record->buku_judul,
				"buku_edisi"=>$record->buku_edisi,
				"buku_penerbit"=>$record->buku_penerbit,
				"buku_fisik"=>$record->buku_fisik,
				"buku_subjek"=>$record->buku_subjek,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelPeminjam($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			peminjam_nama like '%".$searchValue."%' or 
			peminjam_no_anggota like '%".$searchValue."%' or 
			peminjam_umum_l like'%".$searchValue."%' or 
			peminjam_umum_p like'%".$searchValue."%'
			peminjam_mahasiswa_l like'%".$searchValue."%'
			peminjam_mahasiswa_p like'%".$searchValue."%'
			peminjam_pelajar_l like'%".$searchValue."%'
			peminjam_pelajar_p like'%".$searchValue."%'
			peminjam_klas_000 like'%".$searchValue."%'
			peminjam_klas_100 like'%".$searchValue."%'
			peminjam_klas_200 like'%".$searchValue."%'
			peminjam_klas_300 like'%".$searchValue."%'
			peminjam_klas_400 like'%".$searchValue."%'
			peminjam_klas_500 like'%".$searchValue."%'
			peminjam_klas_600 like'%".$searchValue."%'
			peminjam_klas_700 like'%".$searchValue."%'
			peminjam_klas_800 like'%".$searchValue."%'
			peminjam_klas_900 like'%".$searchValue."%'
			time like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_peminjam')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_peminjam')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_peminjam')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"peminjam_nama"=>$record->peminjam_nama,
				"peminjam_no_anggota"=>$record->peminjam_no_anggota,
				"peminjam_umum_l"=>$record->peminjam_umum_l,
				"peminjam_umum_p"=>$record->peminjam_umum_p,
				"peminjam_mahasiswa_l"=>$record->peminjam_mahasiswa_l,
				"peminjam_mahasiswa_p"=>$record->peminjam_mahasiswa_p,
				"peminjam_pelajar_l"=>$record->peminjam_pelajar_l,
				"peminjam_pelajar_p"=>$record->peminjam_pelajar_p,
				"peminjam_klas_000"=>$record->peminjam_klas_000,
				"peminjam_klas_100"=>$record->peminjam_klas_100,
				"peminjam_klas_200"=>$record->peminjam_klas_200,
				"peminjam_klas_300"=>$record->peminjam_klas_300,
				"peminjam_klas_400"=>$record->peminjam_klas_400,
				"peminjam_klas_500"=>$record->peminjam_klas_500,
				"peminjam_klas_600"=>$record->peminjam_klas_600,
				"peminjam_klas_700"=>$record->peminjam_klas_700,
				"peminjam_klas_800"=>$record->peminjam_klas_800,
				"peminjam_klas_900"=>$record->peminjam_klas_900,
				"time"=>$record->time,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelPengunjung($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			pengunjung_nama like '%".$searchValue."%' or 
			pengunjung_nik like '%".$searchValue."%' or 
			pengunjung_umum_l like '%".$searchValue."%' or 
			pengunjung_umum_p like '%".$searchValue."%' or 
			pengunjung_mahasiswa_l like '%".$searchValue."%' or 
			pengunjung_mahasiswa_p like '%".$searchValue."%' or 
			pengunjung_pelajar_l like '%".$searchValue."%' or 
			pengunjung_pelajar_p like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_pengunjung')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_pengunjung')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_pengunjung')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"pengunjung_nama"=>$record->pengunjung_nama,
				"pengunjung_nik"=>$record->pengunjung_nik,
				"pengunjung_umum_l"=>$record->pengunjung_umum_l,
				"pengunjung_umum_p"=>$record->pengunjung_umum_p,
				"pengunjung_mahasiswa_l"=>$record->pengunjung_mahasiswa_l,
				"pengunjung_mahasiswa_p"=>$record->pengunjung_mahasiswa_p,
				"pengunjung_pelajar_l"=>$record->pengunjung_pelajar_l,
				"pengunjung_pelajar_p"=>$record->pengunjung_pelajar_p,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelBulanAnggota($postData=null,$tanggal){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			anggota_nama like '%".$searchValue."%' or
			anggota_nomor like '%".$searchValue."%' or
			anggota_umum_l like '%".$searchValue."%' or
			anggota_umum_p like '%".$searchValue."%' or
			anggota_mahasiswa_l like '%".$searchValue."%' or
			anggota_mahasiswa_p like '%".$searchValue."%' or
			anggota_pelajar_l like '%".$searchValue."%' or
			anggota_pelajar_l like '%".$searchValue."%'
			 ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"anggota_nama"=>$record->anggota_nama,
				"anggota_nomor"=>$record->anggota_nomor,
				"anggota_umum_l"=>$record->anggota_umum_l,
				"anggota_umum_p"=>$record->anggota_umum_p,
				"anggota_mahasiswa_l"=>$record->anggota_mahasiswa_l,
				"anggota_mahasiswa_p"=>$record->anggota_mahasiswa_p,
				"anggota_pelajar_l"=>$record->anggota_pelajar_l,
				"anggota_pelajar_p"=>$record->anggota_pelajar_p,
				"aksi"=>'<a href="'.base_url('hapus/'.$tanggal.'/'.$record->anggota_id).'" class="btn btn-sm btn-danger" title="Hapus Data ?"><i class="fa fa-trash"></i></a>',

			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelBulanBuku($postData=null,$tanggal){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			buku_id like '%".$searchValue."%' or
			 buku_kode like '%".$searchValue."%' or
			  buku_judul like'%".$searchValue."%' or
			   buku_edisi like'%".$searchValue."%' or
			    buku_penerbit like'%".$searchValue."%' or
			    buku_fisik like'%".$searchValue."%' or
			     buku_subjek like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		$bulan = str_replace('/','-',$tanggal);
		foreach($records as $record ){

			$data[] = array(
				"buku_id"=>$record->buku_id,
				"buku_kode"=>$record->buku_kode,
				"buku_judul"=>$record->buku_judul,
				"buku_edisi"=>$record->buku_edisi,
				"buku_penerbit"=>$record->buku_penerbit,
				"buku_fisik"=>$record->buku_fisik,
				"buku_subjek"=>$record->buku_subjek,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelBulanPeminjam($postData=null,$tanggal){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			peminjam_nama like '%".$searchValue."%' or 
			peminjam_no_anggota like '%".$searchValue."%' or 
			peminjam_umum_l like'%".$searchValue."%' or 
			peminjam_umum_p like'%".$searchValue."%'
			peminjam_mahasiswa_l like'%".$searchValue."%'
			peminjam_mahasiswa_p like'%".$searchValue."%'
			peminjam_pelajar_l like'%".$searchValue."%'
			peminjam_pelajar_p like'%".$searchValue."%'
			peminjam_klas_000 like'%".$searchValue."%'
			peminjam_klas_100 like'%".$searchValue."%'
			peminjam_klas_200 like'%".$searchValue."%'
			peminjam_klas_300 like'%".$searchValue."%'
			peminjam_klas_400 like'%".$searchValue."%'
			peminjam_klas_500 like'%".$searchValue."%'
			peminjam_klas_600 like'%".$searchValue."%'
			peminjam_klas_700 like'%".$searchValue."%'
			peminjam_klas_800 like'%".$searchValue."%'
			peminjam_klas_900 like'%".$searchValue."%'
			time like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"peminjam_nama"=>$record->peminjam_nama,
				"peminjam_no_anggota"=>$record->peminjam_no_anggota,
				"peminjam_umum_l"=>$record->peminjam_umum_l,
				"peminjam_umum_p"=>$record->peminjam_umum_p,
				"peminjam_mahasiswa_l"=>$record->peminjam_mahasiswa_l,
				"peminjam_mahasiswa_p"=>$record->peminjam_mahasiswa_p,
				"peminjam_pelajar_l"=>$record->peminjam_pelajar_l,
				"peminjam_pelajar_p"=>$record->peminjam_pelajar_p,
				"peminjam_klas_000"=>$record->peminjam_klas_000,
				"peminjam_klas_100"=>$record->peminjam_klas_100,
				"peminjam_klas_200"=>$record->peminjam_klas_200,
				"peminjam_klas_300"=>$record->peminjam_klas_300,
				"peminjam_klas_400"=>$record->peminjam_klas_400,
				"peminjam_klas_500"=>$record->peminjam_klas_500,
				"peminjam_klas_600"=>$record->peminjam_klas_600,
				"peminjam_klas_700"=>$record->peminjam_klas_700,
				"peminjam_klas_800"=>$record->peminjam_klas_800,
				"peminjam_klas_900"=>$record->peminjam_klas_900,
				"time"=>$record->time,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getExcelBulanPengunjung($postData=null,$tanggal){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			pengunjung_nama like '%".$searchValue."%' or 
			pengunjung_nik like '%".$searchValue."%' or 
			pengunjung_umum_l like '%".$searchValue."%' or 
			pengunjung_umum_p like '%".$searchValue."%' or 
			pengunjung_mahasiswa_l like '%".$searchValue."%' or 
			pengunjung_mahasiswa_p like '%".$searchValue."%' or 
			pengunjung_pelajar_l like '%".$searchValue."%' or 
			pengunjung_pelajar_p like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_fact');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->like('time',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"pengunjung_nama"=>$record->pengunjung_nama,
				"pengunjung_nik"=>$record->pengunjung_nik,
				"pengunjung_umum_l"=>$record->pengunjung_umum_l,
				"pengunjung_umum_p"=>$record->pengunjung_umum_p,
				"pengunjung_mahasiswa_l"=>$record->pengunjung_mahasiswa_l,
				"pengunjung_mahasiswa_p"=>$record->pengunjung_mahasiswa_p,
				"pengunjung_pelajar_l"=>$record->pengunjung_pelajar_l,
				"pengunjung_pelajar_p"=>$record->pengunjung_pelajar_p,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getDimensiAnggota($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			id_anggota like '%".$searchValue."%' or 
			nama_anggota like '%".$searchValue."%'
			nomor_anggota like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_anggota')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_anggota')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_anggota')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_anggota"=>$record->id_anggota,
				"nama_anggota"=>$record->nama_anggota,
				"nomor_anggota"=>$record->nomor_anggota,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getDimensiBuku($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			id_buku like '%".$searchValue."%' or 
			kode_buku like '%".$searchValue."%' or 
			judul_buku like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_buku')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_buku')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_buku')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_buku"=>$record->id_buku,
				"kode_buku"=>$record->kode_buku,
				"judul_buku"=>$record->judul_buku,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getDimensiPeminjam($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			id_peminjam like '%".$searchValue."%' or 
			nama_peminjam like '%".$searchValue."%' or 
			nomor_anggota like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_peminjam')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_peminjam')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_peminjam')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_peminjam"=>$record->id_peminjam,
				"nama_peminjam"=>$record->nama_peminjam,
				"nomor_anggota"=>$record->nomor_anggota,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getDimensiPengunjung($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			id_pengunjung like '%".$searchValue."%' or 
			nama_pengunjung like '%".$searchValue."%'
			nik_pengunjung like '%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_pengunjung')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_pengunjung')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_pengunjung')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_pengunjung"=>$record->id_pengunjung,
				"nama_pengunjung"=>$record->nama_pengunjung,
				"nik_pengunjung"=>$record->nik_pengunjung,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getDimensiWaktu($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			id_waktu like '%".$searchValue."%' or 
			waktu like'%".$searchValue."%' or 
			hari_waktu like'%".$searchValue."%' or 
			bulan_waktu like'%".$searchValue."%' or 
			tahun_waktu like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_waktu')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_waktu')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_waktu')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_waktu"=>$record->id_waktu,
				"waktu"=>$record->waktu,
				"hari_waktu"=>$record->hari_waktu,
				"bulan_waktu"=>$record->bulan_waktu,
				"tahun_waktu"=>$record->tahun_waktu,
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}

	function getLaporan($postData=null){

		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		## Search
		$searchQuery = "";
		if($searchValue != ''){
			$searchQuery = " (
			anggota_nama like '%".$searchValue."%' or 
			anggota_nomor like'%".$searchValue."%' or 
			buku_judul like'%".$searchValue."%' or 
			buku_kode like'%".$searchValue."%' or 
			buku_edisi like'%".$searchValue."%' or 
			buku_penerbit like'%".$searchValue."%' or 
			time like'%".$searchValue."%'
			) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('dim_waktu','dim_waktu.id_waktu = fact_peminjaman.id_waktu');
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('dim_waktu','dim_waktu.id_waktu = fact_peminjaman.id_waktu');
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_peminjaman');
		$this->db->join('excel_anggota','excel_anggota.anggota_id = fact_peminjaman.id_anggota');
		$this->db->join('excel_buku','excel_buku.buku_id = fact_peminjaman.id_buku');
		$this->db->join('excel_peminjam','excel_peminjam.peminjam_id = fact_peminjaman.id_peminjam');
		$this->db->join('excel_pengunjung','excel_pengunjung.pengunjung_id = fact_peminjaman.id_pengunjung');
		$this->db->join('dim_waktu','dim_waktu.id_waktu = fact_peminjaman.id_waktu');
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			if ($record->anggota_umum_l != null){
				$status = 'umum';
				$jenis_kelamin = 'laki-laki';
			}elseif ($record->anggota_umum_p != null){
				$status = 'umum';
				$jenis_kelamin = 'perempuan';
			}elseif ($record->anggota_mahasiswa_l != null){
				$status = 'mahasiswa';
				$jenis_kelamin = 'laki-laki';
			}elseif ($record->anggota_mahasiswa_p != null){
				$status = 'mahasiswa';
				$jenis_kelamin = 'laki-laki';
			}elseif ($record->anggota_pelajar_l != null){
				$status = 'pelajar';
				$jenis_kelamin = 'laki-laki';
			}elseif ($record->anggota_pelajar_p != null){
				$status = 'pelajar';
				$jenis_kelamin = 'perempuan';
			}

			$data[] = array(
				"anggota_nama"=>$record->anggota_nama,
				"anggota_nomor"=>$record->anggota_nomor,
				"anggota_jenis_kelamin"=>ucwords($jenis_kelamin),
				"anggota_status"=>ucwords($status),
				"buku_judul"=>$record->buku_judul,
				"buku_kode"=>$record->buku_kode,
				"buku_edisi"=>$record->buku_edisi,
				"buku_penerbit"=>$record->buku_penerbit,
				"time"=>$record->time,
			);
		}



		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);

		return $response;
	}
}
