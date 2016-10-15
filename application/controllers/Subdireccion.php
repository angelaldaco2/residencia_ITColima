<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subdireccion extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('solicitudes_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->database('default');
	}

	public function aceptado(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$this->load->model('solicitudes_model','solicitud');
			$id = (int)$this->input->post('id');
			if($id > 0)
				echo $this->solicitud->aceptado($id);
			else
				echo -1;
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function solicitudes(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$data['fila']=$this->solicitudes_model->show_solicitudes_sub();
			$data['fecha']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Solicitudes";
			$this->load->view('header_subdireccion', $titulo);
			$this->load->view('view_subdireccion', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function aceptadas(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$data['fila']=$this->solicitudes_model->show_solicitudes_acept_sub();
			$data['fecha']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Solicitudes";
			$this->load->view('header_subdireccion', $titulo);
			$this->load->view('view_subdireccion_aceptadas', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function actualizar_solicitud(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$datasolicitud=array(
				'id_solicitud'=>$this->input->post('clave'),
				'status'=>$this->input->post('status')
			);
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function filtrar(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$carrera=$this->input->post('filtrar');
			$data['fila']=$this->solicitudes_model->show_solicitudes_subdireccion($carrera);
			$data['fecha']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Solicitudes";
			$this->load->view('header_subdireccion', $titulo);
			$this->load->view('view_subdireccion', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function consultar(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$id=$this->input->post('folio');
			$data['fila']=$this->solicitudes_model->consultar($id);
			$data['fecha']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Solicitudes";
			$this->load->view('header_subdireccion', $titulo);
			$this->load->view('view_consulta_sub', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function reporte(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Subdirector'){
			$carrera=$this->input->post('carrera');
			if ($carrera!='Seleccione la carrera') {
				$data['fila']=$this->solicitudes_model->get_solicitudes_reporte($carrera);
				$this->load->view('reporte_sub', $data);
			}
			
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function sel_carrera(){
		echo '<form method="post" action="reporte" target="_blank">';
			echo '<div class="text-center">';
				echo '<div class="container col-lg-8 col-lg-offset-2">';
					echo '<h4>Seleccione la carrera:</h4>';
					echo '<select class="form-control" name="carrera">';
						echo '<option disabled selected hidden>Seleccione la carrera</option>';
						echo '<option>Arquitectura</option>';
						echo '<option>Licenciatura en Administración</option>';
						echo '<option>Contador Público</option>';
						echo '<option>Ingenería Ambiental</option>';
						echo '<option>Ingenería Bioquimica</option>';
						echo '<option>Ingenería Industrial</option>';
						echo '<option>Ingenería Informática</option>';
						echo '<option>Ingenería en Sistemas Computacionales</option>';
						echo '<option>Ingenería en Gestión Empresarial</option>';
						echo '<option>Ingenería Mecatrónica</option>';
					echo '</select>';
				echo '</div>';
			echo '</div>';
			echo '<div class="text-center">';
				echo '<br><br><br><br><br><br>';
				echo '<button type="submit" class="btn btn-success" title="Generar reporte">';
	    			echo '<span class="glyphicon glyphicon-list-alt"></span> Generar reporte en PDF';
				echo '</button>';
			echo '</div>';
		echo '</form>';
	}
}