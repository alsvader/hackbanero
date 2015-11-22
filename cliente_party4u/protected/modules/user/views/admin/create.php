<style type="text/css">
	.box.box-solid.box-purple {
		border: 1px solid #4F4C8B;
	}
	.box-header {
		background-color: #4F4C8B;
		color: white;
	}
</style>
<section class="content-header">
	<br class="hidden-xs hidden-sm">
	<div class="row row-centered">
		<div class="col-xl-11 col-lg-11 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid box-purple z-shadow-1">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-plus"></i> Agregar Usuario
					</h3>
				</div>
				<div class="box-body" id="contenido">
					<?php echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile)); ?>
				</div>
			</div>
		</div>
	</div>
</section>