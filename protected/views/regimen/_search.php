<?php
/* @var $this RegimenController */
/* @var $model Regimen */
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
		<?php echo $form->label($model,'desregimen'); ?>
		<?php echo $form->textField($model,'desregimen',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dias'); ?>
		<?php echo $form->textField($model,'dias',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcextras'); ?>
		<?php echo $form->textField($model,'porcextras'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcdomingo'); ?>
		<?php echo $form->textField($model,'porcdomingo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcfer'); ?>
		<?php echo $form->textField($model,'porcfer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horasdia'); ?>
		<?php echo $form->textField($model,'horasdia'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'frecpago'); ?>
		<?php echo $form->textField($model,'frecpago',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'turno'); ?>
		<?php echo $form->textField($model,'turno',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acumuladomingo'); ?>
		<?php echo $form->textField($model,'acumuladomingo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tarifamensual'); ?>
		<?php echo $form->textField($model,'tarifamensual',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->