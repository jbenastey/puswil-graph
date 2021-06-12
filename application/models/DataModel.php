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
			$searchQuery = " (id_fact like '%".$searchValue."%' or id_dokter like '%".$searchValue."%' or id_obat like'%".$searchValue."%' or id_pasien like'%".$searchValue."%' or id_produsen like'%".$searchValue."%' or id_ruang like'%".$searchValue."%' or id_transaksi like'%".$searchValue."%' or id_waktu like'%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('fact_penjualan')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('fact_penjualan')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('fact_penjualan')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"id_fact"=>$record->id_fact,
				"id_dokter"=>$record->id_dokter,
				"id_obat"=>$record->id_obat,
				"id_pasien"=>$record->id_pasien,
				"id_produsen"=>$record->id_produsen,
				"id_ruang"=>$record->id_ruang,
				"id_transaksi"=>$record->id_transaksi,
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

	function getExcelDokter($postData=null){

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
			$searchQuery = " (dokter_id like '%".$searchValue."%' or dokter_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_dokter')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_dokter')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_dokter')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"dokter_id"=>$record->dokter_id,
				"dokter_nama"=>$record->dokter_nama,
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

	function getExcelObat($postData=null){

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
			$searchQuery = " (obat_id like '%".$searchValue."%' or obat_kode like '%".$searchValue."%' or obat_nama like'%".$searchValue."%' or obat_golongan like'%".$searchValue."%' or obat_bentuk like'%".$searchValue."%' or obat_depo like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_obat')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_obat')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_obat')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"obat_id"=>$record->obat_id,
				"obat_kode"=>$record->obat_kode,
				"obat_nama"=>$record->obat_nama,
				"obat_golongan"=>$record->obat_golongan,
				"obat_bentuk"=>$record->obat_bentuk,
				"obat_depo"=>$record->obat_depo,
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

	function getExcelPasien($postData=null){

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
			$searchQuery = " (pasien_id like '%".$searchValue."%' or pasien_nama like '%".$searchValue."%' or pasien_jenis_kelamin like'%".$searchValue."%' or pasien_umur like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_pasien')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_pasien')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_pasien')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"pasien_id"=>$record->pasien_id,
				"pasien_nama"=>$record->pasien_nama,
				"pasien_jenis_kelamin"=>$record->pasien_jenis_kelamin,
				"pasien_umur"=>$record->pasien_umur,
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

	function getExcelProdusen($postData=null){

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
			$searchQuery = " (produsen_id like '%".$searchValue."%' or produsen_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_produsen')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_produsen')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_produsen')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"produsen_id"=>$record->produsen_id,
				"produsen_nama"=>$record->produsen_nama,
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

	function getExcelRuang($postData=null){

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
			$searchQuery = " (ruang_id like '%".$searchValue."%' or ruang_poliklinik like '%".$searchValue."%' or ruang_jenis_masuk like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_ruang')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_ruang')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_ruang')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"ruang_id"=>$record->ruang_id,
				"ruang_poliklinik"=>$record->ruang_poliklinik,
				"ruang_jenis_masuk"=>$record->ruang_jenis_masuk,
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

	function getExcelTransaksi($postData=null){

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
			$searchQuery = " (transaksi_id like '%".$searchValue."%' or transaksi_kelompok like '%".$searchValue."%' or transaksi_harga like'%".$searchValue."%' or transaksi_jumlah like'%".$searchValue."%' or transaksi_cara_bayar like'%".$searchValue."%' or transaksi_tanggal like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_transaksi')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('excel_transaksi')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('excel_transaksi')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"transaksi_id"=>$record->transaksi_id,
				"transaksi_kelompok"=>$record->transaksi_kelompok,
				"transaksi_harga"=>'Rp. '.$record->transaksi_harga,
				"transaksi_jumlah"=>$record->transaksi_jumlah,
				"transaksi_cara_bayar"=>$record->transaksi_cara_bayar,
				"transaksi_tanggal"=>$record->transaksi_tanggal,
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

	function getExcelBulanDokter($postData=null,$tanggal){

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
			$searchQuery = " (dokter_id like '%".$searchValue."%' or dokter_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"dokter_id"=>$record->dokter_id,
				"dokter_nama"=>$record->dokter_nama,
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

	function getExcelBulanObat($postData=null,$tanggal){

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
			$searchQuery = " (obat_id like '%".$searchValue."%' or obat_kode like '%".$searchValue."%' or obat_nama like'%".$searchValue."%' or obat_golongan like'%".$searchValue."%' or obat_bentuk like'%".$searchValue."%' or obat_depo like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		$bulan = str_replace('/','-',$tanggal);
		foreach($records as $record ){

			$data[] = array(
				"obat_id"=>$record->obat_id,
				"obat_kode"=>$record->obat_kode,
				"obat_nama"=>$record->obat_nama,
				"obat_golongan"=>$record->obat_golongan,
				"obat_bentuk"=>$record->obat_bentuk,
				"obat_depo"=>$record->obat_depo,
				"aksi"=>'<a href="'.base_url('hapus/'.$bulan.'/'.$record->obat_id).'" class="btn btn-sm btn-danger" title="Hapus Data ?"><i class="fa fa-trash"></i></a>',
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

	function getExcelBulanPasien($postData=null,$tanggal){

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
			$searchQuery = " (pasien_id like '%".$searchValue."%' or pasien_nama like '%".$searchValue."%' or pasien_jenis_kelamin like'%".$searchValue."%' or pasien_umur like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"pasien_id"=>$record->pasien_id,
				"pasien_nama"=>$record->pasien_nama,
				"pasien_jenis_kelamin"=>$record->pasien_jenis_kelamin,
				"pasien_umur"=>$record->pasien_umur,
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

	function getExcelBulanProdusen($postData=null,$tanggal){

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
			$searchQuery = " (produsen_id like '%".$searchValue."%' or produsen_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('excel_produsen')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"produsen_id"=>$record->produsen_id,
				"produsen_nama"=>$record->produsen_nama,
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

	function getExcelBulanRuang($postData=null,$tanggal){

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
			$searchQuery = " (ruang_id like '%".$searchValue."%' or ruang_poliklinik like '%".$searchValue."%' or ruang_jenis_masuk like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"ruang_id"=>$record->ruang_id,
				"ruang_poliklinik"=>$record->ruang_poliklinik,
				"ruang_jenis_masuk"=>$record->ruang_jenis_masuk,
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

	function getExcelBulanTransaksi($postData=null,$tanggal){

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
			$searchQuery = " (transaksi_id like '%".$searchValue."%' or transaksi_kelompok like '%".$searchValue."%' or transaksi_harga like'%".$searchValue."%' or transaksi_jumlah like'%".$searchValue."%' or transaksi_cara_bayar like'%".$searchValue."%' or transaksi_tanggal like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('excel_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('excel_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('excel_transaksi');
		$this->db->like('transaksi_tanggal',$tanggal);
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"transaksi_id"=>$record->transaksi_id,
				"transaksi_kelompok"=>$record->transaksi_kelompok,
				"transaksi_harga"=>'Rp. '.$record->transaksi_harga,
				"transaksi_jumlah"=>$record->transaksi_jumlah,
				"transaksi_cara_bayar"=>$record->transaksi_cara_bayar,
				"transaksi_tanggal"=>$record->transaksi_tanggal,
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

	function getDimensiDokter($postData=null){

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
			$searchQuery = " (dokter_id like '%".$searchValue."%' or dokter_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_dokter')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_dokter')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_dokter')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"dokter_id"=>$record->dokter_id,
				"dokter_nama"=>$record->dokter_nama,
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

	function getDimensiObat($postData=null){

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
			$searchQuery = " (obat_id like '%".$searchValue."%' or obat_kode like '%".$searchValue."%' or obat_nama like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_obat')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_obat')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_obat')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"obat_id"=>$record->obat_id,
				"obat_kode"=>$record->obat_kode,
				"obat_nama"=>$record->obat_nama,
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

	function getDimensiPasien($postData=null){

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
			$searchQuery = " (pasien_id like '%".$searchValue."%' or pasien_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_pasien')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_pasien')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_pasien')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"pasien_id"=>$record->pasien_id,
				"pasien_nama"=>$record->pasien_nama,
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

	function getDimensiProdusen($postData=null){

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
			$searchQuery = " (produsen_id like '%".$searchValue."%' or produsen_nama like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_produsen')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_produsen')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_produsen')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"produsen_id"=>$record->produsen_id,
				"produsen_nama"=>$record->produsen_nama,
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

	function getDimensiRuang($postData=null){

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
			$searchQuery = " (ruang_id like '%".$searchValue."%' or ruang_poliklinik like '%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_ruang')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_ruang')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_ruang')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"ruang_id"=>$record->ruang_id,
				"ruang_poliklinik"=>$record->ruang_poliklinik,
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

	function getDimensiTransaksi($postData=null){

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
			$searchQuery = " (transaksi_id like '%".$searchValue."%' or transaksi_harga like'%".$searchValue."%' or transaksi_jumlah like'%".$searchValue."%' or transaksi_total like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('dim_transaksi')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$records = $this->db->get('dim_transaksi')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('dim_transaksi')->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"transaksi_id"=>$record->transaksi_id,
				"transaksi_harga"=>$record->transaksi_harga,
				"transaksi_jumlah"=>$record->transaksi_jumlah,
				"transaksi_total"=>$record->transaksi_total,
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
			$searchQuery = " (waktu_id like '%".$searchValue."%' or waktu_hari like'%".$searchValue."%' or waktu_tanggal like'%".$searchValue."%' or waktu_bulan like'%".$searchValue."%' or waktu_tahun like'%".$searchValue."%') ";
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
				"waktu_id"=>$record->waktu_id,
				"waktu_hari"=>$record->waktu_hari,
				"waktu_tanggal"=>$record->waktu_tanggal,
				"waktu_bulan"=>$record->waktu_bulan,
				"waktu_tahun"=>$record->waktu_tahun,
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
			obat_kode like '%".$searchValue."%' or 
			obat_nama like'%".$searchValue."%' or 
			obat_golongan like'%".$searchValue."%' or 
			obat_bentuk like'%".$searchValue."%' or 
			obat_depo like'%".$searchValue."%' or 
			produsen_nama like'%".$searchValue."%' or 
			pasien_nama like'%".$searchValue."%' or 
			pasien_jenis_kelamin like'%".$searchValue."%' or 
			pasien_umur like'%".$searchValue."%' or 
			ruang_poliklinik like'%".$searchValue."%' or 
			ruang_jenis_masuk like'%".$searchValue."%' or 
			dokter_nama like'%".$searchValue."%' or 
			transaksi_kelompok like'%".$searchValue."%' or 
			transaksi_harga like'%".$searchValue."%' or 
			transaksi_jumlah like'%".$searchValue."%' or 
			transaksi_total like'%".$searchValue."%' or 
			transaksi_cara_bayar like'%".$searchValue."%' or 
			transaksi_tanggal like'%".$searchValue."%') ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->join('dim_transaksi','dim_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$records = $this->db->get()->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->join('dim_transaksi','dim_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$records = $this->db->get()->result();

		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if($searchQuery != '')
			$this->db->where($searchQuery);
		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->from('fact_penjualan');
		$this->db->join('excel_dokter','excel_dokter.dokter_id = fact_penjualan.id_dokter');
		$this->db->join('excel_pasien','excel_pasien.pasien_id = fact_penjualan.id_pasien');
		$this->db->join('excel_obat','excel_obat.obat_id = fact_penjualan.id_obat');
		$this->db->join('excel_ruang','excel_ruang.ruang_id = fact_penjualan.id_ruang');
		$this->db->join('excel_produsen','excel_produsen.produsen_id = fact_penjualan.id_produsen');
		$this->db->join('excel_transaksi','excel_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$this->db->join('dim_waktu','dim_waktu.waktu_id = fact_penjualan.id_waktu');
		$this->db->join('dim_transaksi','dim_transaksi.transaksi_id = fact_penjualan.id_transaksi');
		$records = $this->db->get()->result();

		$data = array();

		foreach($records as $record ){

			$data[] = array(
				"obat_kode"=>$record->obat_kode,
				"obat_nama"=>$record->obat_nama,
				"obat_golongan"=>$record->obat_golongan,
				"obat_bentuk"=>$record->obat_bentuk,
				"obat_depo"=>$record->obat_depo,
				"produsen_nama"=>$record->produsen_nama,
				"pasien_nama"=>$record->pasien_nama,
				"pasien_jenis_kelamin"=>$record->pasien_jenis_kelamin,
				"pasien_umur"=>$record->pasien_umur,
				"ruang_poliklinik"=>$record->ruang_poliklinik,
				"ruang_jenis_masuk"=>$record->ruang_jenis_masuk,
				"dokter_nama"=>$record->dokter_nama,
				"transaksi_kelompok"=>$record->transaksi_kelompok,
				"transaksi_harga"=>$record->transaksi_harga,
				"transaksi_jumlah"=>$record->transaksi_jumlah,
				"transaksi_total"=>$record->transaksi_total,
				"transaksi_cara_bayar"=>$record->transaksi_cara_bayar,
				"transaksi_tanggal"=>$record->transaksi_tanggal,
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
