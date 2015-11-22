<table class="table table-bordered">
	<tbody>
		<tr>
			<th style="width: 10px">Folio</th>
			<th>Solicitante</th>
			<th>Área</th>
			<th class="text-center">Fecha</th>
			<th class="text-center">Hora</th>
			<th style="width:10px;"></th>
		</tr>
		<?php foreach($solicitudes as $solicitud): ?>
			<tr>
				<td><?=date("Ymd",strtotime($solicitud['fecha_elaboracion'])).($solicitud['id']<10?"00":($solicitud['id']<100?"0":($solicitud['id']<1000?"":""))).$solicitud['id']?></td>
				<td><?=$solicitud['solicitante']['nombres']?></td>
				<td><?="Sistemas y Computación"?></td>
				<td class="text-center"><?=date('Y-m-d')?></td>
				<td class="text-center"><?=date('h:i');?></td>
				<td>
					<a href="<?=Yii::app()->createUrl('solicitudes/view',array('id'=>$solicitud['id']));?>" class="btn btn-default hidden-sm hidden-xs"><i class="fa fa-file-text-o"></i> ABRIR</a>
					<a href="<?=Yii::app()->createUrl('solicitudes/view',array('id'=>$solicitud['id']));?>" class="btn btn-default hidden-xl hidden-lg hidden-md"><i class="fa fa-file-text-o"></i></a>
					<!--<div class="btn-group">
						<button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="fa fa-ellipsis-v"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu z-shadow-1" role="menu">
							<li><a href="#">VER</a></li>
							<li class="divider"></li>
							<li><a href="#">EDITAR</a></li>
							<li class="divider"></li>
							<li><a href="#">ELIMINAR</a></li>
						</ul>
					</div>-->
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>