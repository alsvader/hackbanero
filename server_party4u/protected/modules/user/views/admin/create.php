<section class="content-header">
	<h1 class="text-center">
		Creación de Usuario
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		<li class=""><i class="fa fa-users"></i> Usuarios</li>
		<li class="active"><i class="fa fa-pencil-square-o"></i> Crear</li>
	</ol>
</section>
<section class="content-header">
	<div class="row">
		<?php $this->renderPartial('menu_pc', array('col_size'=>3,'id'=>$model->id)); ?>
    	<?php #$this->renderPartial('menu_mobil', array('col_size'=>3,'id'=>$model->id)); ?>
		<div class="col-md-8">
			<div class="alert bg-purple alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					<i class="icon fa fa-exclamation"></i> Nota:	
				</h4>
				<h4>
				La creación de un usuario es la primera etapa para la asignación de un usuario a un departamento.
				</h4>
			</div>
		</div>
		<div class="col-md-8">
			<?php echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
		</div>
	</div>
</section>