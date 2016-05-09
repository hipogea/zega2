<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'socio'); ?>
		<?php echo $form->textField($model,'socio',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dsocio'); ?>
		<?php echo $form->textField($model,'dsocio',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rucsoc'); ?>
		<?php echo $form->textField($model,'rucsoc',array('size'=>11,'maxlength'=>11)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->