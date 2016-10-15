<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Solicitudes_model extends CI_Model{
	public function __construct() {
		parent::__construct();
	}
	
	// Muestra las solicitudes al Jefe de Dpto. una vez que las guarda en el sistema
	public function show_solicitudes($in){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
		$this->db->from('solicitud');
		$this->db->where('status_visita', 'no enviado');
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$this->db->where_in('carrera', $in);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Muestra las solcitudes pendientes de revisar al Subdirector
	public function show_solicitudes_sub(){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
		$this->db->from('solicitud');
		$this->db->where('status_visita', 'enviado');
		$this->db->where('aceptado', 0);
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Muestra las solicitudes al Subdirector, las cuales ya ha aceptado
	public function show_solicitudes_acept_sub(){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
		$this->db->from('solicitud');
		$this->db->where('status_visita', 'enviado');
		$this->db->where('aceptado', 1);
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$this->db->order_by("carrera"); 
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Cambia el estado de la solicitud cuando el Subdirector autoriza alguna o varias de ellas
	public function aceptado($id){
		$aceptado = $this->db->select('aceptado')
			->from('solicitud')
			->where('id',$id)
			->get();
		$aceptado = $aceptado->result_array();
		$aceptado = $aceptado[0]['aceptado'];
		$aceptado = $aceptado == 0 ? 1 : 0;
		$this->db->where('id',$id)->update('solicitud',['aceptado'=>$aceptado]);
		return $aceptado;
	}

	// Guarda una solicitud ingresada por el Jefe de Dpto.
	public function insert_solicitud($datasolicitud){
		$this->db->insert('solicitud', $datasolicitud);
	}

	// Muestra las solicitudes al Subdirector cuando el Jefe de Dpto. las haya enviado
	public function show_solicitudes_subdireccion($carrera){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		if ($carrera=='Todos'){
			$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
			$this->db->from('solicitud');
			$this->db->where('status_visita', 'enviado');
			$this->db->where('periodo_escolar', $periodo);
			$this->db->where('anio', $anio);
			$query=$this->db->get();
		}
		else{
			$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
			$this->db->from('solicitud');
			$this->db->where('status_visita', 'enviado');
			$this->db->where('carrera', $carrera);
			$this->db->where('periodo_escolar', $periodo);
			$this->db->where('anio', $anio);
			$query=$this->db->get();
		}
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function consultar($id){
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado');
		$this->db->from('solicitud');
		$this->db->where('id', $id);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Muestra las solicitudes aceptadas por el subdirector al Dpto. de Vinculación
	public function mostrar_aceptadas(){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado, calendario');
		$this->db->from('solicitud');
		$this->db->where('aceptado', 1);
		$this->db->where('calendario', 0);
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	public function mostrar_aceptadas_reporte_sub(){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('*');
		$this->db->from('solicitud');
		$this->db->where('aceptado', 1);
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Muestra las solicitudes que ya fueron aceptadas por el subdirector, que ya fueron aprobadas por el
	// departamento de recursos materiales y que la empresa ya aceptó para que dicha visita se lleve a cabo.
	public function mostrar_aceptadas_jefe($in){
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('*');
		$this->db->from('solicitud');
		$this->db->join('events', 'solicitud.id=events.id');
		$this->db->where_in('solicitud.carrera', $in);
		$this->db->where('solicitud.periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}

	// Actualiza el estado de la solicitud cuando ya está agregada al calendario
	public function calendarizar($id){
		$data=array('calendario'=>1);
		$this->db->where('id', $id);
		$this->db->update('solicitud', $data);
	}

	public function editar_solicitud($id){
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado, status_visita, calendario');
		$this->db->from('solicitud');
		$this->db->where('id', $id);
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	public function update_solicitud($datasolicitud){
		$id=$datasolicitud['id'];
		unset($datasolicitud['id']);
		$this->db->where('id', $id);
		$this->db->update('solicitud', $datasolicitud);
		return true;
	}

	public function enviar_solicitudes($datasolicitud, $in){
		$this->db->where_in('carrera', $in);
		$this->db->update('solicitud', $datasolicitud);
		return true;
	}

	public function delete_solicitud($id){
		$this->db->where('id', $id);
		$this->db->delete('solicitud');
	}

	public function save_configuracion($dataconfig){
		$this->db->insert('configuracion', $dataconfig);
	}

	public function get_configuracion(){
		$this->db->order_by('id DESC');
		$this->db->limit(1);
		$query=$this->db->get('configuracion');
		if($query->num_rows()>0){
			$query=$query->result();
			return $query[0];
		}
	}

	public function get_solicitudes_reporte($carrera){
		if ($carrera=="Seleccione la carrera") {
			exit;
		}
		date_default_timezone_set('America/Mexico_City');
		$anio=date("Y");
		$mes=date("n");
		if ($mes>=1 and $mes<=6){
			$periodo="Enero - Junio";
		}
		if ($mes>=8 and $mes<=12){
			$periodo="Agosto - Diciembre";
		}
		$this->db->select('id, fecha_elaboracion, periodo_escolar, empresa, ciudad, area_observar, objetivo, fecha_visita, turno, carrera, semestre, no_alumnos, docente, correo, materia, aceptado as activo');
		$this->db->from('solicitud');
		$this->db->where('status_visita', 'enviado');
		$this->db->where('aceptado', 1);
		$this->db->where('periodo_escolar', $periodo);
		$this->db->where('anio', $anio);
		$this->db->where('carrera', $carrera);
		$this->db->order_by("id"); 
		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}
	}
}