<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidot'); ?>
		<?php echo $form->textField($model,'hidot',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hinicio'); ?>
		<?php echo $form->textField($model,'hinicio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hfinal'); ?>
		<?php echo $form->textField($model,'hfinal',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'temperatura'); ?>
		<?php echo $form->textField($model,'temperatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hr'); ?>
		<?php echo $form->textField($model,'hr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lluvias'); ?>
		<?php echo $form->textField($model,'lluvias',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'viento'); ?>
		<?php echo $form->textField($model,'viento',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hiddireccion'); ?>
		<?php echo $form->textField($model,'hiddireccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->