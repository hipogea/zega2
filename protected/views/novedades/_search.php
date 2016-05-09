<?php
/* @var $this NovedadesController */
/* @var $model Novedades */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idnovedad'); ?>
		<?php echo $form->textField($model,'idnovedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidparte'); ?>
		<?php echo $form->textField($model,'hidparte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codsistema'); ?>
		<?php echo $form->textField($model,'codsistema',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigosap'); ?>
		<?php echo $form->textField($model,'codigosap',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoaf'); ?>
		<?php echo $form->textField($model,'codigoaf',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descridetalle'); ?>
		<?php echo $form->textArea($model,'descridetalle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'criticidad'); ?>
		<?php echo $form->textField($model,'criticidad',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->