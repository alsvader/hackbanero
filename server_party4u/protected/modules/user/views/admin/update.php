<style type="text/css">
	.box{
		border-top-color:#605ca8;
	}
</style>
<section class="content-header">
	<h1 class="text-center">Modificar información</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		<li class=""><i class="fa fa-users"></i> Usuarios</li>
		<li class="active"><i class="fa fa-exclamation"></i> Modificar Información</li>
	</ol>
</section>
<section class="content-header">
	<div class="row">
		<?php $this->renderPartial('menu_pc', array('col_size'=>3,'id'=>$model->id)); ?>
    	<?php $this->renderPartial('menu_mobil', array('col_size'=>3,'id'=>$model->id)); ?>
		<div class="col-md-9">
			<?php
				echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
			?>
		</div>
	</div>
</section>