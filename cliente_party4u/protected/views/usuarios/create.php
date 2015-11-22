<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row row-centered">
				<div class="col-sm-8 col-centered">
					<div class="card" ng-controller="MDInputCtrl" >
					  <div class="card-heading">
					    <h2>Basic Usage</h2>
					  </div>
					  <div class="card-body bg-dark">
					    <div class="row row-sm">
					      <div class="col-sm-6">
					        <div class="md-form-group">
					          <input class="md-input md-input-white" ng-model="user.title">
					          <label>Title</label>
					        </div>
					      </div>
					      <div class="col-sm-6">
					        <div class="md-form-group">
					          <input class="md-input md-input-white" ng-model="user.email">
					          <label>Email</label>
					        </div>
					      </div>
					    </div>
					  </div>
					  <div class="card-body">
					    <div class="row row-sm">
					      <div class="col-sm-12">
					        <div class="md-form-group">
					          <input class="md-input" disabled ng-model="user.company">
					          <label>Company(disabled)</label>
					        </div>
					      </div>
					      <div class="col-sm-6">
					        <div class="md-form-group float-label">
					          <input class="md-input" ng-model="user.firstName" required>
					          <label>First Name</label>
					        </div>
					      </div>
					      <div class="col-sm-6">
					        <div class="md-form-group float-label">
					          <input class="md-input" ng-model="user.lastName" required>
					          <label>Last Name</label>
					        </div>
					      </div>
					      <div class="col-sm-12">
					        <div class="md-form-group">
					          <input class="md-input" ng-model="user.address">
					          <label>Address</label>
					        </div>
					      </div>
					      <div class="col-sm-4">
					        <div class="md-form-group">
					          <input class="md-input" ng-model="user.city">
					          <label>City</label>
					          <span class="md-input-msg right">30/30</span>
					        </div>
					      </div>
					      <div class="col-sm-4">
					        <div class="md-form-group">
					          <input class="md-input" ng-model="user.state">
					          <label>State</label>
					        </div>
					      </div>

					      <div class="col-sm-4">
					        <div class="md-form-group">
					          <input class="md-input" ng-model="user.postalCode">
					          <label>Postal Code</label>
					        </div>
					      </div>

					      <div class="col-sm-12">
					        <div class="md-form-group">
					          <textarea class="md-input" ng-model="user.biography" rows="4"></textarea>
					          <label>Biography</label>
					        </div>
					      </div>
					    </div>
					    <div class="row">
					      <div class="col-sm-4">
					        <p>
					          <label class="md-check">
					            <input type="checkbox">
					            <i class="indigo"></i>
					            Checkbox
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox" checked>
					            <i class="blue"></i>
					            Checkbox: checked
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox" disabled>
					            <i class="indigo"></i>
					            Checkbox: disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox" checked disabled>
					            <i class="indigo"></i>
					            Checkbox: checked and disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox">
					            <i class="pink"></i>
					            Checkbox: pink
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox" checked>
					            <i class="green"></i>
					            Checkbox: green
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="checkbox" checked>
					            <i class="teal no-icon"></i>
					            Checkbox: no icon
					          </label>
					        </p>
					      </div>
					      <div class="col-sm-4">
					        <p>
					          <label class="md-check">
					            <input type="radio" name="radio">
					            <i class="indigo"></i>
					            Checkbox
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" name="radio" checked>
					            <i class="blue"></i>
					            Checkbox: checked
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" name="a" disabled>
					            <i class="indigo"></i>
					            Checkbox: disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" name="a" checked disabled>
					            <i class="indigo"></i>
					            Checkbox: checked and disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" name="radio">
					            <i class="pink"></i>
					            Checkbox: pink
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" checked name="b">
					            <i class="green"></i>
					            Checkbox: green
					          </label>
					        </p>
					        <p>
					          <label class="md-check">
					            <input type="radio" name="b">
					            <i class="teal no-icon"></i>
					            Checkbox: no icon
					          </label>
					        </p>
					      </div>
					      <div class="col-sm-4">
					        <p>
					          <label class="md-switch">
					            <input type="checkbox">
					            <i class="indigo"></i>
					            Switch
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="checkbox" checked>
					            <i class="blue"></i>
					            Switch: checked
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="checkbox" disabled>
					            <i class="blue"></i>
					            Switch: disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="checkbox" checked disabled>
					            <i class="blue"></i>
					            Switch: checked and disabled
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="checkbox">
					            <i class="pink"></i>
					            Switch: pink
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="radio" name='switch' checked>
					            <i class="green"></i>
					            Switch: radio 1
					          </label>
					        </p>
					        <p>
					          <label class="md-switch">
					            <input type="radio" name='switch'>
					            <i class="orange"></i>
					            Switch: radio 2
					          </label>
					        <p>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="row row-centered">
		<div class="col-xl-9 col-lg-9 col-md-11 col-sm-11 col-xs-12 col-centered">
			<div class="box box-solid z-shadow-1" id="box-redactar-solicitud">
				<div class="box-header with-border">
					<h3 class="modal-title">
						<i class="fa fa-user-plus"></i> <?="AGREGAR USUARIO";?>
					</h3>
				</div>
				<div class="box-body">
					<?php echo $this->renderPartial('_form', array()); ?>
				</div>
				<div id="data-loading" class="overlay" style="">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
				<div class="box-footer">
					<button class="btn btn-primary btn-sm btn-add-user">Agregar</button>
					<a class="btn btn-danger btn-sm btn-bad">Cancelar</a>
				</div>
			</div>
			<div class="box box-solid box-success z-shadow-1 no-padding" id="box-archivos-solicitud">
				<div class="box-body no-padding">
					<div class="error-page">
						<h2 class="headline text-green"> <i class="fa fa-check"></i></h2>
						<div class="error-content">
							<h3 class="text-green">
								<b>USUARIO AGREGADO EXITOSAMENTE</b>
							</h3>
							<p style="font-size:18px;">
								El usuario se ha agregado con éxito, si quiere seguir agregando usuarios de clic en <u>Agregar Usuario</u>.
								<br>
								Espere <span id="value" data-link="0">10</span> segundos mientras lo dirigimos al perfil del usuario.
							</p>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="row row-centered">
						<div class="col-md-6">
							<button class="btn btn-primary btn-md"><i class="fa fa-user-plus"></i> Agregar Usuario</button>
						</div>
						<div class="col-md-6">
							<button class="btn btn-default btn-md"><i class="fa fa-arrow-circle-left"></i> Regresar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
