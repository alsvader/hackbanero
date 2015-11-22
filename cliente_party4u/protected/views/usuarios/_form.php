<form id="form-user" method="post" action="#">
	<div class="row">
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input class="md-input" name="Profile[nombres]" required>
				<label>Nombres</label>
			</div>
			<!--<div class="form-group">
				<label class="control-label required" for="Profile_nombres">
					Nombres <span class="required">*</span>
				</label>
				<input size="60" maxlength="50" class="form-control" name="Profile[nombres]" id="Profile_nombres" type="text" value="">
			</div>-->
		</div>
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input class="md-input" name="Profile[apellido_paterno]" required>
				<label>Apellido Paterno</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input class="md-input" name="Profile[apellido_materno]" required>
				<label>Apellido Materno</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input type="email" class="md-input" name="User[email]" required>
				<label>Correo Electrónico</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input type="text" class="md-input" name="User[username]" required>
				<label>Usuario</label>
			</div>
		</div>
		<div class="col-md-4">
			<div class="md-form-group float-label">
				<input type="password" class="md-input" name="User[password]" required>
				<label>Contraseña</label>
			</div>
		</div>
	</div>
</form>