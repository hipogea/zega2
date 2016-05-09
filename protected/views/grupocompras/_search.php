<?php
/* @var $this GrupocomprasController */
/* @var $model Grupocompras */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codgrupo'); ?>
		<?php echo $form->textField($model,'codgrupo',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codalm'); ?>
		<?php echo $form->textField($model,'codalm',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomgru'); ?>
		<?php echo $form->textField($model,'nomgru',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desgru'); ?>
		<?php echo $form->textArea($model,'desgru',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">


	</div>



	<div class="row">
		<?php echo $form->label($model,'codsociedad'); ?>
		<?php echo $form->textField($model,'codsociedad',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->