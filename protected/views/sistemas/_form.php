<?php
/* @var $this SistemasController */
/* @var $model Sistemas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sistemas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codsistema'); ?>
		<?php echo $form->textField($model,'codsistema',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codsistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sistema'); ?>
		<?php echo $form->textField($model,'sistema',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'sistema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpadre'); ?>
		<?php echo $form->textField($model,'codpadre',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codpadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->