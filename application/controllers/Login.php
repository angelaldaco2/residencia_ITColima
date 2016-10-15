<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database('default');
	}

	public function index(){
		switch ($this->session->userdata('cargo')){
			case '':
				$titulo['title']="Inicio de sesión";
				$this->load->view('header', $titulo);
				$this->load->view('login_view');
				$this->load->view('footer');
				break;
			case 'Jefe de departamento':
				redirect(base_url().'jefe/aceptadas');
				break;
			case 'Subdirector':
				redirect(base_url().'subdireccion/solicitudes');
				break;	
			case 'Vinculacion':
				redirect(base_url().'vinculacion/calendario');
				break;
			case 'Recursos materiales':
				redirect(base_url().'materiales/calendario');
				break;
			default:
				$titulo['title']="Inicio de sesión";
				$this->load->view('header', $titulo);
				$this->load->view('login_view');
				$this->load->view('footer');
				break;		
		}
	}

	public function new_user(){
		$username=$this->input->post('id');
		$password=$this->input->post('password');
		$check_user=$this->login_model->login_user($username, $password);
		if($check_user==TRUE){
			$data=array(
            'is_logued_in' 	=> 		TRUE,
            'id_usuario' 	=> 		$check_user->id_usuario,
            'cargo'			=>		$check_user->cargo,
            'departamento'	=>		$check_user->departamento,
            'usuario' 		=> 		$check_user->nombre
    		);	
			$this->session->set_userdata($data);
			redirect(base_url('login/index'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}
	
	public function logout_ci(){
		$this->session->sess_destroy();
		$data=array(
            'is_logued_in'=>FALSE
    	);
    	$this->session->set_userdata($data);
    	redirect(base_url('login/index'));
	}
}