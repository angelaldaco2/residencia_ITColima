<form class="form" method="post" action="<?php echo base_url() ?>vinculacion/guardar_usuario">
	<div class="container col-lg-6 col-lg-offset-3">
		<div class="container col-lg-12 text-center">
			<h4><strong>Registrar nuevo usuario</strong></h4>
		</div>
		<div class="form-group">
			<label for="usr">Nombre de usuario:</label>
			<input type="text" class="form-control" name="clave" id="usr" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="nom">Nombre:</label>
			<input type="text" class="form-control" name="nombre" id="nom" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="pwd">Contraseña:</label>
			<input type="password" class="form-control" name="pass" id="pwd" autocomplete="off" required>
		</div>
		<div class="form-group">
			<label for="sel_dpto">Departamento:</label>
			<select class="form-control" name="departamento" id="sel_dpto">
				<option>Ciencias de la Tierra</option>
				<option>Ciencias Económico Administrativas</option>
				<option>Gestión Tecnológica y Vinculación</option>
				<option>Industrial</option>
				<option>Eléctrica y Electrónica</option>
				<option>Química y Bioquímica</option>
				<option>Recursos Materiales y Servicios</option>
				<option>Sistemas y Computación</option>
				<option>Subdirección Académica</option>
			</select>
		</div>
		<div class="form-group">
			<label for="sel_cargo">Cargo:</label>
			<select class="form-control" name="cargo" id="sel_cargo">
				<option>Jefe de departamento</option>
				<option>Subdirector</option>
				<option>Vinculacion</option>
				<option>Recursos materiales</option>
			</select>
		</div>
		<div class="container col-lg-12 text-center">
			<input type="submit" name="submit" class="btn btn-success" value="Guardar"/>
		</div>
	</div>
</form>