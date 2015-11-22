<div class="col-md-6">
	<section class="invoice">
		<!-- title row -->
		<div class="row">
			<div class="col-xs-12">
				<h2 class="page-header text-center">
					<i class="ion ion-clipboard pull-left"></i> Ayudanos a mejorar
				</h2>
			</div><!-- /.col -->
		</div>
		<!-- info row -->
		<div class="row invoice-info">
			<div class="col-sm-12 invoice-col">
				<b>Mensaje del porqué se debe hacer la evaluación del servicio</b>
				<br>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.<br>Ut enim laborum <a class="open-modal" href="#">Conocer más</a>
			</div><!-- /.col -->
		</div><!-- /.row -->
		<hr>
		<div class="row no-print">
			<div class="col-xs-12 text-center">
				<button class="btn btn-block bg-navy pull-right"><i class="fa fa-check-circle"></i> Evaluar el servicio que he recibido</button>
				<!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
				<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
			</div>
		</div>
	</section><!-- /.content -->
</div>
<div class="col-md-6">
	<div class="box box-default">
		<div class="box-header with-border">
			<i class="fa fa-exclamation-circle"></i>
			<h3 class="box-title">Avisos</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="box-body">
			<div class="alert bg-blue alert-dismissable">
				<h4><i class="fa fa-bullhorn"></i> Jefe del Centro de computo</h4>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="alert alert-success alert-dismissable">
				<h4><i class="fa fa-bullhorn"></i> Jefe de Oficina, Reyes, Pastor, Duch, Jaime</h4>
				mantenimiento de la fecha, tal, a la fecha tal, etc.etc.etc.
			</div>
			<div class="alert alert-danger alert-dismissable">
				<h4><i class="fa fa-bullhorn"></i> Alert!</h4>
				Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
			</div>
		</div>
	</div>
</div>
<?php
	Yii::app()->clientScript->registerScript(
		'script-politicas-calidad',
		'$(document).ready(function() {
			$(".open-modal").click(function(e) {
				$("#example-modal").modal("show");
			});
		});',
		CClientScript::POS_END
	);
?>
<div class="modal fade" id="example-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-navy">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
				<h3 class="modal-title"><i class="fa fa-cogs"></i> Normas del Departamento de Calidad</h3>
			</div>
			<div class="modal-body bg-gray">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
			<div class="modal-footer clearfix bg-navy"></div>
		</div>
	</div>
</div>