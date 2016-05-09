<?php
/* @var $this MaestrocliproController */
/* @var $model Maestroclipro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestroclipro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php echo $form->textField($model,'codmon',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->