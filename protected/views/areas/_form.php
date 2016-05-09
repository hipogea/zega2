<?php
/* @var $this AreasController */
/* @var $model Areas */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'areas-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codarea'); ?>
		<?php echo $form->textField($model,'codarea',array('disabled'=>(!$model->isNewRecord)?'disabled':'','size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codsoc'); ?>
		<?php echo $form->textField($model,'codsoc',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'codsoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'explica'); ?>
		<?php echo $form->textArea($model,'explica',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'explica'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>