<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Sistema</b> GAR</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
    	<p class="login-box-msg">
        	Escriba la nueva contraseña para el usuario con correo <?=$_GET['email']?>
        </p>
		<?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array(
		    'type'=>'horizontal',
		)); ?>
		<?php echo $form->errorSummary($model); ?>
		<div class="form-group has-feedback">
        	<?php echo $form->passwordFieldRow($model,'password',array('class'=>'form-control')); ?>
		</div>
		<div class="form-group has-feedback">
        	<?php echo $form->passwordFieldRow($model,'verifyPassword',array('class'=>'form-control')); ?>
		</div>
		<!hr>
		<div class="row">
			<div class="col-md-12">
		        <?php $this->widget('bootstrap.widgets.TbButton',array(
		            'label'=>UserModule::t("Guardar"),
		            'buttonType'=>'submit',
		            'type'=>'primary',
		        )); ?>
			</div>
		</div>
		<?php $this->endWidget(); ?>
        <!hr>
    </div>
</div>
<?php /*
<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo CHtml::errorSummary($form); ?>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
	<?php echo CHtml::activePasswordField($form,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 8 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
	</div>
	
	
	<div class="row submit">
	<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form --> */ ?>