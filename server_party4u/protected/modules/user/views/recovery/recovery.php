<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Sistema</b> GAR</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Para reestablecer su contraseña escriba su nombre de usuario o correo electronico</p>
        <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array('type'=>'horizontal',)); ?>
        	<?php echo $form->errorSummary($model); ?>
	        <div class="form-group has-feedback">
        		<?php echo $form->textField($model,'login_or_email',array('class'=>'form-control')); ?>
            </div>
            <div class="row">
            	<div class="col-xs-4">
					<?php $this->widget('bootstrap.widgets.TbButton',array(
						'label'=>UserModule::t("Restablecer"),
						'buttonType'=>'submit',
						'type'=>'primary',
					)); ?>
            	</div>
            </div>
        <?php $this->endWidget(); ?>
        <hr>
        <a href="<?=Yii::app()->createUrl('/user/login')?>">Regresar</a>
    </div>
</div>
<!-- ########################################################################################################## -->
<?php /* if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
		<?php echo CHtml::activeTextField($form,'login_or_email') ?>
		<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>
	</div>
	
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Recover")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; */?>