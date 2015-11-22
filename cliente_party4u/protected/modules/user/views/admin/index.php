<style type="text/css">
	.box.box-solid.box-purple {
		border: 1px solid #4F4C8B;
	}
	.box-header {
		background-color: #4F4C8B;
		color: white;
	}
</style>
<section class="content">
	<?php /* ?>
	<div class="row row-centered">
		<div class="col-md-12 col-centered">
			<div class="text-center">
				<div class="btn-group">
					<a href="<?=Yii::app()->controller->createUrl('create')?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/create'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Delete">
						<i class="fa fa-user-plus"></i>
					</a>
					<a href="<?=$_SERVER["REQUEST_URI"]!=(Yii::app()->createUrl('/user/admin/personal'))?Yii::app()->controller->createUrl('/user/admin/personal'):"#"?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
						<i class="fa fa-users"></i>
					</a>
					<a href="<?=Yii::app()->createUrl('subdepto/create',array('data'=>1))?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/update',array('id'=>$id)))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
						<i class="fa fa-building-o"></i>
						<style type="text/css">
							.hola{
								position: absolute;
							}
						</style>
						<i class="fa fa-plus-circle" style="font-size:14px;position: absolute;margin-left:-5px;margin-top:-6px;"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row-centered">
		<div class="btn-group">
			<a href="<?=Yii::app()->controller->createUrl('create')?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/create'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Delete">
				<!--<i class="ion ion-person-add"></i>-->
				<i class="fa fa-user-plus"></i>
			</a>
			<a href="<?=$_SERVER["REQUEST_URI"]!=(Yii::app()->createUrl('/user/admin/personal'))?Yii::app()->controller->createUrl('/user/admin/personal'):"#"?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
				<i class="fa fa-users"></i>
			</a>
			<a href="<?=Yii::app()->createUrl('subdepto/create',array('data'=>1))?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/update',array('id'=>$id)))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
				<i class="fa fa-building-o"></i>
				<style type="text/css">
					.hola{
						position: absolute;
					}
				</style>
				<i class="fa fa-plus-circle" style="font-size:14px;position: absolute;margin-left:-5px;margin-top:-6px;"></i>
			</a>
		</div>
	</div>
	<?php */ ?>
	<br class="hidden-xs hidden-sm">
	<div class="row row-centered">
		<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid box-purple z-shadow-1">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-users"></i> Lista de Usuarios
						<a href="<?=Yii::app()->createUrl('user/admin/create');?>" class="btn btn-default pull-right" style="background-color: #fff;border-color: #ccc;">
							<i class="fa fa-plus"></i> &nbsp;Agregar
						</a>
					</h3>
				</div>
				<div class="box-body" id="contenido">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Departamento</th>
								<th class="text-center">Fecha Alta</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($model as $key): ?>
								<tr>
									<td><?=$key->id?></td>
									<td><?=$key->username?></td>
									<td><?=$key->profile->nombres.' '.$key->profile->apellido_paterno.' '.$key->profile->apellido_materno?></td>
									<td><?#=(Departamento::Pertenece($key->id)==""?"Sin Asignar":Departamento::Pertenece($key->id));?></td>
									<td class="text-center"><?=date("d/m/Y  H:i",strtotime($key->create_at));?></td>
									<td>
										<a href="<?=Yii::app()->createUrl('user/admin/view',array('id'=>$key->id))?>" class="hidden-xs hidden-sm btn btn-sm bg-purple">Ver</a>
										<a href="<?=Yii::app()->createUrl('user/admin/view',array('id'=>$key->id))?>" class="hidden-xl hidden-lg hidden-md btn btn-sm bg-purple"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th>ID</th>
								<th>Usuario</th>
								<th>Nombre</th>
								<th>Departamento</th>
								<th class="text-center">Fecha Alta</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php /*
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$.ajax({
		url: "http://'.$this->url_server.'/server_gar/solicitud/index.html",
		type: "post",
		dataType: "jsonp",
		data: {user_id:'.Yii::app()->user->id.'},
		success: function(data){
			$("#contenido").empty();
			$.post(
				"http://'.$this->url_server.'/cliente_gar/solicitudes/index.html",
				{data:data.data},
				function(data){
					$("#contenido").html(data);
				}
			);
		}
	});',
	CClientScript::POS_READY
);*/
?>
















<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/assets/plugins/datatables/dataTables.bootstrap.css');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/datatables/jquery.dataTables.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/datatables/dataTables.bootstrap.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScript('dataTable-example1', 
	'$(document).ready(function() {
		$("#example1").dataTable({
			"oLanguage": {
				"sZeroRecords": "No se encontraron usuarios filtradas",
				"sLengthMenu": "Mostrar <select>"+
					"<option value=\"5\">5</option>"+
					"<option value=\"10\">10</option>"+
					"<option value=\"20\">20</option>"+
					"<option value=\"30\">30</option>"+
					"<option value=\"40\">40</option>"+
					"<option value=\"50\">50</option>"+
					"<option value=\"-1\">Todas</option>"+
				"</select> usuarios por página",
				"sInfoPostFix": "",
				"sInfoEmpty": "No se encontraron resultados en la busqueda",
				"sEmptyTable": "No se encontraron coincidencias en las usuarios",
				"sInfoFiltered": "(Filtrados de _MAX_ Usuarios)",
				"sSearch": "Buscar",
				"oPaginate": {
					"sPrevious": "",
					"sNext": "",
					"sFirst": "Primera",
					"sLast": "Última"
				},
				"sInfo": "Resultados (_START_ de _END_) <br>Total de usuarios:_TOTAL_",
			} 
		});
		$(".search-button").click(function(e) {
			$("#buscarSolicitud").modal("show");
		});
		$("#reservationtime").daterangepicker({timePicker: true, timePickerIncrement: 30, format: "MM/DD/YYYY h:mm A"});
	});', CClientScript::POS_END);
?>