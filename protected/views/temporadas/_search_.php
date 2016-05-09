<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->