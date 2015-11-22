<style type="text/css">
	.box{
		border-top-color:#605ca8;
	}
</style>
<section class="content-header">
	<h1 class="text-center">
		<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"Lista del personal":"Lista de Usuarios"?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		<li class=""><i class="fa fa-users"></i> Usuarios</li>
		<li class="active"><i class="fa fa-list"></i>
			<?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('user/admin/personal'))?"Lista del personal":"Lista de Usuarios"?>
		</li>
	</ol>
</section>
<section class="content-header">
	<div class="row">
		<div class="col-md-<?=$col_size?>">
			<div class="mailbox-controls with-border text-center">
				<div class="text-center">
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
					<div class="btn-group pull-right">
                      <button type="button" class="btn btn-default btn-lg active">
                      	<i class="fa fa-list text-green"></i>
                      </button>
                      <a href="<?=Yii::app()->createUrl('user/admin/personal2')?>" class="btn btn-default btn-lg">
                      	<i class="fa fa-list-alt text-red"></i>
                      </a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php #$this->renderPartial('menu_pc', array('col_size'=>3)); ?>
		<?php #$this->renderPartial('menu_mobil', array('col_size'=>12)); ?>
		<div class="col-md-10 col-md-offset-1 hidden-xs">
			<div class="box">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr class="bg-purple">
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
						<tfoot class="bg-purple">
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
	<div class="row hidden-xl hidden-lg hidden-md hidden-sm">
		<div class="box">
			<div class="box-body no-padding">
				<ul class="products-list product-list-in-box">
					<?php /*if(isset($count) && $count>0): ?>
						<?php foreach($modelCel as $usuario): ?>
							<?php $this->renderPartial('_view', array('data'=>$usuario)); ?>
						<?php endforeach; ?>
					<?php else: ?>
						<center>
							NO HAY SOLICITUDES
						</center>
					<?php endif*/ ?>
				</ul>
			</div>
			<div class="box-footer text-center">
				<style type="text/css">
					.pagination>.active>a {
						background-color: #605ca8;
						border-color: #605ca8;
					}
				</style>
				<?php /*if(isset($count) && $count>0): ?>
					<?php
						$this->widget(
							'CLinkPager',
							array(
								'pages' => $pages,
								#'currentPage'=>$pages->getCurrentPage(),
								#'itemCount'=>$item_count,
								#'pageSize'=>$page_size,
								#'pageCount'=>4,
								'firstPageLabel' => '<i class="fa fa-angle-double-left"></i>',
								'prevPageLabel' => 'Atras',
								'nextPageLabel'=>'Sig',
								'lastPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
								'header'=>'',
								'selectedPageCssClass'=>'active',
								#'htmlOptions'=>array('class'=>'pagination pagination-lg inline'),
								'htmlOptions'=>array('class'=>'pagination','style'=>'padding:0px;margin:0px;'),
							)
						);
					?>
				<?php else: ?>
					...
				<?php endif */?>
			</div>
		</div>
	</div>
</section>
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