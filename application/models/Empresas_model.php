<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Empresas_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function show_empresas(){
		$this->db->select('id_empresa, nombre, tel_1, tel_2, correo, direccion');
		$this->db->from('empresa');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function autocompletar($nombre){
		$this->db->select('nombre');
		$this->db->from('empresa');
		$this->db->like('nombre', $nombre);
		$query=$this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row){
        		$row_set[]=htmlentities(stripslashes($row['nombre']));
        	}
        	echo json_encode($row_set);
		}
	}

	public function insert_empresa($dataempresa){
		$this->db->insert('empresa', $dataempresa);
	}

	public function editar_empresa($empresa){
		$this->db->select('id_empresa, nombre, tel_1, tel_2, correo, direccion');
		$this->db->from('empresa');
		$this->db->where('id_empresa', $empresa);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function update_empresa($dataempresa){
		$id_empresa=$dataempresa['id_empresa'];
		unset($dataempresa['id_empresa']);
		$this->db->where('id_empresa', $id_empresa);
		$this->db->update('empresa', $dataempresa);
		return true;
	}

	public function delete_empresa($id_empresa){
		$this->db->where('id_empresa', $id_empresa);
		$this->db->delete('empresa');
	}
}