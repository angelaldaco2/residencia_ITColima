<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materiales extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database('default');
	}

	public function calendario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Recursos materiales'){
			$titulo['title'] = "Calendario";
			$this->load->view('header_materiales', $titulo);
			$this->load->view('calendario');
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}
}