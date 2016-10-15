<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/visitas/bower_components/bootstrap-calendar/css/calendar.css">
	<script type="text/javascript" src="/visitas/bower_components/jquery/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/visitas/bower_components/bootstrap-calendar/js/language/es-ES.js"></script>
</head>
<body>
	<div class="container">
		<ol class="breadcrumb">
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
	        <div class="btn-group pull-right">
				<button class="btn btn-primary" data-calendar-nav="prev" id="prev"><< Anterior</button>
				<button class="btn" data-calendar-nav="today" id="today">Hoy</button>
				<button class="btn btn-primary" data-calendar-nav="next" id="next">Siguiente >></button>
			</div>
	    </ol>
		<div class="row">
			<label class="checkbox" hidden>
				<input type="checkbox" value="#events-modal" id="events-in-modal" checked="checked" hidden>
			</label>
		</div>
		<h3 class="text-center" id="mesmes"></h3>
		<script>
            var mes= new Date().getMonth()+1;
            var year= new Date().getFullYear();
            mes=parseInt(mes);
			var meslet="";
			if(mes==1){
				meslet="Enero";
			}
			if(mes==2){
				meslet="Febrero";
			}
			if(mes==3){
				meslet="Marzo";
			}
			if(mes==4){
				meslet="Abril";
			}
			if(mes==5){
				meslet="Mayo";
			}
			if(mes==6){
				meslet="Junio";
			}
			if(mes==7){
				meslet="Julio";
			}
			if(mes==8){
				meslet="Agosto";
			}
			if(mes==9){
				meslet="Septiembre";
			}
			if(mes==10){
				meslet="Octubre";
			}
			if(mes==11){
				meslet="Noviembre";
			}
			if(mes==12){
				meslet="Diciembre";
			}
			var div = document.getElementById("mesmes");
            div.textContent = ""+meslet+"".concat(' ', year);
            var text = div.textContent;
		</script>
		<div class="row">
			<div id="calendar"></div>
		</div>
		
		<!--ventana modal para el calendario-->
		<div class="modal fade" id="events-modal">
		    <div class="modal-dialog">
			    <div class="modal-content">
			        <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title">Detalles de la visita</h4>
			        </div>
				    <div class="modal-body" style="height: 500px">
				        <p>One fine body&hellip;</p>
				    </div>
			        <div class="modal-footer">
				        <button type="submit" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			        </div>
			    </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
    
    <script src="/visitas/bower_components/underscore/underscore-min.js"></script>
    <script src="/visitas/bower_components/bootstrap-calendar/js/calendar.js"></script>
    <script type="text/javascript">
	(function($){
		//creamos la fecha actual
		var date = new Date();
		var yyyy = date.getFullYear().toString();
		var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
		var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

		//establecemos los valores del calendario
		var options = {
			events_source: '<?php echo base_url() ?>events/getAll',
			view: 'month',
			language: 'es-ES',
			tmpl_path: '/visitas/bower_components/bootstrap-calendar/tmpls/',
			tmpl_cache: false,
			day: yyyy+"-"+mm+"-"+dd,
			time_start: '10:00',
			time_end: '20:00',
			time_split: '30',
			width: '100%',
			onAfterEventsLoad: function(events){
				if(!events){
					return;
				}
				var list = $('#eventlist');
				list.html('');

				$.each(events, function(key, val){
					$(document.createElement('li'))
						.html('<a href="' + val.url + '">' + val.title + '</a>')
						.appendTo(list);
				});
			},
			onAfterViewLoad: function(view){
				$('.page-header h3').text(this.getTitle());
				$('.btn-group button').removeClass('active');
				$('button[data-calendar-view="' + view + '"]').addClass('active');
			},
			classes: {
				months: {
					general: 'label'
				}
			}
		};

		var calendar = $('#calendar').calendar(options);

		$('.btn-group button[data-calendar-nav]').each(function(){
			var $this = $(this);
			$this.click(function(){
				calendar.navigate($this.data('calendar-nav'));
			});
		});

		$('.btn-group button[data-calendar-view]').each(function(){
			var $this = $(this);
			$this.click(function(){
				calendar.view($this.data('calendar-view'));
			});
		});

		$('#prev').each(function(){
			var $this = $(this);
			$this.click(function(){
				mes=mes-1;
				if(mes==0){
					mes=12;
					year=year-1;
				}

				var meslet="";
				if(mes==1){
					meslet="Enero";
				}
				if(mes==2){
					meslet="Febrero";
				}
				if(mes==3){
					meslet="Marzo";
				}
				if(mes==4){
					meslet="Abril";
				}
				if(mes==5){
					meslet="Mayo";
				}
				if(mes==6){
					meslet="Junio";
				}
				if(mes==7){
					meslet="Julio";
				}
				if(mes==8){
					meslet="Agosto";
				}
				if(mes==9){
					meslet="Septiembre";
				}
				if(mes==10){
					meslet="Octubre";
				}
				if(mes==11){
					meslet="Noviembre";
				}
				if(mes==12){
					meslet="Diciembre";
				}
				var div = document.getElementById("mesmes");
                div.textContent = ""+meslet+"".concat(' ', year);
                var text = div.textContent;
			});
		});

		$('#next').each(function(){
			var $this = $(this);
			$this.click(function(){
				mes=mes+1;
				var meslet="";
				if(mes==13){
					mes=1;
					year=year+1;
				}
				if(mes==1){
					meslet="Enero";
				}
				if(mes==2){
					meslet="Febrero";
				}
				if(mes==3){
					meslet="Marzo";
				}
				if(mes==4){
					meslet="Abril";
				}
				if(mes==5){
					meslet="Mayo";
				}
				if(mes==6){
					meslet="Junio";
				}
				if(mes==7){
					meslet="Julio";
				}
				if(mes==8){
					meslet="Agosto";
				}
				if(mes==9){
					meslet="Septiembre";
				}
				if(mes==10){
					meslet="Octubre";
				}
				if(mes==11){
					meslet="Noviembre";
				}
				if(mes==12){
					meslet="Diciembre";
				}
				var div = document.getElementById("mesmes");
                div.textContent = ""+meslet+"".concat(' ', year);
                var text = div.textContent;
			});
		});

		$('#today').each(function(){
			var $this = $(this);
			$this.click(function(){
				mes= new Date().getMonth()+1;
				var year= new Date().getFullYear();
                mes=parseInt(mes);
				var meslet="";
				if(mes==13){
					mes=1;
				}
				if(mes==1){
					meslet="Enero";
				}
				if(mes==2){
					meslet="Febrero";
				}
				if(mes==3){
					meslet="Marzo";
				}
				if(mes==4){
					meslet="Abril";
				}
				if(mes==5){
					meslet="Mayo";
				}
				if(mes==6){
					meslet="Junio";
				}
				if(mes==7){
					meslet="Julio";
				}
				if(mes==8){
					meslet="Agosto";
				}
				if(mes==9){
					meslet="Septiembre";
				}
				if(mes==10){
					meslet="Octubre";
				}
				if(mes==11){
					meslet="Noviembre";
				}
				if(mes==12){
					meslet="Diciembre";
				}
				var div = document.getElementById("mesmes");
                div.textContent = ""+meslet+"".concat(' ', year);
                var text = div.textContent;
			});
		});

		$('#first_day').change(function(){
			var value = $(this).val();
			value = value.length ? parseInt(value) : null;
			calendar.setOptions({first_day: value});
			calendar.view();
		});

		$('#events-in-modal').each(function(){
			var val = $(this).is(':checked') ? $(this).val() : null;
			calendar.setOptions( {
					modal: val,
					modal_type:'iframe'
				}
			);
		});
	}(jQuery));
    </script>
</body>
</html>