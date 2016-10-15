<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jefe extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('solicitudes_model');
		$this->load->model('events_model');
		$this->load->model('empresas_model');
		$this->load->database('default');
	}
	
	public function index(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			switch ($_SESSION['departamento']){
				case 'Ciencias de la Tierra':
					$in=array('Arquitectura');
					break;
				case 'Ciencias Económico Administrativas':
					$in=array('Contador Público', 'Licenciatura en Administración');
					break;
				case 'Industrial':
					$in=array('Ingenería Industrial', 'Ingenería en Gestión Empresarial');
					break;
				case 'Eléctrica y Electrónica':
					$in=array('Ingenería Mecatrónica');
					break;
				case 'Química y Bioquímica':
					$in=array('Ingenería Ambiental', 'Ingenería Bioquímica');
					break;
				case 'Sistemas y Computación':
					$in=array('Ingenería en Sistemas Computacionales', 'Ingenería Informática');
					break;
				default:
					break;
			}
			$data['fila']=$this->solicitudes_model->show_solicitudes($in);
			$data['fecha']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Nueva solicitud";
			$this->load->view('header_jefe', $titulo);
			$this->load->view('view_solicitud_jefe', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}
	public function editar_solicitud(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			$id=$this->input->post('id');
			$data['fila']=$this->solicitudes_model->editar_solicitud($id);
			$titulo['title'] = "Editar solicitud";
			$this->load->view('header', $titulo);
			$this->load->view('view_editar_solicitud_jefe', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}
	public function actualizar_solicitud(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			$datasolicitud=array(
				'id'=>$this->input->post('id'),
				'fecha_elaboracion'=>$this->input->post('fecha_elaboracion'),
				'periodo_escolar'=>$this->input->post('periodo_escolar'),
				'empresa'=>$this->input->post('empresa'),
				'ciudad'=>$this->input->post('ciudad'),
				'area_observar'=>$this->input->post('area_observar'),
				'objetivo'=>$this->input->post('objetivo'),
				'fecha_visita'=>$this->input->post('fecha_visita'),
				'turno'=>$this->input->post('turno'),
				'carrera'=>$this->input->post('carrera'),
				'semestre'=>$this->input->post('semestre'),
				'no_alumnos'=>$this->input->post('no_alumnos'),
				'docente'=>$this->input->post('docente'),
				'correo'=>$this->input->post('correo'),
				'materia'=>$this->input->post('materia'),
				'status_visita'=>$this->input->post('status_visita')
			);
			$this->solicitudes_model->update_solicitud($datasolicitud);
			redirect(base_url('jefe/index'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function borrar_solicitud(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			$id=$this->input->post('id');
			$this->solicitudes_model->delete_solicitud($id);
			redirect(base_url('jefe/index'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function guardar_solicitud(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			$anio=date("Y");
			$datasolicitud=array(
				'fecha_elaboracion'=>$this->input->post('fecha_elaboracion'),
				'periodo_escolar'=>$this->input->post('periodo_escolar'),
				'anio'=>$anio,
				'empresa'=>$this->input->post('empresa'),
				'ciudad'=>$this->input->post('ciudad'),
				'area_observar'=>$this->input->post('area_observar'),
				'objetivo'=>$this->input->post('objetivo'),
				'fecha_visita'=>$this->input->post('fecha_visita'),
				'turno'=>$this->input->post('turno'),
				'carrera'=>$this->input->post('carrera'),
				'semestre'=>$this->input->post('semestre'),
				'no_alumnos'=>$this->input->post('numero_alumnos'),
				'docente'=>$this->input->post('docente'),
				'correo'=>$this->input->post('correo'),
				'materia'=>$this->input->post('materia')
			);
			$this->solicitudes_model->insert_solicitud($datasolicitud);
			redirect(base_url('jefe/index'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function enviar_solicitudes(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			switch ($_SESSION['departamento']){
				case 'Ciencias de la Tierra':
					$in=array('Arquitectura');
					break;
				case 'Ciencias Económico Administrativas':
					$in=array('Contador Público', 'Licenciatura en Administración');
					break;
				case 'Industrial':
					$in=array('Ingenería Industrial', 'Ingenería en Gestión Empresarial');
					break;
				case 'Mecatrónica':
					$in=array('Ingenería Mecatrónica');
					break;
				case 'Química y Bioquímica':
					$in=array('Ingenería Ambiental', 'Ingenería Bioquímica');
					break;
				case 'Sistemas y Computación':
					$in=array('Ingenería en Sistemas Computacionales', 'Ingenería Informática');
					break;
				default:
					break;
			}
			$datasolicitud=array('status_visita'=>"enviado");
			$this->solicitudes_model->enviar_solicitudes($datasolicitud, $in);
			redirect(base_url('jefe/index'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function aceptadas(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
			switch ($_SESSION['departamento']){
				case 'Ciencias de la Tierra':
					$in=array('Arquitectura');
					break;
				case 'Ciencias Económico Administrativas':
					$in=array('Contador Público', 'Licenciatura en Administración');
					break;
				case 'Industrial':
					$in=array('Ingenería Industrial', 'Ingenería en Gestión Empresarial');
					break;
				case 'Eléctrica y Electrónica':
					$in=array('Ingenería Mecatrónica');
					break;
				case 'Química y Bioquímica':
					$in=array('Ingenería Ambiental', 'Ingenería Bioquímica');
					break;
				case 'Sistemas y Computación':
					$in=array('Ingenería en Sistemas Computacionales', 'Ingenería Informática');
					break;
				default:
					break;
			}
			$data['fila']=$this->solicitudes_model->mostrar_aceptadas_jefe($in);
			$titulo['title']="Solicitudes";
			$this->load->view('header_jefe', $titulo);
			$this->load->view('view_solicitudes_aceptadas', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function info(){
		$id = (int)$this->input->post('id');
		$this->load->model('events_model','mod');
		$info = $this->mod->get_info($id);
		if ($info->class=="event-success"){
			echo '<div class="row col-xs-12">';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Hora de salida:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-2">';
					echo '<h4>'.$info->hora_salida.'</h4>';
				echo '</div>';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Hora de visita:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-2">';
					echo '<h4>'.$info->hora.'</h4>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row col-xs-12">';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Hora de regreso:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-2">';
					echo '<h4>'.$info->hora_regreso.'</h4>';
				echo '</div>';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Hora de llegada:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-2">';
					echo '<h4>'.$info->hora_llegada.'</h4>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row col-xs-12">';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Vehículo:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-7">';
					echo '<h4>'.$info->vehiculo.'</h4>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row col-xs-12">';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Chofer:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-7">';
					echo '<h4>'.$info->chofer.'</h4>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row col-xs-12">';
				echo '<div class="col-xs-4">';
					echo '<h4><strong>Observaciones:</strong></h4>';
				echo '</div>';
				echo '<div class="col-xs-7">';
					echo '<h4>'.$info->observaciones.'</h4>';
				echo '</div>';
			echo '</div>';
		}
		if ($info->class=="event-important"){
			echo '<div><h4><strong>'.$info->motivo.'</strong></h4></div>';
		}
		if ($info->class=="event-warning"){
			echo '<div class="text-center"><h5><strong>La solicitud ha sido aceptada por el Subdirector Académico, 
				pero está en proceso de confirmación.</strong></h5></div>';
		}
	}

	public function empresas_get(){
		if (isset($_GET['term'])){
			$nombre=strtolower($_GET['term']);
			$this->empresas_model->autocompletar($nombre);
		}
	}
}