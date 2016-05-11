<?php
/* @var $this CargosController */
/* @var $model Cargos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargos-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'codcanal'); ?>
		<?php echo $form->textField($model,'codcanal',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'codcanal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'canal'); ?>
		<?php echo $form->textField($model,'canal',array('size'=>40, 'maxlenght'=>40)); ?>
		<?php echo $form->error($model,'canal'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

