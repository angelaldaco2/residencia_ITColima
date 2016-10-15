<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username, $password){
		$this->db->where('id_usuario',$username);
		$this->db->where('contrasena',$password);
		$query = $this->db->get('usuario');
		if($query->num_rows()==1){
			return $query->row();
		}
		else{
			redirect(base_url('login/index'));
		}
	}
}