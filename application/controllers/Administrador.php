<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Administrador extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('calendario_model');
		$this->load->model('empresas_model');
		$this->load->model('solicitudes_model');
		$this->load->model('users_model');
		$this->load->model('visitas_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database('default');
	}

	public function index(){
		
	}
}