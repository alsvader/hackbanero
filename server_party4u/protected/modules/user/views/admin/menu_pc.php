<div class="col-md-<?=$col_size?> hidden-xs hidden-sm">
	<div class="box box-solid">
		<div class="box-header text-center bg-purple">
			<h3 class="box-title">OPCIONES</h3>
		</div>
		<div class="box-body bg-white">
			<?php if($_SERVER["REQUEST_URI"]!=(Yii::app()->createUrl('/user/admin/view',array('id'=>$id)))): ?>
				<a href="<?=Yii::app()->controller->createUrl('create')?>" class="btn btn-lg btn-default btn-block" <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/create'))?"disabled":""?>>
					<i class="fa fa-user-plus" style="font-size:23px;"></i>&nbsp;&nbsp;NUEVO
				</a>
			<?php else: ?>
				<a href="#" class="btn btn-lg btn-default btn-block btn-privilegio">
					<i class="fa fa-exchange"></i> TRANSFERIR
				</a>
				<a href="<?=Yii::app()->createUrl('user/admin/update',array('id'=>$id))?>" class="btn btn-lg btn-default btn-block" <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"disabled":($_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"disabled":"")?>>
					<i class="fa fa-pencil"></i> MODIFICAR
				</a>
			<?php endif ?>
			<a href="<?=Yii::app()->controller->createUrl('/user/admin/personal')?>" class="btn btn-lg btn-default btn-block" <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"disabled":($_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"disabled":"")?>>
				<i class="fa fa-list"></i> PERSONAL
			</a>
		</div>
	</div>
</div>