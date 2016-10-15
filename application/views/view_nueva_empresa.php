<form class="form" method="post" action="<?php echo base_url() ?>vinculacion/guardar_empresa">
	<div class="container col-lg-6 col-lg-offset-3">
		<div class="container col-lg-12 text-center">
			<h4><strong>Registrar nueva empresa</strong></h4>
		</div>
		<div class="form-group">
			<label for="cve">Nombre corto:</label>
			<input type="text" class="form-control" name="clave" id="cve" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="nom">Nombre completo:</label>
			<input type="text" class="form-control" name="nombre" id="nom" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="t1">Teléfono 1:</label>
			<input type="text" class="form-control" name="tel1" id="t1" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="t2">Teléfono 2:</label>
			<input type="text" class="form-control" name="tel2" id="t2" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="correo">Correo electrónico:</label>
			<input type="email" class="form-control" name="email" id="correo" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="dir">Dirección:</label>
			<input type="text" class="form-control" name="direccion" id="dir" autocomplete="off" required>
		</div>
		<div class="container col-lg-12 text-center">
			<input type="submit" name="submit" class="btn btn-success"  value="Guardar"/>
		</div>
	</div>
</form>