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
	<div id="contenedor">
		<div id="header">
			<div id="logos" class="group"></div> 
			<div id="nav">
				<div id="nav-bar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?php echo base_url('materiales/calendario') ?>">Calendario</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url('login/logout_ci') ?>">Cerrar sesión</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div><br><br>