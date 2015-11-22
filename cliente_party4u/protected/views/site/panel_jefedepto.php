<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="info-box bg-aqua">
						<span class="info-box-icon">
							<i class="fa fa-files-o"></i>
						</span>
						<div class="info-box-content">
							<span class="info-box-text">
								Solicitudes sin autorizar
							</span>
							<span class="info-box-number"><?php $count=count(Solicitud::model()->findAll("estado1 is null AND area=".$datos->profile->idDepartamento));echo $count; ?></span>
							<span class="progress-description">
								<a href="<?=Yii::app()->createUrl('solicitud/index');?>" class="btn btn-xs btn-default">
									VER
								</a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="info-box bg-aqua">
						<span class="info-box-icon">
							<i class="fa fa-files-o"></i>
						</span>
						<div class="info-box-content">
							<span class="info-box-text">
								Órdenes sin confirmar
							</span>
							<span class="info-box-number"><?php $count=count(Orden::model()->findAll("estado1 IS NOT NULL AND estado2 IS NULL"));echo $count; ?></span>
							<span class="progress-description">
								<a href="<?=Yii::app()->createUrl('orden/index');?>" class="btn btn-xs btn-default">
									VER
								</a>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="info-box bg-yellow">
						<span class="info-box-icon">
							<i class="fa fa-key"></i>
						</span>
						<div class="info-box-content">
							<span class="info-box-text">Solicitudes de restauración de contraseña</span>
							<span class="info-box-number"><?php $count=RecoveryPassword::getNum($datos->profile->idDepartamento);echo $count; ?></span>
							<span class="progress-description">
								<a href="<?=Yii::app()->createUrl('recoveryPassword/index');?>" class="btn btn-xs btn-default">
									VER
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
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
	</div>
</section>