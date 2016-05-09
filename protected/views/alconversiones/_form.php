<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alconversiones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'um1'); ?>
		<?php echo $form->textField($model,'um1',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um2'); ?>
		<?php echo $form->textField($model,'um2',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerador'); ?>
		<?php echo $form->textField($model,'numerador'); ?>
		<?php echo $form->error($model,'numerador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'denominador'); ?>
		<?php echo $form->textField($model,'denominador'); ?>
		<?php echo $form->error($model,'denominador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->