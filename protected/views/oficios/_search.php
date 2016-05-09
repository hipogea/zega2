<?php
/* @var $this OficiosController */
/* @var $model Oficios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codof'); ?>
		<?php echo $form->textField($model,'codof',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oficio'); ?>
		<?php echo $form->textField($model,'oficio',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->