<h1>Fiestas</h1>

<div class="box-body" id="contenido"></div>

<?php
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$.ajax({
		url: "http://'.$this->url_server.'/hackbanero/server_party4u/fiesta/index.html",
		type: "post",
		dataType: "jsonp",
		data: {user_id:'.Yii::app()->user->id.'},
		success: function(data){
			$("#contenido").empty();
			if(data.data.solicitudes!=null){
				$("#content_list").show();
				$.post(
					"http://'.$this->url_server.'/hackbanero/cliente_party4u/parties/index.html",
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