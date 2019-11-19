<?php

class AuthModel extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function cek($data)
	{
		$query = $this->db->get_where('puswil_pengguna',$data);
		return $query->row_array();
	}
}
