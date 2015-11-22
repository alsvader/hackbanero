<?php $datos = User::model()->findByPk(Yii::app()->user->id); ?>
<form method="post" action="<?=Yii::app()->createUrl('/user/admin/create');?>">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="Profile_nombres">
					Nombres <span class="required">*</span>
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
		<?php if(!isset($model->password)){ ?>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label required" for="User_password">
						Contraseña <span class="required">*</span>
					</label>
					<input size="60" maxlength="128" class="form-control" name="User[password]" id="User_password" type="password">
				</div>
			</div>
		<?php } ?>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="form-group">
				<label class="control-label required" for="Profile_privilegio">
					Cargo <span class="required">*</span>
				</label>
				<select class="form-control" name="Profile[privilegio]" id="Profile_privilegio">
					<?php /*if(($datos->profile->id_privilegio=="Jefe de departamento")||($datos->profile->id_privilegio=="Secretario de departamento")): ?>
						<?php if($datos->profile->depto->nombre_departamento=="Centro de Cómputo"){ */?>
							<option value="2" <?=(($profile->id_privilegio=="Jefe de departamento")&&(isset($profile)))?"selected":""?> >Jefe de departamento</option>
							<option value="3" <?=(($profile->id_privilegio=="Secretario de departamento")&&(isset($profile)))?"selected":""?> >Secretario de departamento</option>
							<option value="4" <?=(($profile->id_privilegio=="Personal de departamento")&&(isset($profile)))?"selected":""?> >Personal de departamento</option>
							<option value="5" <?=(($profile->id_privilegio=="Jefe de oficina")&&(isset($profile)))?"selected":""?> >Jefe de oficina</option>
						<?php /*}else{ ?>
							<option value="Secretario de departamento" <?=(($profile->id_privilegio=="Secretario de departamento")&&(isset($profile)))?"selected":""?> >Secretario de departamento</option>
							<option value="Personal de departamento" <?=(($profile->id_privilegio=="Personal de departamento")&&(isset($profile)))?"selected":""?> >Personal de departamento</option>
							<option value="Jefe de oficina" <?=(($profile->id_privilegio=="Jefe de oficina")&&(isset($profile)))?"selected":""?> >Jefe de oficina</option>
						<?php } ?>
					<?php else: ?>
						<?php if($datos->profile->id_privilegio=="Jefe de oficina"){ ?>
							<option value="Personal de departamento" <?=(($profile->id_privilegio=="Personal de departamento")&&(isset($profile)))?"selected":""?> >Personal de departamento</option>
						<?php } ?>
					<?php endif */?>
				</select>
			</div>
		</div>
			<div class="col-md-4 col-sm-12 col-xs-12" style="display:block;">
				<div class="form-group">
					<label class="control-label required" for="Profile_id_departamento">
						Departamento <span class="required">*</span>
					</label>
					<?php
						#$list=array();
						if(($datos->profile->id_privilegio==1)){
							$modell = Departamento::model()->findAll();
							$list = CHtml::listData($modell, 'id', 'nombre_departamento');
							echo CHtml::dropDownList('Profile[id_departamento]', 0, $list, array('options'=>array($profile->id_departamento=>array('selected'=>true)),'empty' => 'Seleccione una Opción','class'=>'form-control'));
						}else{
							$modell = Departamento::model()->findByPk($datos->profile->id_departamento);
					?>
							<input class="form-control" type="hidden" value="<?=$datos->profile->id_departamento?>" name="Profile[id_departamento]">
							<div disabled class="form-control"><?=$datos->profile->depto->nombre_departamento?></div>
					<?php 
						}
					?>
				</div>
			</div>
		<div class="col-md-4 col-sm-12 col-xs-12 oficinas-comboBox" style="display:block;">
			<div class="form-group">
				<label class="control-label required" for="Profile_id_sub">
					Oficina <span class="required">*</span>
				</label>
				<?php
					if(($datos->profile->id_privilegio==1)){
						$modell = SubDepartamento::model()->findAll();
					}else{
						$modell = SubDepartamento::model()->findAll("id_departamento=".$datos->profile->id_departamento);/*." AND id=2"); //$datos->profile->id_sub*/
					}
					$list = CHtml::listData($modell, 'id', 'nombre');
					echo CHtml::dropDownList('Profile[id_sub]', 0,  $list, array('empty' => 'Seleccione una Opción','class'=>'form-control','options'=>array($profile->id_sub=>array('selected'=>true))));
				?>
			</div>
		</div>
		<!--<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="form-group">
				<label class="control-label required" for="User_superuser">
					Admin <span class="required">*</span>
				</label>
		-->
				<input type="hidden" class="form-control" name="User[superuser]" id="User_superuser" value="<?=$model->superuser?>">
		<!--			<option value="0" selected="selected">No</option>
					<option value="1">Si</option>
				</select>
			</div>
		</div>-->
		<!--<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="form-group">
				<label class="control-label required" for="User_status">
					Estado <span class="required">*</span>
				</label>
		-->
				<input type="hidden" class="form-control" name="User[status]" id="User_status" value="1">
		<!--			<option value="0">Desactivado</option>
					<option value="1" selected="selected">Activado</option>
					<option value="-1">Bloqueado</option>
				</select>
			</div>
		</div>
		-->
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="form-group">
				<button class="btn btn-block bg-purple" type="submit">Guardar</button>
			</div>
		</div>
	</div>
</form>
<?php
	Yii::app()->clientScript->registerScript('formulario_segun_privilegio', '
		$( document ).ready(function(){
			$("#Profile_id_departamento").on("change",function(){
				var valor = $(this).val();
				setTimeout("boxLoadingEncender()",0);
				$.getJSON("'.Yii::app()->baseUrl.'/subdepto/dameOficinas/id/"+valor, function(data){
					$("#Profile_id_sub").empty();
					$("#Profile_id_sub").append("<option value=0 selected>Elija una oficina</option>");
					for(var i = 0; i < data.length; i++) {
						$("#Profile_id_sub").append("<option value="+data[i].nombre+">"+
							data[i].nombre
							+"</option>");
					}
				});
				setTimeout("boxLoadingApagar()",800);
			});
			$("#Profile_privilegio").on("change",function(){
				var valor = $(this).val();
				if(valor=="Personal de departamento"){
					$(".oficinas-comboBox").show();
				}
				if(valor=="Jefe de oficina"){
					$(".oficinas-comboBox").show();
				}
				if(valor=="Jefe de departamento"){
					$(".oficinas-comboBox").hide();
				}
				if(valor=="Secretario de departamento"){
					$(".oficinas-comboBox").hide();
				}
				/*setTimeout("boxLoadingEncender()",0);
				$.getJSON("'.Yii::app()->baseUrl.'/subdepto/dameOficinas/id/"+valor, function(data){
					$("#Profile_id_sub").empty();
					for(var i = 0; i < data.length; i++) {
						$("#Profile_id_sub").append("<option value="+data[i].nombre+">"+
							data[i].nombre
							+"</option>");
					}
				});
				setTimeout("boxLoadingApagar()",2800);*/
			});
		});
		function boxLoadingApagar(){
			$("#loading").hide();
		}
		function boxLoadingEncender(){
			$("#loading").show();
		}
	', CClientScript::POS_END);
?>