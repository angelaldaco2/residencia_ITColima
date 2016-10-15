<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vinculacion extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('empresas_model');
		$this->load->model('solicitudes_model');
		$this->load->model('calendario_model');
		$this->load->model('events_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database('default');
	}
	
	public function calendario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$titulo['title']="Calendario";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('calendario');
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function nuevo_evento(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$id=$this->input->post('id');
			$data['fila']=$this->solicitudes_model->consultar($id);
			$titulo['title']="Agregar al calendario";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_nuevo_evento', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function solicitudes_aceptadas(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$data['fila']=$this->solicitudes_model->mostrar_aceptadas();
			$titulo['title']="Solicitudes";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_solicitudes_aceptadas', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function usuarios(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$data['fila']=$this->users_model->show_users();
			$titulo['title']="Usuarios";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_usuarios', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function nuevo_usuario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$titulo['title']="Nuevo usuario";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_nuevo_usuario');
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function editar_usuario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$id_usuario=$this->input->post('id_usuario');
			$data['fila']=$this->users_model->editar_user($id_usuario);
			$titulo['title']="Editar usuario";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_editar_usuario', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function borrar_usuario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$id_usuario=$this->input->post('id_usuario');
			$this->users_model->delete_user($id_usuario);
			redirect(base_url('vinculacion/usuarios'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function guardar_usuario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$datauser=array(
				'id_usuario'=>$this->input->post('clave'),
				'nombre'=>$this->input->post('nombre'),
				'contrasena'=>$this->input->post('pass'),
				'departamento'=>$this->input->post('departamento'),
				'cargo'=>$this->input->post('cargo')
			);
			$this->users_model->insert_user($datauser);
			redirect(base_url('vinculacion/usuarios'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function actualizar_usuario(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$datauser=array(
				'id_usuario'=>$this->input->post('clave'),
				'nombre'=>$this->input->post('nombre'),
				'contrasena'=>$this->input->post('pass'),
				'cargo'=>$this->input->post('cargo')
			);
			$this->users_model->update_user($datauser);
			redirect(base_url('vinculacion/usuarios'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function empresas(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$data['fila']=$this->empresas_model->show_empresas();
			$titulo['title']="Empresas";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_empresas', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function nueva_empresa(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$titulo['title']="Nueva empresa";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_nueva_empresa');
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function editar_empresa(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$id_empresa=$this->input->post('id_empresa');
			$data['fila']=$this->empresas_model->editar_empresa($id_empresa);
			$titulo['title']="Editar empresa";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_editar_empresa', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function borrar_empresa(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$id_empresa=$this->input->post('id_empresa');
			$this->empresas_model->delete_empresa($id_empresa);
			redirect(base_url('vinculacion/empresas'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function guardar_empresa(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$dataempresa=array(
				'id_empresa'=>$this->input->post('clave'),
				'nombre'=>$this->input->post('nombre'),
				'tel_1'=>$this->input->post('tel1'),
				'tel_2'=>$this->input->post('tel2'),
				'correo'=>$this->input->post('email'),
				'direccion'=>$this->input->post('direccion')
			);
			$this->empresas_model->insert_empresa($dataempresa);
			redirect(base_url('vinculacion/empresas'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function actualizar_empresa(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$dataempresa=array(
				'id_empresa'=>$this->input->post('clave'),
				'nombre'=>$this->input->post('nombre'),
				'tel_1'=>$this->input->post('tel1'),
				'tel_2'=>$this->input->post('tel2'),
				'correo'=>$this->input->post('email'),
				'direccion'=>$this->input->post('direccion')
			);
			$this->empresas_model->update_empresa($dataempresa);
			redirect(base_url('vinculacion/empresas'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function configuracion(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$data['fila']=$this->solicitudes_model->get_configuracion();
			$titulo['title']="Configuración";
			$this->load->view('header_vinculacion', $titulo);
			$this->load->view('view_configuracion_fechas', $data);
			$this->load->view('footer');
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function guardar_configuracion(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			date_default_timezone_set('America/Mexico_City');
			$anio=date("Y");
			$mes=date("n");
			if ($mes>=1 and $mes<=6){
				$periodo="Enero - Junio";
			}
			if ($mes>=8 and $mes<=12){
				$periodo="Agosto - Diciembre";
			}
			$dataconfig=array(
				'fecha_solicitud'=>$this->input->post('fecha-solicitud'),
				'fecha_subdireccion'=>$this->input->post('fecha-subdireccion'),
				'fecha_inicio'=>$this->input->post('fecha-inicio'),
				'fecha_fin'=>$this->input->post('fecha-fin'),
				'periodo_escolar'=>$periodo,
				'anio'=>$anio
			);
			$this->solicitudes_model->save_configuracion($dataconfig);
			redirect(base_url('vinculacion/calendario'));
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function reporte(){
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
			$data['periodo']=$this->input->post('periodo');
			$data['anio']=$this->input->post('anio');
			$data['fila']=$this->events_model->get_visita_reporte($this->input->post('periodo'), $this->input->post('anio'));
			$this->load->view('reporte_final', $data);
		}
		else{
			redirect(base_url('login/index'));
		}
	}

	public function sel_fecha(){
		date_default_timezone_set('America/Mexico_City');
		$anio=date('Y');
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		echo '<form method="post" action="reporte" target="_blank">';
			echo '<div class="text-left">';
				echo '<div class="row col-lg-10 col-lg-offset-1">';
					echo '<div class="container col-lg-6">';
						echo '<h4>Seleccione el periodo:</h4>';
						echo '<select class="form-control" name="periodo">';
								switch ($periodo){
									case 'Enero - Junio':
										echo '<option selected>Enero - Junio</option>';
										echo '<option>Agosto - Diciembre</option>';
										break;
									case 'Agosto - Diciembre':
										echo '<option>Enero - Junio</option>';
										echo '<option selected>Agosto - Diciembre</option>';
										break;
									default:
										break;
								}
						echo '</select>';
					echo '</div>';
					echo '<div class="container col-lg-6">';
						echo '<h4>Seleccione el año:</h4>';
						echo '<select class="form-control" name="anio">';
							echo '<option>'.$anio.'</option>';
							echo '<option>'.($anio-1).'</option>';
						echo '</select>';
					echo '</div>';
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