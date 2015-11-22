<section class="content">
	<div class="row row-centered">
		<div class="col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid z-shadow-1" id="box-redactar-solicitud">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-pencil-square-o"></i> <?="REDACTAR SOLICITUD";?>
					</h3>
				</div>
				<div class="box-body">
					<form>
						<textarea class="textarea" placeholder="Recomendaciones: Si se refiere a un equipo de cómputo poner el número de inventario" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					</form>
				</div>
				<div id="data-loading" class="overlay" style="">
                  <i class="fa fa-refresh fa-spin"></i>
                  <!--<i class="fa fa-circle-o-notch fa-spin"></i>-->
                </div>
				<div class="box-footer">
					<button class="btn btn-primary btn-sm btn-next-solicitud">Siguiente</button>
					<a class="btn btn-danger btn-sm btn-bad">Cancelar</a>
				</div>
			</div>
			<div class="box box-solid z-shadow-1" id="box-archivos-solicitud">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-cloud-upload"></i> <?="Subir Archivos";?>
					</h3>
				</div>
				<div class="box-body">
					<h4>Este paso no es obligatorio</h4>
					<p><i>Si no hay archivos para subir, haga click en <u>finalizar</u></i></p>
					<form action="<?=Yii::app()->createUrl('materialExtra/create')?>" class="dropzone" id="my-awesome-dropzone">
						<input type="hidden" value="" name="MaterialExtra" id="MaterialExtra">
					</form>
				</div>
				<div class="box-footer">
					<a class="btn btn-primary btn-sm btn-finish-solicitud">Finalizar</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/assets/css/dropzone/css/dropzone.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets/js/dropzone/dropzone.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScript(
	'script-textarea-wysinc',
	#'$(".textarea").wysihtml5();',
	'$(".textarea").wysihtml5({
		toolbar: {
			"font-styles": true, // Font styling, e.g. h1, h2, etc.
			"emphasis": true, // Italics, bold, etc.
			"lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
			"html": false, // Button which allows you to edit the generated HTML.
			"link": false, // Button to insert a link.
			"image": false, // Button to insert an image.
			"color": true, // Button to change color of font
			"blockquote": true, // Blockquote
			"size": "md" // options are xs, sm, lg
		}
	});',
	CClientScript::POS_END
);
Yii::app()->clientScript->registerScript(
	'script-dropzone',
	'$(document).ready(function() {
		Dropzone.options.myDropzone = {
			maxFilesize: 5,
			init: function() {
				this.on("uploadprogress", function(file, progress) {
					console.log("File progress", progress);
				});
			}
		}
		$("#my-awesome-dropzone").dropzone({
			acceptedFiles: "image/*,.jpeg,.jpg,.png,.gif,.JPEG,.PNG,.GIF,.psd,.pdf,.docx,.ppt,.xlsx",
			dictInvalidFileType: "Error - tipo de archivo erróneo",
		});
	});',
	CClientScript::POS_END
);
?>
<?php
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$("#box-archivos-solicitud").css("display", "none");
	$("#data-loading").hide();
	$("body").on("click",".btn-next-solicitud",function(){
		//$(".textarea").attr("disabled","disabled");
		$("#box-redactar-solicitud").removeClass("box-danger");
		$("#data-loading").delay(150).fadeIn();
		$.ajax({
			url: "http://'.$this->url_server.'/server_gar/solicitud/create.html",
			type: "post",
			dataType: "jsonp",
			data: {Solicitud:{id_departamento:'.$datos->profile->id_departamento.',id_solicitante:'.Yii::app()->user->id.',descripcion:$(".textarea").val()}},
			success: function(data){
				if(data.result.correct){
					$("#data-loading").delay(1600).fadeOut();
					$("#box-redactar-solicitud").delay(2500).slideUp(500);
					$("#box-archivos-solicitud").delay(2650).slideDown(1000);
					$("#MaterialExtra").val(data.data.id);
					console.log("id del solicitud: "+data.data.id);
				}else{
					$("#data-loading").delay(1000).fadeOut();
					window.setTimeout(function(){$("#box-redactar-solicitud").addClass("box-danger");}, 1100);
				}
			}
		});
	});
	$("body").on("click",".btn-finish-solicitud",function(){
		window.location.href = "http://'.$this->url_server.'/cliente_gar/solicitudes/index.html";
	});
	$("body").on("click",".btn-bad",function(){
		window.location.href = "http://'.$this->url_server.'/cliente_gar/solicitudes/index.html";
	});',
	CClientScript::POS_READY
);
?>