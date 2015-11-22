<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row">
				<div class="col-sm-8">
					<div class="card" ng-controller="MDInputCtrl" >
					  <div class="card-body">
						<form id = "form-party">
							<div class="row">
								<div class="col-md-5">
									<div class="md-form-group">
										<input class="md-input" name="Fiesta[nombre_fiesta]">
										<label>Nombre de la fiesta</label>
									</div>
								</div>
								<div class="col-md-4">
									<div class="md-form-group">
										<input class="md-input" name="Fiesta[maximo_participantes]">
										<label>Día de la fiesta</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="md-form-group">
										<input class="md-input" name="Fiesta[fecha_ini]">
										<label>Máximo participantes</label>
									</div>
								</div>
								<div class="col-md-3">
									<div class="md-form-group">
										<input class="md-input" name="Fiesta[min_cuta]">
										<label>Mínimo de Cuota</label>
									</div>
								</div>
							</div>
							<input type="hidden" name = "Fiesta[user_id]" value = "<?php echo Yii::app()->user->id; ?>">
						</form>
					    <div class="row">
							<div class="col-xs-6">
								<button type="button" id="save" class="btn btn-primary btn-sm">
									<i class="fa fa-plus"></i> Agregar
								</button>
							</div>
							<div class="col-xs-6">
								<button class="btn btn-default btn-sm"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
							</div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript('crear_usuario','
	$("body").on("click","#save", function(){
		//alert("funciona");
		window.location.href="'.Yii::app()->createUrl('parties').'";
		/*$.ajax({
			url: "http://'.$this->url_server.'/hackbanero/server_party4u/fiesta/create.html",
			type: "post",
			dataType: "jsonp",
			data: $("#form-party").serialize(),
			success: function(data){
				if(data.result.correct){
					alert("se guardo correctamente");
					$("#data-loading").delay(1600).fadeOut();
					$("#box-redactar-solicitud").delay(2500).slideUp(500);
					$("#box-archivos-solicitud").delay(2650).slideDown(1000);
					$("#value").attr("data-link",data.data.user.id);
					//StartContador(data.data.user.id);
					StartContador();
				}else{
					alert("alert");
					$("#data-loading").delay(1000).fadeOut();
					window.setTimeout(function(){$("#box-redactar-solicitud").addClass("box-danger");}, 1100);
				}
			}
		});*/
	});
	',CCLientScript::POS_END);
?>