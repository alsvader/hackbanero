<ul class="list-group md-whiteframe-z0">
	<li class="list-group-item">
		<div class="block font-bold">This is title</div>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit.
	</li>
	<li class="list-group-item active">
		<a href class="block font-bold">Title and link</a>
		<span class="text-muted">Morbi id neque quam</span>
	</li>
	<li class="list-group-item">
		<a href>
		<span class="block font-bold">Title and description link</span>
		Aliquam sollicitudin venenatis ipsum
		</a>
	</li>
	<li class="list-group-item">
		<a href><span class="block font-bold">Ellipsis description</span></a>
		<span class="clear text-ellipsis">Vestibulum ullamcorper sodales nisi nec condimentum Aliquam sollicitudin venenatis ipsum</span>
	</li>
	<li class="list-group-item">
		<a href class="clear text-ellipsis block font-bold">
		<span class="h5">
		Ellipsis title and description, ullamcorper sodales nisi nec condimentum Aliquam sollicitudin venenatis
		</span>
		</a>
		<span class="clear text-ellipsis">Vestibulum ullamcorper sodales nisi nec condimentum Aliquam sollicitudin venenatis ipsum</span>
	</li>
</ul>
<div class="row">
    <div class="col-sm-4">
      <div class="panel panel-card">
        <div class="item">
          <img src="images/c1.jpg" class="w-full r-t" alt="Washed Out">
          <div class="bottom text-white p">
            Title
          </div>
        </div>
        <a md-ink-ripple class="md-btn md-raised md-fab brown m-r md-fab-offset pull-right"><span class="text-white">23</span></a>
        <div class="p">
          <h3>Paracosm</h3>
          <p>
            The titles of Washed Out's breakthrough song and the first single from Paracosm share the
            two most important words in Ernest Greene's musical language: feel it. It's a simple request, as well...
          </p>
        </div>
      </div>
    </div>
<table class="table table-bordered">
	<tbody>
		<tr>
			<th style="width: 10px">ID</th>
			<th>Usuario</th>
			<th>Nombre</th>
			<th class="text-center">Fecha</th>
			<th class="text-center">Hora</th>
			<th style="width:10px;"></th>
		</tr>
		<?php foreach($usuarios as $usuario): ?>
			<tr>
				<td><?=$usuario['id']?></td>
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