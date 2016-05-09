<?php
/* @var $this OficiosController */
/* @var $model Oficios */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'oficios-form',
	'enableAjaxValidation'=>false,
)); ?>

	



	<div class="row">
		<?php echo $form->labelEx($model,'codof'); ?>
		<?php echo $form->textField($model,'codof',array('disabled'=>'disabled','size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codof'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oficio'); ?>
		<?php echo $form->textField($model,'oficio',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'oficio'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>