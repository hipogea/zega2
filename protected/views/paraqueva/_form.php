<?php
/* @var $this ParaquevaController */
/* @var $model Paraqueva */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paraqueva-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'cmotivo'); ?>
		<?php echo $form->textField($model,'cmotivo',array('disabled'=>'disabled','size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cmotivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'motivo'); ?>
		<?php echo $form->textField($model,'motivo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'motivo'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->