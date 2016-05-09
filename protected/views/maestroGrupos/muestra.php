<?php
/* @var $this MaestroGruposController */
/* @var $model MaestroGrupos */
/* @var $form CActiveForm */
?>

<div class="wide-form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestro-grupos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'descri'); ?>
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