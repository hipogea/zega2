<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
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
		<?php echo $form->label($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'termino'); ?>
		<?php echo $form->textField($model,'termino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuota_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_anchoveta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuota_jurel'); ?>
		<?php echo $form->textField($model,'cuota_jurel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuota_global_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_global_anchoveta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zonalitoral'); ?>
		<?php echo $form->textField($model,'zonalitoral',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->