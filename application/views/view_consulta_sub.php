<?php date_default_timezone_set('America/Mexico_City');?>
<?php if(count($fila)>0): foreach ($fila as $data) {
    $carrera= $data -> carrera ;
    $turno= $data -> turno ;
    $periodo= $data -> periodo_escolar;
?>
<form class="form" method="post" action="<?php echo base_url(); ?>subdireccion/solicitudes">
    <input type="text" name='id' id='id' value="<?php echo $data -> id ;?>" hidden>
    <div class="row col-lg-6 col-lg-offset-3 text-center">
        <div class="col-lg-6">
            <h5><strong>Fecha Elaboración</strong></h5>
            <input type="date" readonly  class="form-control" name="fecha_elaboracion" id="fech" value="<?php echo $data -> fecha_elaboracion; ?>" autocomplete="off" required>
        </div>
        <div class="col-lg-6">
            <h5 ><strong>Periodo Escolar</strong></h5>
            <select class="form-control" name="periodo_escolar" value="<?php echo $data -> periodo_escolar; ?>"id="sel" readonly>
            <?php switch ($periodo) {
                case 'Enero - Junio': ?>
                    <option selected>Enero - Junio</option>
                    <?php
                    break;
                case 'Agosto - Diciembre': ?>
                    <option selected>Agosto - Diciembre</option>
                    <?php
                    break;
                default:
                    break;
            } ?>
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
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <strong>Datos de Visita</strong>
                        </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row col-lg-6 col-lg-offset-3 text-center">
                                <div class="col-lg-6">
                                    <h5 ><strong>Fecha Vista</strong></h5>
                                    <input type="date" min="<?php echo date("Y-m-d", time() + 86400); ?>" class="form-control" name="fecha_visita" id="fech-v" value="<?php echo $data -> fecha_visita; ?>" autocomplete="off" required readonly>
                                </div>
                                <div class="col-lg-6">
                                    <h5 ><strong>Turno Visita</strong></h5>
                                    <select class="form-control" name="turno" value="<?php echo $data -> turno;?>" id="sel" readonly>
                                    <?php switch ($turno) {
                                        case 'Matutino': ?>
                                            <option selected>Matutino</option>
                                            <?php
                                            break;
                                        case 'Vespertino': ?>
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
                                    <input type="text" class="form-control" name="empresa" id="emp" value="<?php echo $data -> empresa; ?>" autocomplete="off"required readonly>
                                </div>
                                <div class="col-lg-6">
                                    <h5><strong>Ciudad</strong></h5>
                                    <input type="text" class="form-control" name="ciudad" id="ciu" value="<?php echo $data -> ciudad; ?>" autocomplete="off"required readonly>
                                </div>
                            </div>
                            <div class="row col-lg-6 col-lg-offset-3 text-center">
                                <h5 ><strong>Área Observar</strong></h5>
                                <input type="text" rows="2"class="form-control" name="area_observar" id="area-obser" value="<?php echo $data -> area_observar; ?>" autocomplete="off" required readonly></input>
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
                                    <select class="form-control" name="carrera" id="sel" value="<?php echo $data -> carrera;?>" readonly>
                                    <?php switch ($carrera) {
                                        case 'Arquitectura': ?>
                                            <option selected>Arquitectura</option>
                                            <?php
                                            break;
                                        case 'Contador Público': ?>
                                            <option selected>Contador Público</option>
                                            <?php
                                            break;
                                        case 'Ingenería Ambiental': ?>
                                            <option selected>Ingenería Ambiental</option>
                                            <?php
                                            break;
                                        case 'Ingenería Bioquímica': ?>
                                            <option selected>Ingenería Bioquímica</option>
                                            <?php
                                            break;
                                        case 'Ingenería en Gestión Empresarial': ?>
                                            <option selected>Ingenería en Gestión Empresarial</option>
                                            <?php
                                            break;
                                        case 'Ingenería en Sistemas Computacionales': ?>
                                            <option selected>Ingenería en Sistemas Computacionales</option>
                                            <?php
                                            break;
                                        case 'Ingenería Industrial': ?>
                                            <option selected>Ingenería Industrial</option>
                                            <?php
                                            break;
                                        case 'Ingenería Informática': ?>
                                            <option selected>Ingenería Informática</option>
                                            <?php
                                            break;
                                        case 'Ingenería Mecatrónica': ?>
                                            <option selected>Ingenería Mecatrónica</option>
                                            <?php
                                            break;
                                        case 'Licenciatura en Administración': ?>
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
                                    <input type="number" class="form-control" name="semestre" max="10" min="1"id="carr" value="<?php echo $data -> semestre;?>"autocomplete="off"required readonly>
                                </div>
                                <div class="col-lg-4">
                                    <h5><strong>N° Alumnos</strong></h5>
                                    <input type="number" min="1" class="form-control" name="no_alumnos" id="carr"  value="<?php echo $data -> no_alumnos;?>"autocomplete="off" required readonly>
                                </div>
                            </div>
                            <div class="row col-lg-6 col-lg-offset-3 text-center">
                                <div class="col-lg-6">
                                    <h5><strong>Docente</strong></h5>
                                    <input type="text" class="form-control" name="docente" id="doc" value="<?php echo $data -> docente;?>" autocomplete="off"required readonly>
                                </div>
                                <div class="col-lg-6">
                                    <h5><strong>Materia</strong></h5>
                                    <input type="text" class="form-control" name="materia" id="mat" value="<?php echo $data -> materia;?>" autocomplete="off"required readonly>
                                </div>
                            </div>
                            <div class="row col-lg-6 col-lg-offset-3 text-center">
                                <h5><strong>Correo</strong></h5>
                                <input type="email" class="form-control" name="correo" id="cor" value="<?php echo $data -> correo;?>" autocomplete="off"required readonly>
                            </div>
                            <div class="row col-lg-6 col-lg-offset-3 text-center">
                                <h5><strong>Objetivo</strong></h5>
                                <input type="text" rows="2"  class="form-control" name="objetivo" id="obj" value="<?php echo $data -> objetivo;?>" autocomplete="off" required readonly></input>
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
    <div class="row col-lg-6 col-lg-offset-3 text-center">
        <button type="submit" name="submit" class="btn btn-primary btn-primary">Regresar</button>
    </div>
</form>
<?php
    }endif;
?>