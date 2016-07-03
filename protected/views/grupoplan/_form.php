<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupoplan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php echo $form->textField($model,'codgrupo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desgrupo'); ?>
		<?php echo $form->textField($model,'desgrupo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'desgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'interno'); ?>
		<?php echo $form->textField($model,'interno',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'interno'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->