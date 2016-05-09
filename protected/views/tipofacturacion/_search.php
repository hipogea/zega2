<?php
/* @var $this TipofacturacionController */
/* @var $model Tipofacturacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codtipofac'); ?>
		<?php echo $form->textField($model,'codtipofac',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipofacturacion'); ?>
		<?php echo $form->textField($model,'tipofacturacion',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->