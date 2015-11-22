<section class="content">
	<div class="row row-centered">
		<div class="col-xl-10 col-lg-11 col-md-12 col-sm-12 col-xs-12 col-centered">
			<div class="box box-solid box-default z-shadow-1" id="box-archivos-solicitud">
				<div class="box-body">
					<?php $this->renderPartial('_view', array()); ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
Yii::app()->clientScript->registerScript(
    'scritpt-contenido-table',
    '$.ajax({
        url: "http://'.$this->url_server.'/server_gar/user/admin/view.html",
        type: "post",
        dataType: "jsonp",
        data: {user_id:'.Yii::app()->user->id.',id},
        success: function(data){
            $("#contenido").empty();
            if(data.data.solicitudes!=null){
                $("#content_list").show();
                $.post(
                    "http://'.$this->url_server.'/cliente_gar/solicitudes/index.html",
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