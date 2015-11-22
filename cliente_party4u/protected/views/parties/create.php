<h1>Crear</h1>

<form id = "form-party" action = "#" method = "post">
	<label for = "Fiesta[nombre_fiesta]">Nombre de la fiesta</label>
	<input type = "text" name = "Fiesta[nombre_fiesta]" />
	<label for = "Fiesta[nombre_fiesta]">Máximo participantes</label>
	<input type = "text" name = "Fiesta[maximo_participantes]" />
	<label for = "Fiesta[min_cuta]">Mínimo de cuota</label>
	<input type = "text" name = "Fiesta[min_cuta]" />
	<label for = "Fiesta[fecha_ini]">Dia de la fiesta</label>
	<input type = "date" name = "Fiesta[fecha_ini]" />
	<input type="hidden" name = "Fiesta[user_id]" value = "<?php echo Yii::app()->user->id; ?>">
	<button type = "submit" id = "save">Guardar</button>
</form>

<?php
Yii::app()->clientScript->registerScript('crear_usuario','
	$("body").on("click","#save", function(){
		$.ajax({
			url: "http://'.$this->url_server.'/hackbanero/server_party4u/fiesta/create.html",
			type: "post",
			dataType: "jsonp",
			data: $("#form-party").serialize(),
			success: function(data){
				if(data.result.correct){
					alert("se guardo correctamente");
					/*$("#data-loading").delay(1600).fadeOut();
					$("#box-redactar-solicitud").delay(2500).slideUp(500);
					$("#box-archivos-solicitud").delay(2650).slideDown(1000);
					$("#value").attr("data-link",data.data.user.id);
					//StartContador(data.data.user.id);
					StartContador();*/
				}else{
					alert("alert");
					$("#data-loading").delay(1000).fadeOut();
					window.setTimeout(function(){$("#box-redactar-solicitud").addClass("box-danger");}, 1100);
				}
			}
		});
	});
	',CCLientScript::POS_END);
?>