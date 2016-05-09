<?php
/* @var $this ImpuestosController */
/* @var $model Impuestos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'impuestos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codimpuesto'); ?>
		<?php echo $form->textField($model,'codimpuesto',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codimpuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codsunat'); ?>
		<?php echo $form->textField($model,'codsunat',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codsunat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codune'); ?>
		<?php echo $form->textField($model,'codune',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codune'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->