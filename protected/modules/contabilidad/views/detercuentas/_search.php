<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'codcatval'); ?>
		<?php echo $form->textField($model,'codcatval',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codop'); ?>
		<?php echo $form->textField($model,'codop',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuentadebe'); ?>
		<?php echo $form->textField($model,'cuentadebe',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cuentahaber'); ?>
		<?php echo $form->textField($model,'cuentahaber',array('size'=>18,'maxlength'=>18)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->