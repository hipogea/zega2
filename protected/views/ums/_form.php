<?php
/* @var $this UmsController */
/* @var $model Ums */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ums-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('disabled'=>(!$model->isNewRecord)?'disabled':'','size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desum'); ?>
		<?php echo $form->textField($model,'desum',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'desum'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>