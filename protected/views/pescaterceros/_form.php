<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pescaterceros-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codplanta'); ?>
		<?php echo $form->textField($model,'codplanta',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codplanta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pesca'); ?>
		<?php echo $form->textField($model,'pesca'); ?>
		<?php echo $form->error($model,'pesca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroep'); ?>
		<?php echo $form->textField($model,'numeroep'); ?>
		<?php echo $form->error($model,'numeroep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factor'); ?>
		<?php echo $form->textField($model,'factor'); ?>
		<?php echo $form->error($model,'factor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->