<?php
/* @var $this MaestroAtributosController */
/* @var $model MaestroAtributos */
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
		<?php echo $form->label($model,'nombreat'); ?>
		<?php echo $form->textField($model,'nombreat',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hid'); ?>
		<?php echo $form->textField($model,'hid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'padre'); ?>
		<?php echo $form->textField($model,'padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jerarquia'); ?>
		<?php echo $form->textField($model,'jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo'); ?>
		<?php echo $form->textField($model,'respaldo',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo2'); ?>
		<?php echo $form->textField($model,'respaldo2',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'respaldo3'); ?>
		<?php echo $form->textField($model,'respaldo3',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tieneum'); ?>
		<?php echo $form->textField($model,'tieneum',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->