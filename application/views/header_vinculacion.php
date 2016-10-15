<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://itcolima.edu.mx/www/assets/css/style.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="../../bootstrap/css/inicio_sesion.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #fafafa;">
	<script>
    $(function(){
        $('.mdl').on('click', function(){
            id = $(this).attr('data-id');
            $.ajax({
                type:"POST",
                url:"<?php echo base_url() ?>/vinculacion/sel_fecha",
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
	<div id="contenedor">
		<div id="header">
			<div id="logos" class="group"></div> 
			<div id="nav">
				<div id="nav-bar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?php echo base_url('vinculacion/calendario') ?>">Calendario</a></li>
						<li><a href="<?php echo base_url('vinculacion/solicitudes_aceptadas') ?>">Solicitudes</a></li>
						<li><a href="<?php echo base_url('vinculacion/empresas') ?>">Empresas</a></li>
						<li><a href="<?php echo base_url('vinculacion/usuarios') ?>">Usuarios</a></li>
						<li><a href="<?php echo base_url('vinculacion/configuracion') ?>">Configuración</a></li>
						<li><a href="" class="mdl" data-toggle="modal" data-target="#elModal">Reportes</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url('login/logout_ci') ?>">Cerrar sesión</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div><br><br>

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