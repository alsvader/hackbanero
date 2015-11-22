<style type="text/css">
    .col-center{
        float: none;
        margin: 0 auto;
    }
    .btn-cambiar-img{
        opacity: 0;
        margin-top: -33px;
    }
    .imagen-perfil:hover .btn-cambiar-img{
        margin-top: -33px;
        opacity: 1;
        -webkit-transition:all .5s;
    }
</style>
<div class="modal fade" id="subir-img" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=Yii::app()->createUrl('user/profile/subirFoto')?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 class="modal-title"><i class="fa fa-cogs"></i></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-center">
                            <?php if(isset($model->profile->foto)): ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php else: ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php endif ?>
                        </div>
                        <div class="col-md-8 col-center">
                            <label>Cargue una imagen</label>
                            <input type="file" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                        <input type="submit" value="guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<section class="content-header">
    <h1 class="text-center">
        CONFIGURACIÓN
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class=""><i class="fa fa-cog"></i> Configuración</li>
        <li class="active"><i class="fa fa-exclamation"></i> Perfil</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8 hidden-xs hidden-sm col-center">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 imagen-perfil">
                            <?php if(isset($model->profile->foto)): ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php else: ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php endif ?>
                            <a class="btn btn-block btn-social btn-default btn-cambiar-img">
                                <i class="fa fa-upload"></i> Cambiar Imagen
                            </a>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <b>Nombre:</b><br>
                                        <p><?=$model->profile->nombres." ".$model->profile->apellido_paterno." ".$model->profile->apellido_materno?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Correo:</b><br>
                                        <p><?=$model->email?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Usuario:</b><br>
                                        <p><?=$model->username?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Cargo:</b><br>
                                        <p><?=$model->profile->privilegio?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Departamento:</b><br>
                                        <p><?=$model->profile->depto->nombre_departamento?></p>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <a href="<?=Yii::app()->createUrl('user/profile/edit');?>" class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-edit"></i> Modificar Datos
                                        </a>
                                    </td>
                                </tr>
                                <tr class="text-center btn-modificar-datos">
                                    <td>
                                        <a href="<?=Yii::app()->createUrl('user/profile/changepassword');?>" class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-unlock-alt"></i> Cambiar Contraseña
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 hidden-lg">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a disabled href="<?=Yii::app()->createUrl('user/profile');?>">Perfil</a></li>
                    <li><a href="<?=Yii::app()->createUrl('user/profile/edit');?>">Editar</a></li>
                    <li><a href="<?=Yii::app()->createUrl('user/profile/changepassword');?>">Contraseña</a></li>
                    <li class="pull-right hidden-xs"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>">
                                <?php if(isset($model->profile->foto)): ?>
                                    <center>
                                        <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>" alt="User Image"/ class="img-responsive">
                                    </center>
                                <?php else: ?>
                                    <center>
                                        <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="User Image"/ class="img-responsive">
                                    </center>
                                <?php endif ?>
                            </a>
                            <div class="clearfix text-right">
                                <a href="<?=Yii::app()->controller->createUrl('index')?>" class="btn btn-default btn-sm <?=$_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('solicitud/index'))?"active ":($_SERVER["REQUEST_URI"]==(Yii::app()->createUrl('solicitud'))?"active ":"")?>"style="margin-top:-53px;">
                                    <i class="fa fa-upload"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Nombre Completo</label>
                            <div class="input-group">
                                <div type="text" class="form-control">
                                    <?=$model->profile->nombres." ".$model->profile->apellido_paterno." ".$model->profile->apellido_materno?>
                                </div>
                                <span class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <label>Correo Electronico</label>
                            <a class="input-group"  href="mailto:<?=$model->email?>">
                                <div type="text" class="form-control">
                                    <?=$model->email?>
                                </div>
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </a>
                            <label>Nombre de Usuario</label>
                            <div class="input-group">
                                <div type="text" class="form-control">
                                    <?=$model->username?>
                                </div>
                                <span class="input-group-addon">
                                    <i class="fa fa-circle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_2"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    Yii::app()->clientScript->registerScript('subir-img',
    '$(document).ready(function(){
        $(".btn-cambiar-img").click(function(){
            $("#subir-img").modal("show");
        });
    });',
    CClientScript::POS_END);
?>