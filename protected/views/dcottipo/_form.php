<?php
/* @var $this DcottipoController */
/* @var $model Dcottipo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dcottipo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php echo $form->textField($model,'codtipo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destipo'); ?>
		<?php echo $form->textField($model,'destipo',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'destipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->