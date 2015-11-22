<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row row-centered">
				<div class="col-sm-8 col-centered">
					<div class="card" ng-controller="MDInputCtrl" >
					  <div class="card-heading">
					    <h2>Basic Usage</h2>
					  </div>
					  <div class="card-body">
					  	<?php echo $this->renderPartial('_form', array()); ?>
					    <div class="row row-centered">
							<div class="col-md-6">
								<button class="btn btn-primary btn-md btn-add-user"><i class="fa fa-user-plus"></i> Agregar Usuario</button>
							</div>
							<div class="col-md-6">
								<button class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
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
	$("body").on("click",".btn-add-user", function(){
		$.ajax({
			url: "http://'.$this->url_server.'/hackbanero/server_party4u/user/admin/create.html",
			type: "post",
			dataType: "jsonp",
			data: $("#form-user").serialize(),
			success: function(data){
				if(data.result.correct==true){
					console.log("se guardo");
					window.location.href = "http://'.$this->url_server.'/hackbanero/cliente_party4u/usuarios/index.html";
				}else{
					//console.log("NO SAVE");
					window.location.href = "http://'.$this->url_server.'/hackbanero/cliente_party4u/usuarios/index.html";
				}
			}
		});
	});
	',CCLientScript::POS_END);
?>