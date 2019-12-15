<?php


class ProsesModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function upload_excel($file)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = FCPATH . '/excel/import/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '2048';
		$config['overwrite'] = true;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload($file)) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_anggota($data)
	{
		$this->db->insert_batch('excel_anggota', $data);
	}

	public function insert_buku($data)
	{
		$this->db->insert_batch('excel_buku', $data);
	}

	public function insert_peminjam($data)
	{
		$this->db->insert_batch('excel_peminjam', $data);
	}

	public function insert_pengunjung($data)
	{
		$this->db->insert_batch('excel_pengunjung', $data);
	}

	public function lihat($table)
	{
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_dimensi($table, $data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function buku_terbanyak()
	{
		$this->db->select('buku_judul, count(buku_judul) as total');
		$this->db->group_by('buku_judul');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_buku');
		return $query->result_array();
	}
	public function pinjam_terbanyak()
	{
		$this->db->select('peminjam_nama, count(peminjam_nama) as total');
		$this->db->group_by('peminjam_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_peminjam');
		return $query->result_array();
	}
	public function anggota_terbanyak()
	{
		$this->db->select('anggota_nama, count(anggota_nama) as total');
		$this->db->group_by('anggota_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_anggota');
		return $query->result_array();
	}
	public function pengunjung_terbanyak()
	{
		$this->db->select('pengunjung_nama, count(pengunjung_nama) as total');
		$this->db->group_by('pengunjung_nama');
		$this->db->order_by('total','desc');
		$query = $this->db->get('excel_pengunjung');
		return $query->result_array();
	}
}
