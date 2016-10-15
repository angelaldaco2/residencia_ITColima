<?php if(count($fila)>0){ ?>
<script>
    $(function(){
        $('.mdl').on('click', function(){
            id = $(this).attr('data-id');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>/jefe/info",
                data:{
                    id:id,
                },
                success:function(data){
                    $('.modal-body').html(data);

                }
            });
        });
    });
</script>
<?php 
if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){ ?>
<div class="container">
    <div class="row col-lg-9">
        <div class="col-lg-3">
            <span class="label label-success">  </span>
            <label>Solicitud confirmada </label>
        </div>
        <div class="col-lg-3">
            <span class="label label-warning">  </span>
            <label>Solicitud en proceso </label>
        </div>
        <div class="col-lg-3">
            <span class="label label-danger">  </span>
            <label>Solicitud cancelada </label>
        </div>
    </div>
</div>
<?php } ?>
<div class="container">
    <br>
    <table class="table text-center">
        <thead style="width:100%">
            <tr>
                <td width="20%"><strong>Empresa<strong/></td>
                <td width="20%"><strong>Ciudad<strong/></td>
                <td width="5%"><strong>Fecha<strong/></td>
                <td width="15%"><strong>Carrera<strong/></td>
                <td width="10%"><strong>Semestre<strong/></td>
                <td width="10%"><strong>N° Alumnos<strong/></td>
                <td width="20%"><strong>Maestro<strong/></td>
            </tr>
        </thead>
        <?php foreach($fila as $data){ 
            ?>
        <tbody style="width:100%">
            <?php if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Vinculacion'){ ?>
            <tr>
                <td width="20%"><?php echo $data -> empresa ;?></td>
                <td width="20%"><?php echo $data -> ciudad ;?></td>
                <td width="5%"><?php echo $data -> fecha_visita ;?></td>
                <td width="15%"><?php echo $data -> carrera ;?></td>
                <td width="10%"><?php echo $data -> semestre ;?></td>
                 <td width="10%"><?php echo $data -> no_alumnos ;?></td>
                <td width="20%"><?php echo $data -> docente ;?></td>
                <td width="5%">
                    <form method="post" action="<?php echo base_url() ?>vinculacion/nuevo_evento">
                        <input type="text" name="id" value="<?php echo $data -> id ;?>" hidden>
                        <button type="submit" class="btn btn-default" title="Agregar al calendario">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </button>
                    </form>
                </td>
            </tr>
            <?php }
            if ($_SESSION['is_logued_in']=='TRUE' && $_SESSION['cargo']=='Jefe de departamento'){
                if ($data->class == "event-important") { ?>
                <tr style="background-color: #FFACAC; text-center">
                    <td width="20%"><?php echo $data -> empresa ;?></td>
                    <td width="20%"><?php echo $data -> ciudad ;?></td>
                    <td width="5%"><?php echo $data -> fecha_visita ;?></td>
                    <td width="15%"><?php echo $data -> carrera ;?></td>
                    <td width="10%"><?php echo $data -> semestre ;?></td>
                    <td width="10%"><?php echo $data -> no_alumnos ;?></td>
                    <td width="20%"><?php echo $data -> docente ;?></td>
                    <td width="5%">
                        <button type="button" class="btn btn-default mdl" title="Ver motivos de cancelación" data-toggle="modal" data-target="#elModal" data-id="<?php echo $data->id; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </button>
                    </td>
                </tr>
               <?php }
               if ($data->class == "event-success") { ?>
                <tr style="background-color: #A9EC8D; text-center">
                    <td width="20%"><?php echo $data -> empresa ;?></td>
                    <td width="20%"><?php echo $data -> ciudad ;?></td>
                    <td width="10%"><?php echo $data -> fecha_visita ;?></td>
                    <td width="15%"><?php echo $data -> carrera ;?></td>
                    <td width="10%"><?php echo $data -> semestre ;?></td>
                     <td width="10%"><?php echo $data -> no_alumnos ;?></td>
                    <td width="20%"><?php echo $data -> docente ;?></td>
                    <td width="5%">
                        <button type="button" class="btn btn-default mdl" title="Ver detalles de la visita" data-toggle="modal" data-target="#elModal" data-id="<?php echo $data->id; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </button>
                    </td>
                </tr>
                <?php }
                if ($data->class == "event-warning") { ?>
                <tr style="background-color: #F9E994; text-center">
                    <td width="20%"><?php echo $data -> empresa ;?></td>
                    <td width="20%"><?php echo $data -> ciudad ;?></td>
                    <td width="10%"><?php echo $data -> fecha_visita ;?></td>
                    <td width="15%"><?php echo $data -> carrera ;?></td>
                    <td width="10%"><?php echo $data -> semestre ;?></td>
                     <td width="10%"><?php echo $data -> no_alumnos ;?></td>
                    <td width="20%"><?php echo $data -> docente ;?></td>
                    <td width="5%">
                        <button type="button" class="btn btn-default mdl" title="Ver detalles de la visita" data-toggle="modal" data-target="#elModal" data-id="<?php echo $data->id; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span>
                        </button>
                    </td>
                </tr>
                <?php }
            } ?>
        </tbody>
        <?php } ?>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="elModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Información de la visita</h4>
                </div>
                <div class="modal-body" style="height: 250px">
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
else{ ?>
    <div class="text-center">
        <br><br>
        <h4>No hay solicitudes pendientes.</h4>
    </div>
<?php }
?>
<br>