<?php

class BukuModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function lihat_semua(){
		$this->db->from('puswil_buku');
		$this->db->order_by('buku_kode_klasifikasi','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_satu($id){
		$this->db->from('puswil_buku');
		$this->db->where('buku_id',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function tambah_buku($data){
		$this->db->insert('puswil_buku', $data);
	}
	public function edit_buku($id,$data){
		$this->db->where('buku_id',$id);
		$this->db->update('puswil_buku', $data);
	}
	public function hapus_buku($id){
		$this->db->where('buku_id',$id);
		$this->db->delete('puswil_buku');
	}
}
