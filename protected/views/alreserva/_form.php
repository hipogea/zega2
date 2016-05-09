<?php
/* @var $this AlreservaController */
/* @var $model Alreserva */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alreserva-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidesolpe'); ?>
		<?php echo $form->textField($model,'hidesolpe'); ?>
		<?php echo $form->error($model,'hidesolpe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoreserva'); ?>
		<?php echo $form->textField($model,'estadoreserva',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'estadoreserva'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechares'); ?>
		<?php echo $form->textField($model,'fechares'); ?>
		<?php echo $form->error($model,'fechares'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flag'); ?>
		<?php echo $form->textField($model,'flag',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->