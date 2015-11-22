<section class="content">
	<div class="row">
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
									<td><?=Departamento::getNombre($solicitud->area)?></td>
									<td><?=Solicitud::getNombreUsuario($solicitud->nombre)?></td>
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
							<?php foreach ($Ordenes as $orden): ?>
								<tr>
									<td><?=($orden->id<10?"000":($orden->id<100?"00":($orden->id<1000?"0":""))).$orden->id?></td>
									<td><?=date("Ymd",strtotime($orden->fechaSol))."-".($orden->idSolicitud<10?"000":($orden->idSolicitud<100?"00":($orden->idSolicitud<1000?"0":""))).$orden->idSolicitud?></td>
									<td><?=Oficina::getNombre($orden->asignado_a)?></td>
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
</section>