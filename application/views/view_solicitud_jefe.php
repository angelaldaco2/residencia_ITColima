<?php date_default_timezone_set('America/Mexico_City');
	$mes=date("n");
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
	$(function(){
		$("#emp").autocomplete({
			source: "<?php echo base_url('jefe/empresas_get'); ?>"
		});
	});
</script>
<script>
	$(function(){
		$("#fecha_vis" ).datepicker({
			dateFormat: 'dd/mm/yy',
			minDate: new Date(<?php echo $min ?>),
			maxDate: new Date(<?php echo $fecha->fecha_fin ?>)
		});
	});
  </script>
</script>
<?php
$fecha_actual=date("Y").'-'.date("m").'-'.date("d");
if ($fecha_actual>$fecha->fecha_inicio){
	$min=date("Y-m-d", time() + 86400);
}
else{
	$min=$fecha->fecha_inicio;
}
if ($fecha->fecha_solicitud>$fecha_actual){ ?>
	<form class="form" method="post" action="<?php echo base_url() ?>jefe/guardar_solicitud">
		<div class="row col-lg-6 col-lg-offset-3 text-center">
			<div class="col-lg-6">
				<h5><strong>Fecha Elaboración</strong></h5>
				<input type="date" readonly value="<?php echo date("Y-m-d"); ?>" class="form-control" name="fecha_elaboracion" id="fech" autocomplete="off" required>
			</div>
			<div class="col-lg-6">
				<h5 ><strong>Periodo Escolar</strong></h5>
				<select class="form-control" name="periodo_escolar" id="sel" readonly>
					<?php 
						if ($mes>=1 and $mes<=6){ ?>
							<option selected>Enero - Junio</option>
						<?php }
						if ($mes>=8 and $mes<=12){ ?>
							<option selected>Agosto - Diciembre</option>
						<?php }
					?>
				</select>
				<br>
			</div>	
		</div>
		<div class="row col-lg-12 text-center">
			<div class= "contanier col-lg-12 text-center">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="headingOne">
				      		<h4 class="panel-title">
				        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          		<strong>Datos de Visita</strong>
				        	</a>
				      		</h4>
				    	</div>
				    	<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<div class="col-lg-6">
										<h5 ><strong>Fecha Vista</strong></h5>
											<!-- <input type="text" id="fecha_vis"> -->
										<input type="date" min="<?php echo $min; ?>" max="<?php echo $fecha->fecha_fin; ?>" class="form-control" name="fecha_visita" id="fech-v" autocomplete="off" auto-focus required>
									</div>
									<div class="col-lg-6">
										<h5 ><strong>Turno Visita</strong></h5>
										<select class="form-control" name="turno" id="sel">
										<option>Matutino</option>
										<option>Vespertino</option>
										</select>
									</div>
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<div class="col-lg-6">
										<h5><strong>Empresa</strong></h5>
										<input type="text" class="form-control" name="empresa"  autocomplete="off" required id="emp">
									</div>
									<div class="col-lg-6">
										<h5><strong>Ciudad</strong></h5>
										<input type="text" class="form-control" name="ciudad" id="ciu" autocomplete="off" required >
									</div>
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<h5 ><strong>Área Observar</strong></h5>
									<textarea type="text" rows="2"class="form-control" name="area_observar" id="area-obser" autocomplete="off"  required></textarea>
								</div>
							</div>
				    	</div>
				  	</div>
				  	<div class="panel panel-default">
				    	<div class="panel-heading" role="tab" id="headingTwo">
				      		<h4 class="panel-title">
				        	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          		<strong>Datos Escolares</strong>
				        	</a>
				      		</h4>
				    	</div>
				    	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				    		<div class="panel-body">
								<div class="row col-lg-8 col-lg-offset-2 text-center">
									<div class="col-lg-4">
										<h5><strong>Carrera</strong></h5>
										<select class="form-control" name="carrera" id="sel">
										<?php
											switch ($_SESSION['departamento']){
												case 'Ciencias de la Tierra': ?>
													<option>Arquitectura</option>
													<?php
													break;
												case 'Ciencias Económico Administrativas': ?>
													<option>Contador Público</option>
													<option>Licenciatura en Administración</option>
													<?php
													break;
												case 'Industrial': ?>
													<option>Ingenería Industrial</option>
													<option>Ingenería en Gestión Empresarial</option>
													<?php
													break;
												case 'Eléctrica y Electrónica': ?>
													<option>Ingenería Mecatrónica</option>
													<?php
													break;
												case 'Química y Bioquímica': ?>
													<option>Ingenería Bioquímica</option>
													<option>Ingenería Ambiental</option>
													<?php
													break;
												case 'Sistemas y Computación': ?>
													<option>Ingenería en Sistemas Computacionales</option>
													<option>Ingenería Informática</option>
													<?php
													break;
												default:
													break;
											}
										?>
										</select>
									</div>
									<div class="col-lg-4">
										<h5><strong>Semestre</strong></h5>
										<input type="number" class="form-control" name="semestre" max="10" min="1"id="carr"  autocomplete="off"required >
									</div>
									<div class="col-lg-4">
										<h5><strong>N° Alumnos</strong></h5>
										<input type="number" min="1" class="form-control" name="numero_alumnos" id="carr"  autocomplete="off"required >
									</div>
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<div class="col-lg-6">
										<h5><strong>Docente</strong></h5>
										<input type="text" class="form-control" name="docente" id="doc"  autocomplete="off"required >
									</div>
									<div class="col-lg-6">
										<h5><strong>Materia</strong></h5>
										<input type="text" class="form-control" name="materia" id="mat"  autocomplete="off"required >
									</div>
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<h5><strong>Correo</strong></h5>
									<input type="email" class="form-control" name="correo" id="cor"  autocomplete="off"required >
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<h5><strong>Objetivo</strong></h5>
									<textarea type="text" rows="2"  class="form-control" name="objetivo" id="obj"  autocomplete="off" required></textarea>
								</div>
								<div class="row col-lg-6 col-lg-offset-3 text-center">
									<input type="text" value="1" hidden name="bandera">
								</div>	
				    		</div>
				    	</div>
				  	</div>
				</div>
			</div>
		</div>
		<div class="row col-lg-12 text-center">
			<button type="submit" name="submit" value="Guardar" class="btn btn-primary btn-primary">Guardar</button><br><br>
		</div>
	</form>
	<?php if(count($fila)>0){ ?>
	<div class="contanier col-lg-12">
		<br>
		<table class="table text-center">
			 <thead style="width:100%">
				<tr>
					<td width="10%"><strong>Fecha Visita<strong/></td>
					<td width="15%"><strong>Empresa<strong/></td>
					<td width="15%"><strong>Ciudad<strong/></td>
					<td width="15%"><strong>Carrera<strong/></td>
					<td width="5%"><strong>Semestre<strong/></td>
					<td width="10%"><strong>N° Alumnos<strong/></td>
					<td width="15%"><strong>Docente<strong/></td>
					<td width="5%"><strong>Acciones<strong/></td>
				</tr>
			</thead>
			<?php foreach($fila as $data){ ?>
			<tbody style="width:100%">
				<tr>
					<td width="10%"><?php echo $data -> fecha_visita ;?></td>
					<td width="15%"><?php echo $data -> empresa ;?></td> 
					<td width="15%"><?php echo $data -> ciudad;?></td>
					<td width="15%"><?php echo $data -> carrera ;?></td>
					<td width="5%"><?php echo $data -> semestre ;?></td>
					<td width="10%"><?php echo $data -> no_alumnos ;?></td>
					<td width="15%"><?php echo $data -> docente ;?></td>
					<td width="5%">
						<form method="post" action="<?php echo base_url() ?>jefe/editar_solicitud">
						    <input type="text" name="id" value="<?php echo $data -> id ;?>" hidden>
						    <button type="submit" class="btn btn-default" title="Editar">
						        <span class="glyphicon glyphicon-edit"></span>
						    </button>
						</form>
		            </td>
					<td width="5%">
					    <form method="post" action="<?php echo base_url() ?>jefe/borrar_solicitud">
					        <input type="text" name="id" value="<?php echo $data -> id ;?>" hidden>
					        <button type="submit" class="btn btn-danger" title="Borrar">
					            <span class="glyphicon glyphicon-trash"></span>
					        </button>
						</form>
					</td>
				</tr>
			</tbody>
			<?php } ?>
		</table>
	</div>
	<div class="row col-lg-12 text-center">
		<button type="button" name="enviar" onClick="parent.location='<?php echo base_url() ?>jefe/enviar_solicitudes'" class="btn btn-primary btn-primary">Enviar al Subdirector</button>
	</div>
	<?php }
}
else{ ?>
	<div class="container col-lg-8 col-lg-offset-2 text-center">
		<br>
		<h3><strong>Ya se ha terminado el periodo del registro de solicitudes.</strong></h3>
	</div>
<?php } ?>