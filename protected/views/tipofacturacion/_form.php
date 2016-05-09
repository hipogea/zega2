<?php
/* @var $this TipofacturacionController */
/* @var $model Tipofacturacion */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipofacturacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codtipofac'); ?>
		<?php echo $form->textField($model,'codtipofac',array('disabled'=>($model->isNewRecord)?'':'disabled','size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codtipofac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipofacturacion'); ?>
		<?php echo $form->textField($model,'tipofacturacion',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'tipofacturacion'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>