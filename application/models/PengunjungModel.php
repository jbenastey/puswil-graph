<?php

class PengunjungModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function lihat_semua(){
		$this->db->from('puswil_pengunjung');
		$this->db->order_by('pengunjung_tahun','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_satu($id){
		$this->db->from('puswil_pengunjung');
		$this->db->where('pengunjung_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function tambah_pengunjung($data){
		$this->db->insert('puswil_pengunjung', $data);
	}
	public function edit_pengunjung($id,$data){
		$this->db->where('pengunjung_id',$id);
		$this->db->update('puswil_pengunjung', $data);
	}
	public function hapus_pengunjung($id){
		$this->db->where('pengunjung_id',$id);
		$this->db->delete('puswil_pengunjung');
	}
}
