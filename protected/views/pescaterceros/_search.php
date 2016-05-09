<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */
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
		<?php echo $form->label($model,'codplanta'); ?>
		<?php echo $form->textField($model,'codplanta',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pesca'); ?>
		<?php echo $form->textField($model,'pesca'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroep'); ?>
		<?php echo $form->textField($model,'numeroep'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'factor'); ?>
		<?php echo $form->textField($model,'factor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->