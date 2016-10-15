<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function show_users(){
		$this->db->select('id_usuario, nombre, contrasena, departamento, cargo');
		$this->db->from('usuario');
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function insert_user($datauser){
		$this->db->insert('usuario', $datauser);
	}

	public function editar_user($usuario){
		$this->db->select('id_usuario, nombre, contrasena, departamento, cargo');
		$this->db->from('usuario');
		$this->db->where('id_usuario', $usuario);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function update_user($datauser){
		$id_usuario=$datauser['id_usuario'];
		unset($datauser['id_usuario']);
		$this->db->where('id_usuario', $id_usuario);
		$this->db->update('usuario', $datauser);
		return true;
	}

	public function delete_user($id_usuario){
		$this->db->where('id_usuario', $id_usuario);
		$this->db->delete('usuario');
	}
}