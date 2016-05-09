<?php
/* @var $this CrugeGruposMailController */
/* @var $model CrugeGruposMail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cruge-grupos-mail-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'desgrupo'); ?>
		<?php echo $form->textField($model,'desgrupo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'desgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deslarga'); ?>
		<?php echo $form->textArea($model,'deslarga',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'deslarga'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->