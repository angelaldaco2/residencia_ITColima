<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Visitas_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Mexico_City"); 
	}

	private function _formatDate($date){
		return strtotime(substr($date, 6, 4)."-".substr($date, 3, 2)."-".substr($date, 0, 2)." " .substr($date, 10, 6)) * 1000;
	}

	public function insert_visita(){
		$this->db->set("id", 1);
		$this->db->set("start", $this->_formatDate($this->input->post("from")));
		$this->db->set("end", $this->_formatDate($this->input->post("to")));
		$this->db->set("empresa", $this->input->post("empresa"));
		$this->db->set("ciudad", $this->input->post("ciudad"));
		$this->db->set("docente", $this->input->post("docente"));
		if($this->db->insert("calendario")){
			return TRUE;
		}
		return FALSE;
	}

	public function mostrar_visitas(){
		$query=$this->db->get('calendario');
		if($query->num_rows() > 0){
			return $query->result();
		}
		return object();
	}

	public function get_class(){
		$query=$this->db->get('calendario');
		if($query->num_rows() > 0){
			return $query->result();
		}
		return object();
	}
}