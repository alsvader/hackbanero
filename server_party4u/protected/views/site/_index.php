<?php 
	/*ARREGLOS
	$Solicitudes=Solicitud::model()->findAll(array('limit'=>5,'order'=>'fecha desc'));
	$Ordenes=Orden::model()->findAll(array('limit'=>5,'order'=>'fecha_realizado desc'));
	$oficinas=Subdepto::model()->findAll("idDepartamento=".$datos->profile->idDepartamento);*/
	/*$datos=User::model()->findByPk(Yii::app()->user->id);
?>
<section class="content-header">
	<h1 class="text-center">Panel</h1>
	<ol class="breadcrumb hidden-sm hidden-xs">
		<li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		<li class="active"><i class="fa fa-dashboard"> Panel</i></li>
	</ol>
</section>
<?php if(!Yii::app()->user->isAdmin()): ?>
	<?php switch($datos->profile->id_privilegio){
		case 'Jefe de departamento':
			include 'panel_jefedepto.php';
			break;
		case 'Jefe de oficina':
			include 'panel_jefeoficina.php';
			break;
		case 'Personal de departamento':
			include 'panel_personal.php';
			break;
		default:
			break;
	} ?>
<?php else: ?>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="info-box bg-green">
					<span class="info-box-icon">
						<i class="fa fa-files-o"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">Solicitudes Sin Asignar</span>
						<span class="info-box-number"><?php #$count=count(Solicitud::model()->findAll("idOficina is NULL AND estado2 is NULL AND estado1=1"));echo $count; ?></span>
						<span class="progress-description">
							<a href="<?=Yii::app()->createUrl('solicitud/index');?>" class="btn btn-xs btn-default">
								VER
							</a>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="info-box bg-blue">
					<span class="info-box-icon">
						<i class="fa fa-files-o"></i>
					</span>
					<div class="info-box-content">
						<span class="info-box-text">Órdenes sin finalizar</span>
						<span class="info-box-number"><?php #$count=count(Orden::model()->findAll("estado1 IS NULL AND estado2 IS NOT NULL"));echo $count; ?></span>
						<span class="progress-description">
							<a href="<?=Yii::app()->createUrl('orden/index');?>" class="btn btn-xs btn-default">
								VER
							</a>
						</span>
					</div>
				</div>
			</div>
				<div class="col-lg-6">
					<div class="box box-success">
						<div class="box-header text-center">
							<h3 class="box-title">Solicitudes Recientes</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr class="bg-green">
										<th>Folio</th>
										<th>Área</th>
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($Solicitudes as $solicitud): ?>
										<tr>
											<td><?=date("Ymd",strtotime($solicitud->fecha))."-".($solicitud->id<10?"000":($solicitud->id<100?"00":($solicitud->id<1000?"0":""))).$solicitud->id?></td>
											<td><?=$solicitud->area0->nombre_departamento?></td>
											<td>
												<?#=Solicitud::getNombreUsuario($solicitud->nombre)?>
												<?=$solicitud->nombre0->profile->nombres." ".$solicitud->nombre0->profile->apellido_paterno?>
											</td>
											<td><?=date("d/m/Y",strtotime($solicitud->fecha))?></td>
											<td><?=date("H:i:s",strtotime($solicitud->fecha))?></td>
											<td>
												<a href="<?=Yii::app()->createUrl('solicitud/view',array('id'=>$solicitud->id))?>" class="hidden-xs hidden-sm btn btn-sm btn-success">Ver</a>
												<a href="<?=Yii::app()->createUrl('solicitud/view',array('id'=>$solicitud->id))?>" class="hidden-xl hidden-lg hidden-md btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="box box-success">
						<div class="box-header text-center">
							<h3 class="box-title">Órdenes Recientes</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr class="bg-green">
										<th>No. Orden</th>
										<th>Folio</th>
										<th>Oficina</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($Ordenes as $orden): ?>
										<tr>
											<td><?=($orden->id<10?"000":($orden->id<100?"00":($orden->id<1000?"0":""))).$orden->id?></td>
											<td><?=date("Ymd",strtotime($orden->fechaSol))."-".($orden->idSolicitud<10?"000":($orden->idSolicitud<100?"00":($orden->idSolicitud<1000?"0":""))).$orden->idSolicitud?></td>
											<td><?=$orden->asignado_a?></td>
											<td><?=date("d/m/Y",strtotime($orden->fecha_realizado))?></td>
											<td><?=date("H:i:s",strtotime($orden->fecha_realizado))?></td>
											<td>
												<a href="<?=Yii::app()->createUrl('orden/view',array('id'=>$orden->id))?>" class="hidden-xs hidden-sm btn btn-sm btn-success">Ver</a>
												<a href="<?=Yii::app()->createUrl('orden/view',array('id'=>$orden->id))?>" class="hidden-xl hidden-lg hidden-md btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header">
						<h3 class="box-title">Solicitudes pendientes</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<?php #foreach($oficinas as $oficina): ?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="info-box bg-navy">
										<span class="info-box-icon"><i class="fa fa-building-o"></i></span>
										<div class="info-box-content">
											<span class="info-box-text"><?#=$oficina->nombre;?></span>
											<div class="progress">
												<div class="progress-bar" style="width: 100%"></div>
											</div>
											<?php #$sol_en_cola = Solicitud::model()->findAll("idOficina=".$oficina->id); ?>
											<span class="info-box-number"><?#=count($sol_en_cola);?> solicitudes en cola</span>
										</div>
									</div>
								</div>
							<?php #endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<!--<div class="col-md-4 chart-responsive">
				<div class="box box-danger">
					<div class="box-header">
						<h3 class="box-title">Semana <?php #$semana=date("w");echo $semana;?></h3>
					</div>
					<div class="box-body">
						<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
					</div>
				</div>
			</div>-->
		</div>
	</section>
	<?php
		Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/morris/morris.min.js', CClientScript::POS_END);
		Yii::app()->clientScript->registerScript('dataTable-example1', 
			'$(document).ready(function(){
				var donut = new Morris.Donut({
					element: "sales-chart",
					resize: true,
					colors: ["#3c8dbc", "#f56954", "#00a65a"],
					data: [
					{label: "Download Sales", value: 12},
					{label: "In-Store Sales", value: 30},
					{label: "Mail-Order Sales", value: 20}
					],
					hideHover: "auto"
				});
			});', CClientScript::POS_END);
	?>
<?php endif */?>