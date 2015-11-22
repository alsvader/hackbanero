<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Sistema</b> GAR</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Para acceder al sistema escriba sus datos</p>
        <?php $form=$this->beginWidget('ext.bootstrap.widgets.TbActiveForm', array('type'=>'horizontal',)); ?>
            <?php echo $form->errorSummary($model); ?>
            <div class="form-group has-feedback">
                <?php echo $form->textField($model,'username',array('class'=>'form-control','placehover'=>'Nombre de Usuario'));?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo $form->passwordField($model,'password', array('class'=>'form-control','placehover'=>'Contraseña'));?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?php echo $form->checkBox($model,'rememberMe', array('class'=>'form-control')); ?> Recordarme
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <?php 
                        $this->widget('bootstrap.widgets.TbButton',array(
                            'label'=>UserModule::t("Entrar"),
                            'buttonType'=>'submit',
                            'type'=>'primary',
                            'htmlOptions'=>array('class'=>'btn btn-primary btn-block btn-flat'),
                        ));
                    ?>
                </div>
            </div>
        <?php $this->endWidget(); ?>
        <hr>
        <a href="<?=Yii::app()->createUrl('/user/recovery')?>">He olvidado mi contraseña</a>
    </div>
</div>