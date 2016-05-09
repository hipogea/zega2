<?php
/* @var $this CcController */
/* @var $model Cc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'codc'); ?>
		<?php echo $form->textField($model,'codc',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'desceco'); ?>
		<?php echo $form->textField($model,'desceco',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->