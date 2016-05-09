<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'nomal'); ?>
		<?php echo $form->textField($model,'nomal',array('size'=>35,'maxlength'=>35)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'modificadopor'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadoel'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'codsoc'); ?>
		<?php echo $form->textField($model,'codsoc',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipovaloracion'); ?>
		<?php echo $form->textField($model,'tipovaloracion',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estructura'); ?>
		<?php echo $form->textField($model,'estructura',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->