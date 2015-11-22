<li class="item" style="padding:0px;margin:0px;border-bottom: 1px solid rgba(118, 110, 110, 0.16);">
	<a href="<?=Yii::app()->createUrl('user/admin/view',array('id'=>$data->id))?>">
		<div class="product-img">
			<?php if(isset($data->profile->foto)): ?>
				<img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$data->profile->foto?>" class="img-circle" alt="User Image"/>
			<?php else: ?>
				<img src="<?=Yii::app()->baseUrl.'/images/perfiles/thumbs/no_disponible.jpg'?>" class="img-circle" alt="User Image"/>
			<?php endif ?>
		</div>
		<div class="product-info">
			<div class="product-title">
				<h4  style="color:#605ca8;">
					<?=$data->profile->nombres." ".$data->profile->apellido_paterno." ".$data->profile->apellido_materno?>					
				</h4>
			</div>
			<span class="product-description" style="color:black;">
				<?=(Departamento::Pertenece($data->id)==""?"Sin Asignar":Departamento::Pertenece($data->id));?>
				<span class="label bg-purple pull-right">
					<?=$data->profile->privilegio?>
				</span>
			</span>
		</div>
	</a>
</li>