<script>
    $(function(){
        $('.aceptado').on('click',function(){
            id = parseInt($(this).attr('data'));
            context = $(this);
            $.ajax({
                url:"<?php echo base_url('/subdireccion/aceptado'); ?>",
                type:"POST",
                data:{
                    id:id,
                },
                success:function(data){
                    context.children('i').removeClass('glyphicon-remove btn btn-danger');
                    context.children('i').removeClass('glyphicon-ok btn btn-success');

                    if(data == 0){
                        context.children('i').addClass('glyphicon-remove btn btn-danger');
                    }
                    else if(data == 1){
                        context.children('i').addClass('glyphicon-ok btn btn-success');
                    }
                }
            });
            return false;
        });
    });
</script>
<form method="post" action="<?php echo base_url() ?>subdireccion/filtrar">
    <div class="container col-lg-4 col-lg-offset-3">
        <select class="form-control" name="filtrar">
            <option>Todos</option>
            <option>Arquitectura</option>
            <option>Licenciatura en Administración</option>
            <option>Contador Público</option>
            <option>Ingenería Ambiental</option>
            <option>Ingenería Bioquimica</option>
            <option>Ingenería Industrial</option>
            <option>Ingenería Informática</option>
            <option>Ingenería en Sistemas Computacionales</option>
            <option>Ingenería en Gestión Empresarial</option>
            <option>Ingenería Mecatrónica</option>
        </select>
    </div>
    <div class="col-lg-2">
        <input type="submit" value="Buscar" class="btn btn-primary btn-primary"><br>
    </div>
</form>
<?php if(count($fila)>0){ ?>
<!-- <button type="button" class="btn btn-default mdl" title="Ver detalles de la visita" data-toggle="modal" data-target="#elModal">
    <span class="glyphicon glyphicon-list-alt"></span> Generar reporte en PDF
</button> -->
<br><br><br>
<div class="container">
    <table class="table">
        <thead style="width:100%">
            <tr>
                <td width="15%"><strong>Empresa<strong/></td>
                <td width="15%"><strong>Ciudad<strong/></td>
                <td width="8%"><strong>Fecha<strong/></td>
                <td width="20%"><strong>Carrera<strong/></td>
                <td width="10%"><strong>Semestre<strong/></td>
                <td width="17%"><strong>Maestro<strong/></td>
                <td width="5%"><strong>Acción<strong/></td>
            </tr>
        </thead>
        <?php foreach($fila as $data){ ?>
        <tbody style="width:100%">
            <tr>
                <td width="15%"><?php echo $data -> empresa ;?></td>
                <td width="15%"><?php echo $data -> ciudad ;?></td>
                <td width="8%"><?php echo $data -> fecha_visita ;?></td>
                <td width="20%"><?php echo $data -> carrera ;?></td>
                <td width="10%"><?php echo $data -> semestre ;?></td>
                <td width="17%"><?php echo $data -> docente ;?></td>
                <td width="5%">
                    <a href="#" class="aceptado" data="<?php echo $data -> id; ?>"><i class="glyphicon <?php echo $data -> activo == 0 ? "glyphicon-remove btn btn-danger" : "glyphicon-ok btn btn-success" ?> "></i></a>
                </td>
                <td width="5%">
                    <form method="post" action="<?php echo base_url() ?>subdireccion/consultar">
                        <input type="text" name="folio" value="<?php echo $data -> id ;?>" hidden>
                        <button type="submit" class="btn btn-default" title="Ver detalles">
                            Detalles <span class="glyphicon glyphicon-info-sign"></span>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php };
    }
    else{?>
        <div class="container text-center">
            <br><br><h3>No hay solicitudes.</h3>
        </div>
    <?php } ?>
    </table>
</div>
<br>
<!-- Modal -->
<div class="modal fade" id="elModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Generar reporte</h4>
            </div>
            <div class="modal-body" style="height: 200px">
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>