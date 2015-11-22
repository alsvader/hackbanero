<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row row-centered">
				<div class="col-sm-8 col-centered">
					<div class="" id="contenido"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript(
	'scritpt-contenido-table',
	'$.ajax({
		url: "http://'.$this->url_server.'/hackbanero/server_party4u/follower/siguiendo.html",
		type: "post",
		dataType: "jsonp",
		data: {user_id:'.Yii::app()->user->id.'},
		success: function(data){
			$("#contenido").empty();
			if(data.data.siguiendo!=null){
				//alert(data.data.siguiendo);
				console.log(data.data.siguiendo);
				$("#content_list").show();
				$.post(
					"http://'.$this->url_server.'/hackbanero/cliente_party4u/siguiendo/index.html",
					{data:data.data},
					function(data){
						$("#contenido").html(data);
					}
				);
			}else{
				//console.log("es nulo");
				$("#content_vacio").show();
				$("#content_list").hide();
			}
		}
	});',
	CClientScript::POS_READY
);
?>