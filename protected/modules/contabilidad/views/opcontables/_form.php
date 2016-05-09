<?php
/* @var $this OpcontablesController */
/* @var $model Opcontables */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opcontables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codop'); ?>
		<?php echo $form->textField($model,'codop',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desop'); ?>
		<?php echo $form->textField($model,'desop',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'desop'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hcodmov'); ?>
		<?php echo $form->textField($model,'hcodmov',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'hcodmov'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->