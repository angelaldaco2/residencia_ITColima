<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Europe/Madrid"); 
	}

	public function add($dataevent){
		$this->db->insert('events', $dataevent);
	}

	public function getAll(){
		$query=$this->db->get('events');
		if($query->num_rows()>0){
			return $query->result();
		}
		return object();
	}

	public function getEvents($id){
		return $this->db->where('id', $id)->get('events')->row();
	}

	private function _formatDate($date){
		return strtotime(substr($date, 6, 4)."-".substr($date, 3, 2)."-".substr($date, 0, 2)." " .substr($date, 10, 6)) * 1000;
	}

	public function update_model($dataevent){
		$id=$dataevent['id'];
		unset($dataevent['id']);
		$this->db->where('id', $id);
		$this->db->update('events', $dataevent);
		return true;
	}

	public function get_info($id){
		$this->db->select('*');
		$this->db->from('events');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_visita_reporte($periodo, $anio){
		$this->db->select('*');
		$this->db->from('solicitud');
		$this->db->join('events', 'solicitud.id=events.id');
		$this->db->where('solicitud.periodo_escolar', $periodo);
		$this->db->where('solicitud.anio', $anio);
		$this->db->where('events.class', 'event-success');
		$this->db->order_by('events.carrera'); 
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
}