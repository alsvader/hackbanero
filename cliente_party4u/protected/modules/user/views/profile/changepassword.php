<style type="text/css">
    .col-center{
        float: none;
        margin: 0 auto;
    }
</style>
<?php $modell=User::model()->findByPk(Yii::app()->user->id); ?>
<section class="content-header">
    <h1 class="text-center">
        Información del Usuario
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
                            <?php if(isset($modell->profile->foto)): ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/'.$modell->profile->foto?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php else: ?>
                                <center>
                                    <img src="<?=Yii::app()->baseUrl.'/images/perfiles/no_disponible.jpg'?>" alt="User Image"/ class="img-responsive">
                                </center>
                            <?php endif ?>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered no-padding">
                                <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array(
                                    'type'=>'horizontal',
                                    'id'=>'changepassword-form',
                                    'enableAjaxValidation'=>true,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                    ),
                                )); ?>
                                <tr>
                                    <td>
                                        <?php echo $form->errorSummary($model); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'oldPassword',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'password',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'verifyPassword',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <?php $this->widget('bootstrap.widgets.TbButton',array(
                                            'label'=>UserModule::t("Save"),
                                            'buttonType'=>'submit',
                                            'type'=>'primary',
                                        )); ?>
                                    </td>
                                </tr>
                                <?php $this->endWidget(); ?>
                                <tr class="text-center">
                                    <td>
                                        <a href="<?=Yii::app()->createUrl('user/profile/profile');?>" class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-eye"></i> Mi Perfil
                                        </a>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <a href="<?=Yii::app()->createUrl('user/profile/edit');?>" class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-edit"></i> Modificar Datos
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
                    <li><a disabled href="<?=Yii::app()->createUrl('user/profile');?>">Perfil</a></li>
                    <li><a href="<?=Yii::app()->createUrl('user/profile/edit');?>">Editar</a></li>
                    <li class="active"><a href="<?=Yii::app()->createUrl('user/profile/changepassword');?>">Contraseña</a></li>
                    <li class="pull-right hidden-xs"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered no-padding">
                                <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array(
                                    'type'=>'horizontal',
                                    'id'=>'changepassword-form',
                                    'enableAjaxValidation'=>true,
                                    'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                    ),
                                )); ?>
                                <tr>
                                    <td>
                                        <?php echo $form->errorSummary($model); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'oldPassword',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'password',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->passwordFieldRow($model,'verifyPassword',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <?php $this->widget('bootstrap.widgets.TbButton',array(
                                            'label'=>UserModule::t("Cambiar"),
                                            'buttonType'=>'submit',
                                            'type'=>'primary',
                                        )); ?>
                                    </td>
                                </tr>
                                <?php $this->endWidget(); ?>
                            </table>
                        </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_2"></div>
                </div>
            </div>
        </div>
    </div>
</section>