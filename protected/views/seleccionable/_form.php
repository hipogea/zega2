<?php
/* @var $this SeleccionableController */
/* @var $model Seleccionable */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seleccionable-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codsel'); ?>
		<?php echo $form->textField($model,'codsel',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codsel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desel'); ?>
		<?php echo $form->textField($model,'desel',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'desel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textArea($model,'codigo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->