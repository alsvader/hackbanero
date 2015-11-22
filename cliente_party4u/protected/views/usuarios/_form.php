<form id="form-user" method="post" action="#">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="Profile_nombres">
					Nombres <span class="required">*</span>
				</label>
				<input size="60" maxlength="50" class="form-control" name="Profile[nombres]" id="Profile_nombres" type="text" value="">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="Profile_apellido_paterno">
					Apellido Paterno <span class="required">*</span>
				</label>
				<input size="60" maxlength="50" class="form-control" name="Profile[apellido_paterno]" id="Profile_apellido_paterno" type="text" value="">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="Profile_apellido_materno">
					Apellido Materno <span class="required">*</span>
				</label>
				<input size="60" maxlength="50" class="form-control" name="Profile[apellido_materno]" id="Profile_apellido_materno" type="text" value="">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="User_email">
					Correo <span class="required">*</span>
				</label>
				<input size="60" maxlength="128" class="form-control" name="User[email]" id="User_email" type="text" value="">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="control-label required" for="User_username">
					Usuario <span class="required">*</span>
				</label>
				<input maxlength="128" class="form-control" name="User[username]" id="User_username" type="text" value="">
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
				<label class="control-label required" for="Profile_id_privilegio">
					Cargo <span class="required">*</span>
				</label>
				<select class="form-control" name="Profile[id_privilegio]" id="Profile_id_privilegio">
					<option value="2">Jefe de departamento</option>
					<option value="3">Secretario de departamento</option>
					<option value="4">Personal de departamento</option>
					<option value="5">Jefe de oficina</option>
				</select>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12" style="display:block;">
			<div class="form-group">
				<label class="control-label required" for="Profile_id_departamento">
					Departamento <span class="required">*</span>
				</label>
				<input class="form-control" type="text" value="" name="Profile[id_departamento]">
			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12 oficinas-comboBox" style="display:block;">
			<div class="form-group">
				<label class="control-label required" for="Profile_id_sub">
					Oficina <span class="required">*</span>
				</label>
				<input class="form-control" type="text" value="" name="Profile[id_sub]">
			</div>
		</div>
	</div>
</form>