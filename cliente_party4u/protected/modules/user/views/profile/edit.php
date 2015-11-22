<style type="text/css">
    .col-center{
        float: none;
        margin: 0 auto;
    }
</style>
<section class="content-header">
    <h1 class="text-center">
        Informaci&oacute;n del Usuario
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
                        </div>
                        <div class="col-md-6">
                            <table class="table table-bordered no-padding">
                                <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array(
                                    'type'=>'horizontal',
                                    'id'=>'profile-form',
                                    'enableAjaxValidation'=>true,
                                    'htmlOptions' => array('enctype'=>'multipart/form-data'),
                                )); ?>
                                <?php echo $form->errorSummary(array($model,$profile)); ?>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($model,'username',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($model,'email',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($profile,'nombres',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($profile,'apellido_paterno',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($profile,'apellido_materno',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <?php /*$profileFields=$profile->getFields();
                                    if ($profileFields) {
                                        foreach($profileFields as $field){ ?>
                                        <tr>
                                            <?php if ($widgetEdit = $field->widgetEdit($profile)) {
                                                    echo '<td>';
                                                    echo $form->labelEx($profile,$field->varname, array('class'=>''));
                                                    echo '<td>';
                                                    echo $widgetEdit;
                                                    echo $form->error($profile,$field->varname, array('class'=>'help-inline'));
                                                    echo '</td></td>';
                                                } elseif ($field->range) {
                                                    echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
                                                } elseif ($field->field_type=="TEXT") {
                                                    echo "<td>".$form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50))."</td>";
                                                }else{
                                                    if($field->varname=='foto' || $field->varname=='privilegio' || $field->varname=='idDepartamento' || $field->varname=='idSub'){
                                                        echo $form->hiddenField($profile,$field->varname,array('class'=>'form-control','size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                                                    }else{
                                                        echo "<td>".$form->textFieldRow($profile,$field->varname,array('class'=>'form-control','size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)))."</td>";
                                                    }
                                                }
                                            } ?>
                                        </tr>
                                    <?php } */
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <?php $this->widget('bootstrap.widgets.TbButton',array(
                                            'label'=>$model->isNewRecord ? UserModule::t('Nuevo') : UserModule::t('Guardar'),
                                            'buttonType'=>'submit',
                                            'type'=>'primary',
                                        )); ?>
                                    </td>
                                </tr>
                                <?php $this->endWidget(); ?>
                                <tr class="text-center btn-modificar-datos">
                                    <td>
                                        <a href="<?=Yii::app()->createUrl('user/profile/profile');?>" class="btn btn-block btn-social btn-default">
                                            <i class="fa fa-eye"></i> Mi Perfil
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
                    <li><a disabled href="<?=Yii::app()->createUrl('user/profile');?>">Perfil</a></li>
                    <li class="active"><a href="<?=Yii::app()->createUrl('user/profile/edit');?>">Editar</a></li>
                    <li><a href="<?=Yii::app()->createUrl('user/profile/changepassword');?>">Contraseña</a></li>
                    <li class="pull-right hidden-xs"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered no-padding">
                                <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array(
                                    'type'=>'horizontal',
                                    'id'=>'profile-form',
                                    'enableAjaxValidation'=>true,
                                    'htmlOptions' => array('enctype'=>'multipart/form-data'),
                                )); ?>
                                <?php echo $form->errorSummary(array($model,$profile)); ?>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($model,'username',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $form->textFieldRow($model,'email',array('class'=>'form-control')); ?>
                                    </td>
                                </tr>
                                <?php $profileFields=$profile->getFields();
                                    if ($profileFields) {
                                        foreach($profileFields as $field){ ?>
                                        <tr>
                                            <?php if ($widgetEdit = $field->widgetEdit($profile)) {
                                                    echo '<td>';
                                                    echo $form->labelEx($profile,$field->varname, array('class'=>''));
                                                    echo '<td>';
                                                    echo $widgetEdit;
                                                    echo $form->error($profile,$field->varname, array('class'=>'help-inline'));
                                                    echo '</td></td>';
                                                } elseif ($field->range) {
                                                    echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
                                                } elseif ($field->field_type=="TEXT") {
                                                    echo "<td>".$form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50))."</td>";
                                                }else{
                                                    if($field->varname=='foto' || $field->varname=='privilegio' || $field->varname=='idDepartamento' || $field->varname=='idSub'){
                                                        echo $form->hiddenField($profile,$field->varname,array('class'=>'form-control','size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                                                    }else{
                                                        echo "<td>".$form->textFieldRow($profile,$field->varname,array('class'=>'form-control','size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)))."</td>";
                                                    }
                                                }
                                            } ?>
                                        </tr>
                                    <?php }
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <?php $this->widget('bootstrap.widgets.TbButton',array(
                                            'label'=>$model->isNewRecord ? UserModule::t('Nuevo') : UserModule::t('Guardar'),
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