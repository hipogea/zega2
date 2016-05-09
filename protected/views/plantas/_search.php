<?php
/* @var $this PlantasController */
/* @var $model Plantas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codplanta'); ?>
		<?php echo $form->textField($model,'codplanta',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desplanta'); ?>
		<?php echo $form->textField($model,'desplanta',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigozona'); ?>
		<?php echo $form->textField($model,'codigozona',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacidad'); ?>
		<?php echo $form->textField($model,'capacidad'); ?>
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