<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>
        <?php echo $form->textFieldRow($model,'id',array('class'=>'form-control')); ?>
        <?php echo $form->textFieldRow($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
        <?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
        <?php #echo $form->textFieldRow($model,'activkey',array('size'=>60,'maxlength'=>128)); ?>
        <?php #echo $form->textFieldRow($model,'create_at'); ?>
        <?php #echo $form->textFieldRow($model,'lastvisit_at'); ?>
        <?php echo $form->dropDownListRow($model,'superuser',$model->itemAlias('AdminStatus'), array('prompt'=>'','class'=>'form-control')); ?>
        <?php echo $form->dropDownListRow($model,'status',$model->itemAlias('UserStatus'), array('prompt'=>'','class'=>'form-control')); ?>
<br>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'primary',
            'buttonType'=>'submit',
            'label'=>UserModule::t('Buscar'),
        )); ?>
<?php $this->endWidget(); ?>