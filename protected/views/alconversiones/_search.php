<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'um1'); ?>
		<?php echo $form->textField($model,'um1',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'um2'); ?>
		<?php echo $form->textField($model,'um2',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerador'); ?>
		<?php echo $form->textField($model,'numerador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'denominador'); ?>
		<?php echo $form->textField($model,'denominador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->