<section class="content" id="content_list">
	<div class="row row-centered">
		<div class="col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid z-shadow-1">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-files-o"></i> <?=strtoupper($this->uniqueid);?>
					</h3>
					<div class="box-tools pull-right">
						<a href="<?=Yii::app()->createUrl('solicitudes/create');?>" class="btn bg-olive btn-lg hidden-xs hidden-sm">
							<i class="fa fa-pencil-square-o"></i> Levantar Solicitud
						</a>
						<a href="<?=Yii::app()->createUrl('solicitudes/create');?>" class="btn bg-olive btn-lg hidden-md hidden-lg hidden-xl">
							<i class="fa fa-pencil-square-o"></i>
						</a>
					</div>
				</div>
				<!--<button class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>-->
				<div class="box-body" id="contenido"></div>
			</div>
		</div>
	</div>
</section>
<section class="content" id="content_vacio" style="display:none;">
	<?php /* ?>
	<div class="row row-centered">
		<div class="col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid box-warning z-shadow-1">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-exclamation-triangle"></i> ATENCIÓN
					</h3>
				</div>
				<div class="box-body" id="contenido2">
					<h2>Usted no ha hecho solicitudes recientemente</h2>
					<h3>Para levantar una solicitud haga clic en <i><u>Levantar solictud</u></i></h3>
					<br>
					<a href="<?=Yii::app()->createUrl('solicitudes/create');?>" class="btn btn-lg btn-default"><i class="fa fa-pencil-square-o"></i> Levantar Solicitud</a>
				</div>
			</div>
		</div>
	</div>
	<?php */ ?>
	<div class="row row-centered">
		<div class="col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid box-success z-shadow-1">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-star"></i> BUEN TRABAJO
					</h3>
				</div>
				<div class="box-body" id="contenido2">
					<h2>Usted ha atendido a todas las solicitudes</h2>
					<?php if(isset($datos)&&$datos->profile->id_privilegio>=5){ ?>
						<h3>si desea levantar una solicitud haga clic en <i><u>Levantar solictud</u></i></h3>
						<br>
						<a href="<?=Yii::app()->createUrl('solicitudes/create');?>" class="btn btn-lg btn-default"><i class="fa fa-pencil-square-o"></i> Levantar Solicitud</a>
					<?php }else{ ?>
						<h3>
							Puede regresar más tarde, <i class="fa fa-clock-o"></i> mientras se le asigna alguna otra solicitud.
							<br>
						</h3>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$.ajax({
		url: "http://'.$this->url_server.'/server_gar/solicitud/index.html",
		type: "post",
		dataType: "jsonp",
		data: {user_id:'.Yii::app()->user->id.'},
		success: function(data){
			$("#contenido").empty();
			if(data.data.solicitudes!=null){
				$("#content_list").show();
				$.post(
					"http://'.$this->url_server.'/cliente_gar/solicitudes/index.html",
					{data:data.data},
					function(data){
						$("#contenido").html(data);
					}
				);
			}else{
				$("#content_vacio").show();
				$("#content_list").hide();
			}
		}
	});',
	CClientScript::POS_READY
);
?>