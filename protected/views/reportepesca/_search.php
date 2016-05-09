<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semana'); ?>
		<?php echo $form->textField($model,'semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harribo'); ?>
		<?php echo $form->textField($model,'harribo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hzarpe'); ?>
		<?php echo $form->textField($model,'hzarpe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codplantadestino'); ?>
		<?php echo $form->textField($model,'codplantadestino',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codplantazarpe'); ?>
		<?php echo $form->textField($model,'codplantazarpe',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'declarada'); ?>
		<?php echo $form->textField($model,'declarada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descargada'); ?>
		<?php echo $form->textField($model,'descargada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d2'); ?>
		<?php echo $form->textField($model,'d2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codzarpe'); ?>
		<?php echo $form->textField($model,'codzarpe',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->