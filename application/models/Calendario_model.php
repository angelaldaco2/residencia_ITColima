<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Calendario_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function insert_evento(){
		$this->db->insert('calendario', $dataevento);
	}

	public function show_calendario(){
		$this->db->select('id, inicio, fin, empresa, ciudad, docente, estado');
		$this->db->from('calendario');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
}