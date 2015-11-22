<style type="text/css">
    .col-center{
        float: none;
        margin: 0 auto;
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
                            <label>
                                <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>" alt="User Image"/ class="img-responsive table-bordered">
                            </label>
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
    <h1 class="text-center">Informaci√≥n del usuario</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li class=""><i class="fa fa-users"></i> Usuarios</li>
        <li class="active"><i class="fa fa-exclamation"></i> Ver Informaci√≥n</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <?php $this->renderPartial('menu_pc', array('col_size'=>3,'id'=>$model->id)); ?>
        <?php $this->renderPartial('menu_mobil', array('col_size'=>3,'id'=>$model->id)); ?>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6 imagen-perfil">
                            <?php if($model->profile->foto): ?>
                                <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$model->profile->foto?>" alt="User Image"/ class="img-responsive table-bordered">
                            <?php else: ?>
                                <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="User Image"/ class="img-responsive table-bordered">
                            <?php endif ?>
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
                                        <?php $solicitudDeContrasena = RecoveryPassword::model()->find("idUser=".$model->id); ?>
                                        <?php if(isset($solicitudDeContrasena)){ ?>
                                        <?php #Yii::app()->createUrl('restaurar') ?>
                                            <a href="<?=$solicitudDeContrasena->link;?>" class="btn btn-block btn-social btn-default">
                                                <i class="fa fa-unlock-alt"></i> Restaurar Contrase√±a
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    Yii::app()->clientScript->registerScript('accion-privilegio',
    '$(document).ready(function() {
        $(".btn-privilegio").click(function() {
            $("#modal_rechazar").modal("show");
        });
    });',
    CClientScript::POS_END);
?>
<!---->
<div class="modal fade" id="modal_rechazar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?=Yii::app()->createUrl('transferencia/create');?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h3 class="modal-title"><i class="fa fa-exchange"></i> <span class="text-center">Transferir Usuario</span></h3>
                </div>
                <div class="modal-body">
                    <strong>Aviso</strong>
                    <br>
                    La transferencia de usuario consiste en, ... 
                    <br>
                    Una vez realizada la transferencia con Èxito ya no tendr· jerarquÌa con el departamento actual.
                    <br>
                    <input name="Transferencia[depto1]" value="<?=$model->profile->idDepartamento?>" type="hidden">
                    <input name="Transferencia[idUser]" value="<?=$_GET['id']?>" type="hidden">
                    <label>Departamento a transferir</label>
                    <?php $modell = Departamento::model()->findAll(); $list = CHtml::listData($modell, 'id', 'nombre_departamento'); ?>
                    <?php echo CHtml::dropDownList('Transferencia[depto2]', 0, $list, array('options'=>array($profile->idDepartamento=>array('selected'=>true)),'empty' => 'Seleccione una OpciÛn','class'=>'form-control')); ?>
                </div>
                <div class="modal-footer clearfix">
                    <div class="pull-right">
                        <button class="btn btn-block btn-success btn-sm" type="success">Transferir</button>
                    </div>
                    <div class="pull-left">
                        <button class="btn btn-block btn-danger btn-sm" type="button" data-dismiss="modal" >Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>