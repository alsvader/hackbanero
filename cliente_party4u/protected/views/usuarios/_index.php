<div class="md-list md-whiteframe-z1 bg-white m-b">
	<?php foreach($usuarios as $usuario): ?>
		<a href="<?=Yii::app()->createUrl('usuarios/view',array('id'=>$usuario['id']));?>">
		    <div class="md-list-item">
		      <div class="md-list-item-left">
		        <img src="<?=Yii::app()->baseUrl.'/images/a'.$usuario['id'].'.jpg'?>" class="w-full circle">
		      </div>
		      <div class="md-list-item-content">
		        <h3 class="text-md"><?=$usuario['username'];?></h3>
		        <small class="font-thin"><?=$usuario['nombres']." ".$usuario['paterno']." ".$usuario['materno'];?></small>
		      </div>
		    </div>
		</a>
	<?php endforeach ?>
</div>