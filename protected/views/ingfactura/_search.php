<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="row">
		<?php echo $form->label($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechadoc'); ?>
		<?php echo $form->textField($model,'fechadoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerodoc'); ?>
		<?php echo $form->textField($model,'numerodoc',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seriedoc'); ?>
		<?php echo $form->textField($model,'seriedoc',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numrecepcion'); ?>
		<?php echo $form->textField($model,'numrecepcion',array('size'=>10,'maxlength'=>10)); ?>
	</div>



	<div class="row">
		<?php echo $form->label($model,'codart'); ?>
		<?php echo $form->textField($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechacrea'); ?>
		<?php echo $form->textField($model,'fechacrea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codentro'); ?>
		<?php echo $form->textField($model,'codentro',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numocompra'); ?>
		<?php echo $form->textField($model,'numocompra',array('size'=>12,'maxlength'=>12)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>