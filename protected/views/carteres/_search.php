<?php
/* @var $this CarteresController */
/* @var $model Carteres */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idcarter'); ?>
		<?php echo $form->textField($model,'idcarter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idequipo'); ?>
		<?php echo $form->textField($model,'idequipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'capacidad'); ?>
		<?php echo $form->textField($model,'capacidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoaceite'); ?>
		<?php echo $form->textField($model,'tipoaceite',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horascambio'); ?>
		<?php echo $form->textField($model,'horascambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipocarter'); ?>
		<?php echo $form->textField($model,'tipocarter',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'haceite'); ?>
		<?php echo $form->textField($model,'haceite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hmuestra'); ?>
		<?php echo $form->textField($model,'hmuestra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nummuestras'); ?>
		<?php echo $form->textField($model,'nummuestras'); ?>
	</div>

	<div class="row">


	</div>

	<div class="row">
		<?php echo $form->label($model,'creadoel'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadopor'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadoel'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'fulectura'); ?>
		<?php echo $form->textField($model,'fulectura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fumuestra'); ?>
		<?php echo $form->textField($model,'fumuestra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fucambio'); ?>
		<?php echo $form->textField($model,'fucambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horometro'); ?>
		<?php echo $form->textField($model,'horometro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activo'); ?>
		<?php echo $form->textField($model,'activo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hucambio'); ?>
		<?php echo $form->textField($model,'hucambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'casco'); ?>
		<?php echo $form->textField($model,'casco'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->