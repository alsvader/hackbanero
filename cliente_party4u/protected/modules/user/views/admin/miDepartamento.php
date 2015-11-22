<?php $datos = User::model()->findByPk(Yii::app()->user->id); ?>
<style type="text/css">
	.box{
		border-top-color:#605ca8;
	}
</style>
<section class="content-header">
	<h1 class="text-center">
		Mi Departamento
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
		<li class=""><i class="fa fa-users"></i> Usuarios</li>
		<li class="active"><i class="fa fa-list"></i>
			Mi Departamento
		</li>
	</ol>
</section>
<section class="content-header">
	<div class="row">
		<div class="col-md-<?=$col_size?>">
			<div class="mailbox-controls with-border text-center">
				<div class="text-center">
					<div class="btn-group">
						<a href="<?=Yii::app()->controller->createUrl('create')?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/create'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Delete">
							<!--<i class="ion ion-person-add"></i>-->
							<i class="fa fa-user-plus"></i>
						</a>
						<a href="<?=$_SERVER["REQUEST_URI"]!=(Yii::app()->createUrl('/user/admin/personal2'))?Yii::app()->controller->createUrl('/user/admin/personal2'):"#"?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/personal2'))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
							<i class="fa fa-users"></i>
						</a>
						<a href="<?=Yii::app()->createUrl('subdepto/create',array('data'=>2))?>" class="btn btn-default btn-lg <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('/user/admin/update',array('id'=>$id)))?"active ":""?>" data-toggle="tooltip" title="" data-original-title="Reply">
							<i class="fa fa-building-o"></i>
							<style type="text/css">
								.hola{
									position: absolute;
								}
							</style>
							<i class="fa fa-plus-circle" style="font-size:14px;position: absolute;margin-left:-5px;margin-top:-6px;"></i>
						</a>
					</div>
					<div class="btn-group pull-right">
                      <a href="<?=Yii::app()->createUrl('user/admin/personal')?>" class="btn btn-default btn-lg">
                      	<i class="fa fa-list text-red"></i>
                      </a>
                      <button type="button" class="btn btn-default btn-lg active">
                      	<i class="fa fa-list-alt text-green"></i>
                      </button>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php $usuaiosSin = Profile::model()->findAll("idDepartamento=".$datos->profile->idDepartamento." AND (idSub is NULL OR idSub=0)"); ?>
		<?php if(isset($usuaiosSin)&&(count($usuaiosSin)>0)): ?>
			<div class="col-md-10 col-md-offset-1">
				<div class="box box-success">
					<div class="box-header text-center" data-toggle="tooltip" title="" data-original-title="<?php echo 'Departamento: '.$model->nombre; ?>">
						<h3 class="box-title">
							Usuarios sin oficina
						</h3>
					</div>
					<div class="box-body no-padding">
						<ul class="users-list clearfix">
							<?php foreach ($usuaiosSin as $key): ?>
								<li>
									<?php if(isset($key->foto)){ ?>
										<img src="<?=Yii::app()->baseUrl.'/images/perfiles/thumbs/'.$key->foto;?>" alt="User Image"/>
									<?php }else{ ?>
										<img src="<?=Yii::app()->baseUrl.'/images/perfiles/thumbs/no_disponible.jpg';?>" alt="User Image"/>
									<?php } ?>
									<a class="users-list-name" href="#">
										<?=$key->nombres." ".$key->apellido_paterno." ".$key->apellido_materno?>
									</a>
									<span class="users-list-date"><?=$key->privilegio?></span>
									<span class="users-list-date">
										<a class="btn btn-xs btn-primary" href="<?=Yii::app()->createUrl('/user/admin/view',array('id'=>$key->user_id));?>">Perfil</a>
									</span>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif ?>
		<?php $oficinas = Subdepto::model()->findAll("idDepartamento=".$datos->profile->idDepartamento); ?>
		<?php foreach ($oficinas as $key): ?>
			<?php $usuarios=Profile::model()->findAll("idSub=".$key->id); ?>
			<?php if(isset($usuarios)&&(count($usuarios)>0)): ?>
				<div class="col-md-10 col-md-offset-1">
					<div class="box box-primary">
						<div class="box-header text-center" data-toggle="tooltip" title="" data-original-title="<?php echo 'Departamento: '.$model->nombre; ?>">
							<h3 class="box-title">
								<?php echo $key->nombre; ?>
							</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-primary btn-sm btn-editar-oficina" data-id="<?=$key->id;?>" data-nombre="<?=$key->nombre;?>" data-url="<?=Yii::app()->createUrl('subdepto/update',array('id'=>$key->id));?>">
									<i class="fa fa-pencil"></i>
								</button>
								<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<i class="fa fa-user-plus"></i>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li class="btn-agregar-usuario-existente" data-id="<?=$key->id;?>" data-depto="<?=$key->idDepartamento;?>" data-url="<?=Yii::app()->createUrl('subdepto/update',array('id'=>$key->id));?>">
										<a>Existente</a>
									</li>
									<li class="btn-agregar-usuario-nuevo" data-id="<?=$key->id;?>" data-depto="<?=$key->idDepartamento;?>" data-deptoNombre="<?=$key->idDepartamento0->nombre_departamento;?>" data-subDeptoNombre="<?=$key->nombre;?>">
										<a>Nuevo</a>
									</li>
									<!--<li class="divider"></li>
									<li><a href="#">Separated link</a></li>-->
								</ul>
								<?php /* ?>
								<button class="btn btn-primary btn-sm btn-agregar-usuario" data-id="<?=$key->id;?>" data-nombre="<?=$key->nombre;?>" data-url="<?=Yii::app()->createUrl('subdepto/update',array('id'=>$key->id));?>">
									<i class="fa fa-user-plus"></i>
								</button>
								<?php */ ?>
								<!--<i class="fa fa-building"></i>-->
							</div>
						</div>
						<div class="box-body no-padding">
							<ul class="users-list clearfix">
								<?php foreach ($usuarios as $usuario): ?>
									<li>
										<?php if(isset($usuario->foto)){ ?>
											<img src="<?=Yii::app()->baseUrl.'/images/perfiles/thumbs/'.$usuario->foto;?>" alt="User Image"/>
										<?php }else{ ?>
											<img src="<?=Yii::app()->baseUrl.'/images/perfiles/thumbs/no_disponible.jpg';?>" alt="User Image"/>
										<?php } ?>
										<a class="users-list-name" href="#">
											<?=$usuario->nombres." ".$usuario->apellido_paterno." ".$usuario->apellido_materno?>
										</a>
										<span class="users-list-date"><?=$usuario->privilegio?></span>
										<span class="users-list-date">
											<a class="btn btn-xs btn-primary" href="<?=Yii::app()->createUrl('/user/admin/view',array('id'=>$usuario->user_id));?>">Perfil</a>
										</span>
									</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endforeach ?>
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<?php foreach ($oficinas as $key): ?>
					<?php $usuarios=Profile::model()->findAll("idSub=".$key->id); ?>
					<?php if(isset($usuarios)&&(count($usuarios)<=0)): ?>
						<div class="col-md-6">
							<div class="box box-warning">
								<div class="box-header text-center" data-toggle="tooltip" title="" data-original-title="<?php echo 'Departamento: '.$model->nombre; ?>">
									<h3 class="box-title">
										<?php echo $key->nombre; ?>
									</h3>
									<div class="box-tools pull-right">
										<button class="btn btn-warning btn-sm btn-editar-oficina" data-id="<?=$key->id;?>" data-nombre="<?=$key->nombre;?>" data-url="<?=Yii::app()->createUrl('subdepto/update',array('id'=>$key->id));?>">
											<i class="fa fa-pencil"></i>
										</button>
										<button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-user-plus"></i>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li class="btn-agregar-usuario-existente" data-id="<?=$key->id;?>" data-depto="<?=$key->idDepartamento;?>" data-url="<?=Yii::app()->createUrl('subdepto/update',array('id'=>$key->id));?>">
												<a>Existente</a>
											</li>
											<li class="btn-agregar-usuario-nuevo" data-id="<?=$key->id;?>" data-depto="<?=$key->idDepartamento;?>" data-deptoNombre="<?=$key->idDepartamento0->nombre_departamento;?>" data-subDeptoNombre="<?=$key->nombre;?>">
												<a>Nuevo</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<h4>En esta oficina no hay usuarios</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/assets/plugins/datatables/dataTables.bootstrap.css');
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/datatables/jquery.dataTables.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/datatables/dataTables.bootstrap.js', CClientScript::POS_END);
	Yii::app()->clientScript->registerScript('dataTable-example1', 
	'$(document).ready(function(){
		$(".btn-editar-oficina").click(function(e){
			$("#idOficina").empty();
			$("#nombreOficina").empty();
			$("#form-editar-oficina").removeAttr("action");
			
			$("#modal-editar-oficina").modal("show");
			$("#idOficina").val(""+$(this).attr("data-id"));
			$("#nombreOficina").val(""+$(this).attr("data-nombre"));
			$("#form-editar-oficina").attr("action",$(this).attr("data-url"));
		});
		$(".btn-agregar-usuario-nuevo").click(function(e){
			$("#lbl_Profile_idDepartamento").empty();
			$("#lbl_Profile_idSub").empty();

			$("#modal-agregar-usuario-nuevo").modal("show");
			$("#lbl_Profile_idDepartamento").append(""+$(this).attr("data-deptoNombre"));
			$("#lbl_Profile_idSub").append(""+$(this).attr("data-subDeptoNombre"));
			$("#Profile_idDepartamento").val(""+$(this).attr("data-depto"));
			$("#Profile_idSub").val(""+$(this).attr("data-id"));
		});
		$(".btn-agregar-usuario-existente").click(function(e){
			$("#Profile_idDepartamento_cambio").val(""+$(this).attr("data-depto"));
			$("#Profile_idSub_cambio").val(""+$(this).attr("data-id"));
			$("#modal-agregar-usuario-existente").modal("show");
		});
	});', CClientScript::POS_END);
