<?php
/* @var $this MaestroValoresController */
/* @var $model MaestroValores */
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
		<?php echo $form->label($model,'nombrevalor'); ?>
		<?php echo $form->textField($model,'nombrevalor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidat'); ?>
		<?php echo $form->textField($model,'hidat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo1'); ?>
		<?php echo $form->textField($model,'respaldo1',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo2'); ?>
		<?php echo $form->textField($model,'respaldo2',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo3'); ?>
		<?php echo $form->textField($model,'respaldo3',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->