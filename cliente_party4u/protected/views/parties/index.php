<h1>Fiestas</h1>

<div class="box-body" id="contenido"></div>

<a href="<?php echo Yii::app()->createUrl('parties/create');?>" class="md-btn md-fab md-fab-bottom-right pos-fix teal">
	<i class="mdi-editor-mode-edit i-24"></i>
</a>

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
			if(data.data.fiestas.length > 0){
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