<?php date_default_timezone_set('America/Mexico_City'); ?>
<form method="post" action="<?php echo base_url() ?>events/save">
    <?php if(count($fila)>0): foreach($fila as $data){
        $date= new DateTime($data->fecha_visita);
        $d= $date->format('d');
        $m= $date->format('m');
        $Y= $date->format('Y');
        $fecha=$d.'/'.$m.'/'.$Y.' '.'10:00';
        
        $fecha_actual=date("Y").'-'.date("m").'-'.date("d");
    ?>
    <div class="row col-lg-6 text-center col-lg-offset-3">
        <div class="col-lg-6">
            <input type="text" name="id" id="id" value="<?php echo $data->id ?>" hidden>
            <label for="empresa">Empresa</label><br>
            <input type="text" class="form-control" name="title" id="empresa" value="<?php echo $data->empresa ?>" readonly><br>
        </div>
        <div class="col-lg-6">
            <label for="ciudad">Ciudad</label><br>
            <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?php echo $data->ciudad ?>" readonly><br>
        </div>
    </div>
    <div class="row col-lg-8 text-center col-lg-offset-2">
        <div class="col-lg-4">
            <label for="fecha-inicio">Fecha</label><br>
            <input type="date" class="form-control" name="from" id="fecha-inicio" value="<?php echo $d.'/'.$m.'/'.$Y.' '.'10:00'; ?>" readonly><br>
            <input type="text" name="to" id="fecha-fin" value="<?php echo $d.'/'.$m.'/'.$Y.' '.'10:00'; ?>" hidden>
        </div>
        <div class="col-lg-4">
            <label for="carrera">Carrera</label><br>
            <input type="text" class="form-control" name="carrera" id="carrera" value="<?php echo $data->carrera ?>" readonly><br>
        </div>
        <div class="col-lg-4">
            <label for="alumnos">No. Alumnos</label><br>
            <input type="text" class="form-control" name="alumnos" id="alumnos" value="<?php echo $data->no_alumnos ?>" readonly><br>
        </div>
    </div>
    <div class="row col-lg-6 text-center col-lg-offset-3">
        <div class="col-lg-6">
            <label for="semestre">Semestre</label><br>
            <input type="text" class="form-control" name="semestre" id="semestre" value="<?php echo $data->semestre ?>" readonly><br>
        </div>
        <div class="col-lg-6">
            <label for="maestro">Maestro</label><br>
            <input type="text" class="form-control" name="event" id="maestro" value="<?php echo $data->docente ?>" readonly><br>
        </div>
    </div>
    <div class="row col-lg-4 text-center col-lg-offset-4">
        <div class="col-lg-6">
            <label for="hora_visita">Hora de visita</label><br>
            <input type="time" class="form-control" name="hora_visita" id="hora_visita" required><br>
        </div>
        <div class="col-lg-6">
            <label for="hora_regreso">Hora de regreso</label><br>
            <input type="time" class="form-control" name="hora_regreso" id="hora_regreso" required><br>
        </div>
    </div>
    <div class="row col-lg-6 text-center col-lg-offset-3">
        <div class="col-lg-12">
            <label for="hora_visita">Observaciones</label><br>
            <input type="text" class="form-control" name="observaciones" id="observaciones"><br>
        </div>
    </div>
    <div class="row col-lg-2 text-center col-lg-offset-5">
        <div class="col-lg-12">
            <button class="btn btn-success btn-block" type="submit">Agregar</button>
        </div>
    </div>
    <?php
    } endif;
    ?>
</form>