<?php date_default_timezone_set('America/Mexico_City');?>
<?php if(count($fila)>0): foreach ($fila as $data) {
	$carrera=  $data -> carrera;
	$turno= $data -> turno ;
    $periodo= $data -> periodo_escolar;
?>
<form class="form" method="post" action="<?php echo base_url() ?>jefe/actualizar_solicitud">
	<input type="text" name='id' id='id' value="<?php echo $data -> id ;?>" hidden>
	<input type="text" name='status_visita' id='status_visita' value="<?php echo $data -> status_visita ;?>" hidden>
	<div class="row col-lg-6 col-lg-offset-3 text-center">
		<div class="col-lg-6">
			<h5><strong>Fecha Elaboración</strong></h5>
			<input type="date" readonly  class="form-control" name="fecha_elaboracion" id="fech" value="<?php echo $data -> fecha_elaboracion; ?>" autocomplete="off" required>
		</div>
		<div class="col-lg-6">
			<h5 ><strong>Periodo Escolar</strong></h5>
			<select class="form-control" name="periodo_escolar" value="<?php echo $data -> periodo_escolar; ?>"id="sel">
			<option>Enero - Junio</option>
			<option>Agosto - Diciembre</option>
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
									<input type="date" min="<?php echo date("Y-m-d", time() + 86400); ?>" class="form-control" name="fecha_visita" id="fech-v" value="<?php echo $data -> fecha_visita; ?>" autocomplete="off" auto-focus required>
								</div>
								<div class="col-lg-6">
									<h5 ><strong>Turno Visita</strong></h5>
									<select class="form-control" name="turno" value="<?php echo $data -> turno;?>" id="sel">
									<?php switch ($turno) {
                                        case 'Matutino': ?>
                                            <option selected>Matutino</option>
                                            <option>Vespertino</option>
                                            <?php
                                            break;
                                        case 'Vespertino': ?>
                                        	<option>Matutino</option>
                                            <option selected>Vespertino</option>
                                            <?php
                                            break;
                                        default:   
                                            break;
                                    } ?>
									</select>
								</div>
							</div>
							<div class="row col-lg-6 col-lg-offset-3 text-center">
								<div class="col-lg-6">
									<h5><strong>Empresa</strong></h5>
									<input type="text" class="form-control" name="empresa" id="emp" value="<?php echo $data -> empresa; ?>" autocomplete="off"required >
								</div>
								<div class="col-lg-6">
									<h5><strong>Ciudad</strong></h5>
									<input type="text" class="form-control" name="ciudad" id="ciu" value="<?php echo $data -> ciudad; ?>" autocomplete="off"required >
								</div>
							</div>
							<div class="row col-lg-6 col-lg-offset-3 text-center">
								<h5 ><strong>Área Observar</strong></h5>
								<input type="text" rows="2"class="form-control" name="area_observar" id="area-obser" value="<?php echo $data -> area_observar; ?>" autocomplete="off" required></input>
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
									<select class="form-control" name="carrera" id="sel" value="<?php echo $data -> carrera;?>">
									<?php switch ($carrera) {
										case 'Arquitectura': ?>
											<option selected>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Contador Público': ?>
											<option>Arquitectura</option>
											<option selected>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería Ambiental':	?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option selected>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería Bioquímica': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option selected>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería en Gestión Empresarial': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option selected>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería en Sistemas Computacionales': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option selected>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería Industrial': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option selected>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería Informática': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option selected>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Ingenería Mecatrónica': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option selected>Ingenería Mecatrónica</option>
											<option>Licenciatura en Administración</option>
											<?php
											break;
										case 'Licenciatura en Administración': ?>
											<option>Arquitectura</option>
											<option>Contador Público</option>
											<option>Ingenería Ambiental</option>
											<option>Ingenería Bioquímica</option>
											<option>Ingenería en Gestión Empresarial</option>
											<option>Ingenería en Sistemas Computacionales</option>
											<option>Ingenería Industrial</option>
											<option>Ingenería Informática</option>
											<option>Ingenería Mecatrónica</option>
											<option selected>Licenciatura en Administración</option>
											<?php
											break;
										default:
											break;
									} ?>
									</select>
								</div>
								<div class="col-lg-4">
									<h5><strong>Semestre</strong></h5>
									<input type="number" class="form-control" name="semestre" max="10" min="1"id="carr" value="<?php echo $data -> semestre;?>"autocomplete="off"required >
								</div>
								<div class="col-lg-4">
									<h5><strong>N° Alumnos</strong></h5>
									<input type="number" min="1" class="form-control" name="no_alumnos" id="carr"  value="<?php echo $data -> no_alumnos;?>"autocomplete="off" required >
								</div>
							</div>
							<div class="row col-lg-6 col-lg-offset-3 text-center">
								<div class="col-lg-6">
									<h5><strong>Docente</strong></h5>
									<input type="text" class="form-control" name="docente" id="doc" value="<?php echo $data -> docente;?>" autocomplete="off"required >
								</div>
								<div class="col-lg-6">
									<h5><strong>Materia</strong></h5>
									<input type="text" class="form-control" name="materia" id="mat" value="<?php echo $data -> materia;?>" autocomplete="off"required >
								</div>
							</div>
							<div class="row col-lg-6 col-lg-offset-3 text-center">
								<h5><strong>Correo</strong></h5>
								<input type="email" class="form-control" name="correo" id="cor" value="<?php echo $data -> correo;?>" autocomplete="off"required >
							</div>
							<div class="row col-lg-6 col-lg-offset-3 text-center">
								<h5><strong>Objetivo</strong></h5>
								<input type="text" rows="2"  class="form-control" name="objetivo" id="obj" value="<?php echo $data -> objetivo;?>" autocomplete="off" required></input>
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
	<div class="row col-lg-4 col-lg-offset-4">
		<div class="col-lg-6 text-center">
			<button type="submit" name="submit" class="btn btn-primary btn-primary">Guardar</button>
		</div>
		<div class="col-lg-6 text-center">
			<a href="<?php echo base_url(); ?>jefe/index" type="button" name="submit" class="btn btn-primary btn-danger">Cancelar</a>
		</div>
	</div>
</form>
<?php
	}endif;
?>
