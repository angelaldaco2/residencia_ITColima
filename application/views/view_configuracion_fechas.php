<form method="post" action="<?php echo base_url(); ?>vinculacion/guardar_configuracion">
	<div class="container">
		<div class="row col-sm-4 col-sm-offset-4">
			<label for="fecha-solicitud">Fecha límite de registro de solicitudes</label>
			<input type="date" class="form-control" name="fecha-solicitud" id="fecha-solicitud" value="<?php echo $fila->fecha_solicitud; ?>"><br>
		</div>
		<div class="row col-sm-4 col-sm-offset-4">
			<label for="fecha-subdireccion">Fecha límite de revisión del subdirector</label>
			<input type="date" class="form-control" name="fecha-subdireccion" id="fecha-subdireccion" value="<?php echo $fila->fecha_subdireccion; ?>"><br>
		</div>
		<div class="row col-sm-6 col-sm-offset-3">
			<h4><strong>Periodo de visitas</strong></h4>
			<div class="col-sm-6">
				<label for="fecha-inicio">Fecha de inicio</label>
				<input type="date" class="form-control" name="fecha-inicio" id="fecha-inicio" value="<?php echo $fila->fecha_inicio; ?>">
			</div>
			<div class="col-sm-6">
				<label for="fecha-fin">Fecha de fin</label>
				<input type="date" class="form-control" name="fecha-fin" id="fecha-fin" value="<?php echo $fila->fecha_fin; ?>"><br><br>
			</div>
		</div>
	</div>
	<div class="row text-center">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>
</form>