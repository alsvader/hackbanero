<ul class="list-group md-whiteframe-z0">
	<?php foreach($usuarios as $usuario): ?>
		<li class="list-group-item">
			<a href="<?=Yii::app()->createUrl('usuarios/view',array('id'=>$usuario['id']));?>">
			<span class="block font-bold"><?=$usuario['username'];?></span>
			<?=$usuario['nombres']." ".$usuario['paterno']." ".$usuario['materno'];?>
			</a>
		</li>
	<?php endforeach ?>
</ul>