<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visitas extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('visitas_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database('default');
	}

	public function mostrar_visitas(){
		if($this->input->is_ajax_request()){
			$this->load->model('visitas_model');
			$events = $this->visitas_model->mostrar_visitas();
			echo json_encode(
				array(
					"success" => 1,
					"result" => $events
				)
			);
		}
	}

	public function guardar_visita(){
		$this->load->model("visitas_model");
		$this->visitas_model->insert_visita();
		//$this->load->view('header_vinculacion');
		$this->load->view('calendario');
		// $this->load->view('footer');
	}
}