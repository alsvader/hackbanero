<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row row-centered">
				<div class="col-sm-8 col-centered">
					<div class="" id="contenido"></div>
				</div>
			</div>
			<a href="<?=Yii::app()->createUrl('usuarios/create');?>" class="md-btn md-fab md-fab-bottom-right pos-fix teal"><i class="mdi-social-person-add i-24"></i></a>
		</div>
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$.ajax({
		url: "http://'.$this->url_server.'/hackbanero/server_party4u/user/admin/index.html",
		type: "post",
		dataType: "jsonp",
		data: {user_id:'.Yii::app()->user->id.'},
		success: function(data){
			$("#contenido").empty();
			if(data.data.usuarios!=null){
				$("#content_list").show();
				$.post(
					"http://'.$this->url_server.'/hackbanero/cliente_party4u/usuarios/index.html",
					{data:data.data},
					function(data){
						$("#contenido").html(data);
					}
				);
			}else{
				$("#content_vacio").show();
				$("#content_list").hide();
			}
		}
	});',
	CClientScript::POS_READY
);
?>