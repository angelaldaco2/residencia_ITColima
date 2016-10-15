<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Events extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('events_model');
		$this->load->model('solicitudes_model');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database('default');
	}

	private function _formatDate($date){
		return strtotime(substr($date, 6, 4)."-".substr($date, 3, 2)."-".substr($date, 0, 2)." " .substr($date, 10, 6)) * 1000;
	}

	public function save(){
		$this->load->library('email');
		$url=base_url().'events/render/'.$this->input->post('id');
		$dataevent=array(
			'id'=>$this->input->post('id'),
			'title'=>$this->input->post('title'),
			'body'=>$this->input->post('event'),
			'url'=>$url,
			'start'=>$this->_formatDate($this->input->post("from")),
			'end'=>$this->_formatDate($this->input->post("to")),
			'carrera'=>$this->input->post('carrera'),
			'no_alumnos'=>$this->input->post('alumnos'),
			'ciudad'=>$this->input->post('ciudad'),
			'hora'=>$this->input->post('hora_visita'),
			'hora_regreso'=>$this->input->post('hora_regreso'),
			'observaciones'=>$this->input->post('observaciones')
		);
		$id=$this->input->post('id');
		$this->events_model->add($dataevent);
		$this->solicitudes_model->calendarizar($id);

		//envío de correo electrónico
		// $this->email->from('your@example.com', 'Your Name');
		// $this->email->to('someone@example.com'); 
		// $this->email->cc('another@another-example.com'); 
		// $this->email->bcc('them@their-example.com'); 
		// $this->email->subject('Email Test');
		// $this->email->message('Testing the email class.');	
		// $this->email->send();

		redirect(base_url('vinculacion/calendario'));
	}

	public function getAll(){
		if($this->input->is_ajax_request()){
			$this->load->model('events_model');
			$events = $this->events_model->getAll();
			echo json_encode(
				array(
					"success" => 1,
					"result" => $events
				)
			);
		}
	}

	public function update_visita(){
        if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
        	$date= new DateTime($this->input->post('from'));
        	$d= $date->format('d');
	        $m= $date->format('m');
	        $Y= $date->format('Y');
	        $fecha=$d.'/'.$m.'/'.$Y.' '.'10:00';
			$dataevent=array(
				'id'=>$this->input->post('id'),
				'start'=>$this->_formatDate($fecha),
				'end'=>$this->_formatDate($fecha),
				'hora'=>$this->input->post('hora_visita'),
				'hora_regreso'=>$this->input->post('hora_regreso'),
				'observaciones'=>$this->input->post('observaciones')
			);
		};
		if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Recursos materiales'){
			$dataevent=array(
				'id'=>$this->input->post('id'),
				'hora_salida'=>$this->input->post('hora_salida'),
				'hora_llegada'=>$this->input->post('hora_llegada'),
				'chofer'=>$this->input->post('chofer'),
				'vehiculo'=>$this->input->post('vehiculo')
			);
		};
		$this->events_model->update_model($dataevent);
	}

	public function editar_visita($id){
		date_default_timezone_set('America/Mexico_City');
		$evento=$this->events_model->getEvents($id);
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
		?>
		<script>
		$(function(){
			$('#gdr').on('click', function(){
				$.ajax({
					type:'post',
					url:'<?php echo base_url(); ?>events/update_visita',
					data:{
						<?php
						if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){ ?>
							from:$('#fecha_visita').val(),
							hora_visita:$('#hora_visita').val(),
							hora_regreso:$('#hora_regreso').val(),
							observaciones:$('#observaciones').val(),
							id:$('#ididid').val().trim(),
						<?php }
						if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Recursos materiales'){ ?>
							hora_salida : $('[name="hora_salida"]').val().trim(),
							hora_llegada : $('[name="hora_llegada"]').val().trim(),
							chofer : $('[name="chofer"]').val().trim(),
							vehiculo : $('[name="vehiculo"]').val().trim(),
							id:$('#ididid').val().trim(),
						<?php };
						?>
					},
					success:function(data){
						parent.location.reload();
					}
				});
				return false;
			});
		});
		</script>
		<?php
		echo '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
		echo '<form method="post" action="'.base_url().'events/update_visita">';
			echo '<div>';
				echo '<h2 class="text-center"><strong>'.$evento->title.'</strong></h2>';
				echo '<div class="row col-xs-12">';
					echo '<div class="col-xs-4 text-right">';
						echo '<label><strong>Carrera:</strong></label>';
					echo '</div>';
					echo '<div class="col-xs-8">';
						echo '<p>'.$evento->carrera.'<p>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row col-xs-12">';
					echo '<div class="col-xs-4 text-right">';
						echo '<label><strong>No. de alumnos:</strong></label>';
					echo '</div>';
					echo '<div class="col-xs-8">';
						echo '<p>'.$evento->no_alumnos.' alumnos<p>';
					echo '</div>';
				echo '</div>';
				$fecha=($evento->start)/1000;
				if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){
					echo '<div class="row col-xs-12">';
						echo '<div class="text-center col-xs-4">';
							echo '<label for="fecha_visita">Fecha de la vista</label><br>';
							echo '<input type="date" class="form-control" id="fecha_visita" value="'.date('Y-m-d', $fecha).'" name="from" min="'.date('Y-m-d', time()+86400).'"><br>';
						echo '</div>';
						echo '<div class="text-center col-xs-4">';
							echo '<label for="hora_visita">Hora de la visita</label><br>';
							echo '<input type="time" class="form-control" id="hora_visita" value="'.$evento->hora.'" name="hora_visita"><br>';
						echo '</div>';
						echo '<div class="text-center col-xs-4">';
							echo '<label for="hora_regreso">Hora de regreso</label><br>';
							echo '<input type="time" class="form-control" id="hora_regreso" value="'.$evento->hora_regreso.'" name="hora_regreso"><br>';
						echo '</div>';
					echo '</div>';
					echo '<label for="observaciones:">Observaciones</label><br>';
					echo '<input type="text" class="form-control" id="observaciones" value="'.$evento->observaciones.'" name="observaciones">';
					echo '<br>';
					echo '<div class="text-center">';
						echo '<a href="'.base_url().'events/cancelar/'.$id.'" type="button" class="btn btn-primary btn-danger">Cancelar visita</a><br>';
					echo '</div>';
				};
				if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Recursos materiales'){
					echo '<div class="row col-xs-12">';
						echo '<div class="col-xs-4">';
							echo '<label><strong>Fecha de visita: </strong></label><br>';
							echo date("d/m/Y", $fecha);
						echo '</div>';
						echo '<div class="col-xs-4">';
						echo '<label><strong>Hora de visita: </strong></label><br>';
							echo $evento->hora.'<br><br>';
						echo '</div>';
						echo '<div class="col-xs-4">';
						echo '<label><strong>Hora de regreso: </strong></label><br>';
							echo $evento->hora_regreso.'<br><br>';
						echo '</div>';
					echo '</div>';
					echo '<div class="row col-xs-10 col-xs-offset-1">';
						echo '<div class="text-center col-xs-6">';
							echo '<label for="hora_salida">Hora de salida</label><br>';
							echo '<input type="time" id="hora_salida" name="hora_salida" value="'.$evento->hora_salida.'" required class="form-control"><br>';
						echo '</div>';
						echo '<div class="text-center col-xs-6">';
							echo '<label for="hora_llegada">Hora de llegada</label><br>';
							echo '<input type="time" id="hora_llegada" name="hora_llegada" value="'.$evento->hora_llegada.'" required class="form-control"><br>';
						echo '</div>';
					echo '</div>';
					echo '<div class="row col-xs-12">';
						echo '<div class="text-center col-xs-6">';
							echo '<label for="chofer">Chofer</label><br>';
							echo '<input type="text" id="chofer" name="chofer" value="'.$evento->chofer.'" required class="form-control"><br>';
						echo '</div>';
						echo '<div class="text-center col-xs-6">';
							echo '<label for="vehiculo">Vehículo</label><br>';
							echo '<select id="vehiculo" name="vehiculo" required class="form-control">';
								switch ($evento->vehiculo){
									case 'Camión Volvo':
										echo '<option selected>Camión Volvo</option>';
										echo '<option>Camión Mercedes Benz</option>';
										echo '<option>Camioneta Express</option>';
										echo '<option>Camioneta Toyota</option>';
										break;
									case 'Camión Mercedes Benz':
										echo '<option>Camión Volvo</option>';
										echo '<option selected>Camión Mercedes Benz</option>';
										echo '<option>Camioneta Express</option>';
										echo '<option>Camioneta Toyota</option>';
										break;
									case 'Camioneta Express':
										echo '<option>Camión Volvo</option>';
										echo '<option>Camión Mercedes Benz</option>';
										echo '<option selected>Camioneta Express</option>';
										echo '<option>Camioneta Toyota</option>';
										break;
									case 'Camioneta Toyota':
										echo '<option>Camión Volvo</option>';
										echo '<option>Camión Mercedes Benz</option>';
										echo '<option>Camioneta Express</option>';
										echo '<option selected>Camioneta Toyota</option>';
										break;
									default:
										break;
								}
								echo '<option>Camión Volvo</option>';
								echo '<option>Camión Mercedes Benz</option>';
								echo '<option>Camioneta Express</option>';
								echo '<option>Camioneta Toyota</option>';
							echo '</select><br>';
						echo '</div>';
					echo '</div>';
					echo '<br>';
				};
				echo '<input type="text" name="id" id="ididid" value="'.$evento->id.'" hidden>';
				echo '<div row col-xs-12>';
					echo '<br><button type="submit" class="btn btn-success btn-lg btn-block" id="gdr">Guardar</button>';
				echo '</div>';
			echo '</div>';
		echo '</form>';
	}

	public function render($id=0){
		date_default_timezone_set('America/Mexico_City');
		$evento=$this->events_model->getEvents($id);
		echo '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
		echo '<form method="post" action="'.base_url().'events/editar_visita/'.$id.'">';
			echo '<div>';
				echo '<h1 class="text-center"><strong>'.$evento->title.'</strong></h1>';
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>Carrera:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.$evento->carrera.'<h4>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>Maestro:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.$evento->body.'<h4>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>No. de alumnos:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.$evento->no_alumnos.' alumnos<h4>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>Hora de visita:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.$evento->hora.'<h4>';
					echo '</div>';
				echo '</div>';
				$fecha=($evento->start)/1000;
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>Fecha:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.date("d/m/Y", $fecha).'<h4>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row col-xs-10 col-xs-offset-1">';
					echo '<div class="col-xs-5">';
						echo '<h4><strong>Ciudad:</strong></h4>';
					echo '</div>';
					echo '<div class="col-xs-7">';
						echo '<h4>'.$evento->ciudad.'<h4><br>';
					echo '</div>';
				echo '</div>';
				echo '<br><br>';
				if ($evento->class != "event-important"){
					echo '<div class="text-center"><input type="submit" class="btn btn-primary" value="Editar datos"></div>';
				}
				else{
					echo '<h2 class="text-center"><span class="label label-danger">Esta visita ha sido cancelada.</span></h2>';
				}
			echo '</div>';
		echo '</form>';
	}

	public function cancelar($id){
		date_default_timezone_set('America/Mexico_City');
		$evento=$this->events_model->getEvents($id);
		?>
		<script>
		$(function(){
			$('#btn_cancel').on('click', function(){
				$.ajax({
					type:'post',
					url:'<?php echo base_url(); ?>events/cancelar_visita',
					data:{
						id:$('#id').val().trim(),
						motivo:$('#motivos').val(),
					},
					success:function(data){
						parent.location.reload();
					}
				});
				return false;
			});
		});
		</script>
		<?php
		echo '<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">';
		echo '<form method="post" action="'.base_url().'events/cancelar_visita" onSubmit="parent.location.reload();">';
			echo '<input type="text" name="id" value="'.$evento->id.'" hidden>';
			echo '<label class="text-center">¿Cuál es el motivo de la cancelación de la visita?</label>';
			echo '<textarea type="text" rows="2"  class="form-control" name="motivos" autocomplete="off" autofocus required></textarea><br>';
			echo '<button type="submit" class="btn btn-danger btn-block" id="btn_cancel">Guardar</button>';
		echo '</form>';
	}

	public function cancelar_visita(){
		$dataevent=array(
			'id'=>$this->input->post('id'),
			'motivo'=>$this->input->post('motivos'),
			'class'=>"event-important"
		);
		$this->events_model->update_model($dataevent);
	}
} 