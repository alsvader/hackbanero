<div class="col-md-<?=$col_size?> hidden-md hidden-lg hidden-xl">
	<div class="mailbox-controls with-border text-center">
		<div class="text-center">
			<div class="btn-group">
				<a href="<?=Yii::app()->controller->createUrl('create')?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/create'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Delete">
					<!--<i class="ion ion-person-add"></i>-->
					<i class="fa fa-user-plus"></i>
				</a>
				<a href="<?=$_SERVER["REQUEST_URI"]!=(Yii::app()->createUrl('/user/admin/personal'))?Yii::app()->controller->createUrl('/user/admin/personal'):"#"?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
					<i class="fa fa-list"></i>
				</a>
				<?php if(($_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/view',array('id'=>$id))))||($_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/update',array('id'=>$id))))): ?>
					<a href="<?=Yii::app()->createUrl('user/admin/update',array('id'=>$id))?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/update',array('id'=>$id)))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
						<i class="fa fa-pencil"></i>
					</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>