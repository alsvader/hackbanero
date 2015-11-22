<div class="app">  
  <div class="center-block w-xxl w-auto-xs p-v-md">
    <div class="navbar">
      <div class="navbar-brand m-t-lg text-center">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" style="
                width: 24px; height: 24px;">
          <path d="M 50 0 L 100 14 L 92 80 Z" fill="rgba(139, 195, 74, 0.5)"></path>
          <path d="M 92 80 L 50 0 L 50 100 Z" fill="rgba(139, 195, 74, 0.8)"></path>
          <path d="M 8 80 L 50 0 L 50 100 Z" fill="#fff"></path>
          <path d="M 50 0 L 8 80 L 0 14 Z" fill="rgba(255, 255, 255, 0.6)"></path>
        </svg>
        <span class="m-l inline">Materil</span>
      </div>
    </div>
    <div class="p-lg panel md-whiteframe-z1 text-color m">
      <form name="form">
        <div class="md-form-group">
          <input type="text" class="md-input" ng-model="user.name" required>
          <label>Nombre de Usuario</label>
        </div>
        <div class="md-form-group">
          <input type="email" class="md-input" ng-model="user.email" required>
          <label>Correo Electrónico</label>
        </div>
        <div class="md-form-group">
          <input type="password" class="md-input" ng-model="user.password" required>
          <label>Contraseña</label>
        </div>
        <div class="m-b-md">
          <label class="md-check">
            <input type="checkbox" ng-model="agree" required><i class="indigo"></i> Acepto los <a href>Términos y condiciones.</a>
          </label>
        </div>
        <a md-ink-ripple href="<?=Yii::app()->createUrl('user/login');?>" class="md-btn md-raised pink btn-block p-h-md">Registrarme</a>
      </form>
    </div>
    <div class="p-v-lg text-center">
      <div>Ya tengo una cuenta? <br><a href="<?=Yii::app()->createUrl('user/login');?>" class="md-btn">Iniciar</a></div>
    </div>
  </div>
</div>
<?php /*$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>

<?php

$form=$this->beginWidget('UActiveForm', array( //UActiveForm extends TbActiveForm
    'type'=>'horizontal',
    'id'=>'registration-form',
    'enableAjaxValidation'=>true,
    
    'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
    'clientOptions'=>array(
            'validateOnSubmit'=>true,
    ),
    
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

    <fieldset>
        
        <legend><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></legend>
        
        <?php echo $form->errorSummary(array($model, $profile)); ?>
        
        <?php echo $form->textFieldRow($model,'username'); ?>
        <?php echo $form->passwordFieldRow($model,'password'); ?>
        <?php echo $form->passwordFieldRow($model,'verifyPassword'); ?>
        <?php echo $form->textFieldRow($model,'email'); ?>
        <?php 
        
            $profileFields=$profile->getFields();
            if ($profileFields) {
                foreach($profileFields as $field) {
                    
                    if ($widgetEdit = $field->widgetEdit($profile)) {
                        echo '<div class="control-group">';
                        echo $form->labelEx($profile,$field->varname, array('class'=>'control-label'));
                        echo '<div class="controls">';
                        echo $widgetEdit;
                        echo $form->error($profile,$field->varname, array('class'=>'help-inline'));
                        echo '</div></div>';
                        // echo '<div class="control-group"><div class="controls">'.$widgetEdit.'</div></div>';
                    } elseif ($field->range) {
                        echo $form->dropDownListRow($profile,$field->varname,Profile::range($field->range));
                    } elseif ($field->field_type=="TEXT") {
                        echo $form->textAreaRow($profile,$field->varname,array('rows'=>6, 'cols'=>50));
                    } else {
                        echo $form->textFieldRow($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
                    }
                }
            }
        ?>
        <?php if (UserModule::doCaptcha('registration')): ?>
            <?php echo $form->captchaRow($model, 'verifyCode'); ?>
        <?php endif; ?>

    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
            'label'=>UserModule::t("Register"),
            'buttonType'=>'submit',
            'type'=>'warning',
        )); ?>

    </div>

<?php $this->endWidget(); */?>