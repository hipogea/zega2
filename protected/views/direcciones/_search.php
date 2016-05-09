<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'c_hcod'); ?>
		<?php echo $form->textField($model,'c_hcod',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_direc'); ?>
		<?php echo $form->textField($model,'c_direc',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_vale'); ?>
		<?php echo $form->checkBox($model,'l_vale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_nomlug'); ?>
		<?php echo $form->textField($model,'c_nomlug',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_valor'); ?>
		<?php echo $form->textField($model,'n_valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_distrito'); ?>
		<?php echo $form->textField($model,'c_distrito',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_prov'); ?>
		<?php echo $form->textField($model,'c_prov',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_departam'); ?>
		<?php echo $form->textField($model,'c_departam',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_direc'); ?>
		<?php echo $form->textField($model,'n_direc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'socio'); ?>
		<?php echo $form->textField($model,'socio',array('size'=>1,'maxlength'=>1)); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->