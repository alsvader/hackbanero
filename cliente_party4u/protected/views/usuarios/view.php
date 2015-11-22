<div class="box-row">
    <div class="box-cell">
        <div class="box-inner padding">
            <?php $this->renderPartial('_view', array()); ?>
        </div>
	</div>
</div>
<?php
Yii::app()->clientScript->registerScript(
    'scritpt-contenido-table',
    '$.ajax({
        url: "http://'.$this->url_server.'/server_gar/user/admin/view.html",
        type: "post",
        dataType: "jsonp",
        data: {user_id:'.Yii::app()->user->id.',id:'.$id.'},
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