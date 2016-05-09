<?php
/* @var $this PartesController */
/* @var $model Partes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puerto'); ?>
		<?php echo $form->textField($model,'puerto',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puertodes'); ?>
		<?php echo $form->textField($model,'puertodes',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horometro'); ?>
		<?php echo $form->textField($model,'horometro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horometrodes'); ?>
		<?php echo $form->textField($model,'horometrodes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerodecalas'); ?>
		<?php echo $form->textField($model,'numerodecalas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->