?>
<div class="modal fade" id="modal-agregar-usuario-existente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=Yii::app()->createUrl('user/admin/agregarUsuarioAOficina');?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 class="modal-title">
                    	<i class="fa fa-user-plus"></i>
                    	Seleccionar Usuario
                    </h3>
                </div>
                <div class="modal-body">
                	<div class="row">
                		<div class="col-md-6 col-md-offset-3">
		                	<select class="form-control" name="id" id="dsadas">
		                		<?php $usuaiosSin = Profile::model()->findAll("idDepartamento=".$datos->profile->idDepartamento." AND (idSub is NULL OR idSub = 0)"); ?>
								<?php if(isset($usuaiosSin)&&(count($usuaiosSin)>0)): ?>
									<?php foreach ($usuaiosSin as $key): ?>
										<option value="<?=$key->user_id;?>"><?=$key->user->username;?></option>
									<?php endforeach ?>
								<?php endif; ?>
							</select>
                		</div>
                	</div>
					<input class="form-control" name="idDepartamento" id="Profile_idDepartamento_cambio" type="hidden">
					<input class="form-control" name="idSub" id="Profile_idSub_cambio" type="hidden">
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                        <input type="submit" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-editar-oficina" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<?#=Yii::app()->createUrl('subdepto/update')?>
            <form id="form-editar-oficina" action="xxx" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 class="modal-title">
                    	<i class="fa fa-pencil"></i>
                    	Cambiar nombre de oficina
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 col-center">
                        	<input id="idOficina" name="Subdepto[id]" type="hidden">
                        	<input id="nombreOficina" name="Subdepto[nombre]" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                        <input type="submit" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-agregar-usuario-nuevo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        	<?php $datos = User::model()->findByPk(Yii::app()->user->id); ?>
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			    'id'=>'user-form',
			    'action'=>Yii::app()->createUrl('user/admin/create'),
			    'enableAjaxValidation'=>true,
			    'type'=>'',
			    'htmlOptions' => array('enctype'=>'multipart/form-data','role'=>'form'),
			));
			?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 class="modal-title">
                    	<i class="fa fa-user-plus"></i>
                    	Agregar Usuario
                    </h3>
                </div>
                <div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="Profile_nombres">
									Nombres <span class="span">*</required>
								</label>
								<input size="60" maxlength="50" class="form-control" name="Profile[nombres]" id="Profile_nombres" type="text" value="<?=$profile->nombres?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="Profile_apellido_paterno">
									Apellido Paterno <span class="required">*</span>
								</label>
								<input size="60" maxlength="50" class="form-control" name="Profile[apellido_paterno]" id="Profile_apellido_paterno" type="text" value="<?=$profile->apellido_paterno?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="Profile_apellido_materno">
									Apellido Materno <span class="required">*</span>
								</label>
								<input size="60" maxlength="50" class="form-control" name="Profile[apellido_materno]" id="Profile_apellido_materno" type="text" value="<?=$profile->apellido_materno?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="User_email">
									Correo <span class="required">*</span>
								</label>
								<input size="60" maxlength="128" class="form-control" name="User[email]" id="User_email" type="text" value="<?=$model->email?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="User_username">
									Usuario <span class="required">*</span>
								</label>
								<input maxlength="128" class="form-control" name="User[username]" id="User_username" type="text" value="<?=$model->username?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="User_password">
									Contraseña <span class="required">*</span>
								</label>
								<input size="60" maxlength="128" class="form-control" name="User[password]" id="User_password" type="password">
							</div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label required" for="Profile_privilegio">
									Cargo <span class="required">*</span>
								</label>
								<select class="form-control" name="Profile[privilegio]" id="Profile_privilegio">
									<?php if(($datos->profile->privilegio=="Jefe de departamento")||($datos->profile->privilegio=="Secretario de departamento")): ?>
										<?php /*if($datos->profile->depto->nombre_departamento=="Centro de Cómputo"){ ?>
											<option value="Jefe de departamento" <?=(($profile->privilegio=="Jefe de departamento")&&(isset($profile)))?"selected":""?> >Jefe de departamento</option>
											<option value="Secretario de departamento" <?=(($profile->privilegio=="Secretario de departamento")&&(isset($profile)))?"selected":""?> >Secretario de departamento</option>
											<option value="Personal de departamento" <?=(($profile->privilegio=="Personal de departamento")&&(isset($profile)))?"selected":""?> >Personal de departamento</option>
											<option value="Jefe de oficina" <?=(($profile->privilegio=="Jefe de oficina")&&(isset($profile)))?"selected":""?> >Jefe de oficina</option>
										<?php }else{ */?>
											<option value="Secretario de departamento" <?=(($profile->privilegio=="Secretario de departamento")&&(isset($profile)))?"selected":""?> >Secretario de departamento</option>
											<option value="Personal de departamento" <?=(($profile->privilegio=="Personal de departamento")&&(isset($profile)))?"selected":""?> >Personal de departamento</option>
											<option value="Jefe de oficina" <?=(($profile->privilegio=="Jefe de oficina")&&(isset($profile)))?"selected":""?> >Jefe de oficina</option>
										<?php #} ?>
									<?php endif ?>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="Profile_idDepartamento">
									Departamento <span class="required">*</span>
								</label>
								<div class="form-control" id="lbl_Profile_idDepartamento" disabled style="overflow:hidden;"></div>
								<input class="form-control" name="Profile[idDepartamento]" id="Profile_idDepartamento" type="hidden">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label required" for="Profile_idSub">
									Oficina <span class="required">*</span>
								</label>
								<div class="form-control" id="lbl_Profile_idSub" disabled style="overflow:hidden;"></div>
								<input class="form-control" name="Profile[idSub]" id="Profile_idSub" type="hidden">
							</div>
						</div>
						<input type="hidden" class="form-control" name="User[superuser]" id="User_superuser" value="0">
						<input type="hidden" class="form-control" name="User[status]" id="User_status" value="1">
					</div>
                	<?php /* ?>
                    <div class="row">
                        <div class="col-md-12 col-center">
                        	<input id="idOficina" name="Subdepto[id]" type="hidden">
                        	<input id="nombreOficina" name="Subdepto[nombre]" class="form-control" type="text">
                        </div>
                    </div>
                	<?php */ ?>
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                    	<div class="col-md-4">
	                        <div class="form-group">
								<?php $this->widget('bootstrap.widgets.TbButton', array(
							    	'type'=>'submit',
							    	'buttonType'=>'submit',
							    	'label'=>$model->isNewRecord ? UserModule::t('Crear') : UserModule::t('Guardar'),
							    	'htmlOptions'=>array(
							    		'class'=>'btn btn-block bg-purple',
							    	),
							    	));
							    ?>
							</div>
                    	</div>
                    </div>
                </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>