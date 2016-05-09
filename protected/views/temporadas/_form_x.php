<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temporadas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'destemporada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio'); ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php echo $form->textField($model,'termino'); ?>
		<?php echo $form->error($model,'termino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuota_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_anchoveta'); ?>
		<?php echo $form->error($model,'cuota_anchoveta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuota_jurel'); ?>
		<?php echo $form->textField($model,'cuota_jurel'); ?>
		<?php echo $form->error($model,'cuota_jurel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cuota_global_anchoveta'); ?>
		<?php echo $form->textField($model,'cuota_global_anchoveta'); ?>
		<?php echo $form->error($model,'cuota_global_anchoveta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zonalitoral'); ?>
		<?php echo $form->textField($model,'zonalitoral',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'zonalitoral'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->