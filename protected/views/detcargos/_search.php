<?php
/* @var $this DetcargosController */
/* @var $model Detcargos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'hidcargo'); ?>
		<?php echo $form->textField($model,'hidcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coditem'); ?>
		<?php echo $form->textField($model,'coditem',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codmaterial'); ?>
		<?php echo $form->textField($model,'codmaterial',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_detcargo'); ?>
		<?php echo $form->textArea($model,'m_detcargo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_esdetcargo'); ?>
		<?php echo $form->textField($model,'c_esdetcargo',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iddetcargo'); ?>
		<?php echo $form->textField($model,'iddetcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descrip'); ?>
		<?php echo $form->textField($model,'descrip',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coddocudetallecargo'); ?>
		<?php echo $form->textField($model,'coddocudetallecargo',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantcargo'); ?>
		<?php echo $form->textField($model,'cantcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esactivo'); ?>
		<?php echo $form->textField($model,'esactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esusado'); ?>
		<?php echo $form->textField($model,'esusado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'umedida'); ?>
		<?php echo $form->textField($model,'umedida',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->