Yii::app()->clientScript->registerScript('crear_usuario','
	var cont;
	function StartContador(){
		cont = $("#value").html();
		setInterval("contador()",1000);
	}
	function contador(){
		cont=cont-1;
		if(cont<=4){
			$("#value").addClass("text-red");
			if(cont<=0){
				window.location.href = "http://'.$this->url_server.'/cliente_gar/usuarios/view/id/"+$("#value").attr("data-link")+".html";
			}
		}
		console.log(cont);
		$("#value").html(cont);
	}
	$("#data-loading").hide();
	$("#box-archivos-solicitud").css("display", "none");
	$("body").on("click",".btn-add-user", function(){
		$("#box-redactar-solicitud").removeClass("box-danger");
		$("#data-loading").delay(150).fadeIn();
		$.ajax({
			url: "http://'.$this->url_server.'/server_gar/user/admin/create.html",
			type: "post",
			dataType: "jsonp",
			data: $("#form-user").serialize(),
			success: function(data){
				if(data.result.correct){
					$("#data-loading").delay(1600).fadeOut();
					$("#box-redactar-solicitud").delay(2500).slideUp(500);
					$("#box-archivos-solicitud").delay(2650).slideDown(1000);
					$("#value").attr("data-link",data.data.user.id);
					//StartContador(data.data.user.id);
					StartContador();
				}else{
					$("#data-loading").delay(1000).fadeOut();
					window.setTimeout(function(){$("#box-redactar-solicitud").addClass("box-danger");}, 1100);
				}
			}
		});
	});
	',CCLientScript::POS_END);
?>