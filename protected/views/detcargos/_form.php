<?php
/* @var $this DetcargosController */
/* @var $model Detcargos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detcargos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidcargo'); ?>
		<?php echo $form->textField($model,'hidcargo'); ?>
		<?php echo $form->error($model,'hidcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coditem'); ?>
		<?php echo $form->textField($model,'coditem',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coditem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmaterial'); ?>
		<?php echo $form->textField($model,'codmaterial',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codmaterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_detcargo'); ?>
		<?php echo $form->textArea($model,'m_detcargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'m_detcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_esdetcargo'); ?>
		<?php echo $form->textField($model,'c_esdetcargo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'c_esdetcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrip'); ?>
		<?php echo $form->textField($model,'descrip',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descrip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddocudetallecargo'); ?>
		<?php echo $form->textField($model,'coddocudetallecargo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddocudetallecargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantcargo'); ?>
		<?php echo $form->textField($model,'cantcargo'); ?>
		<?php echo $form->error($model,'cantcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esactivo'); ?>
		<?php echo $form->textField($model,'esactivo'); ?>
		<?php echo $form->error($model,'esactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esusado'); ?>
		<?php echo $form->textField($model,'esusado'); ?>
		<?php echo $form->error($model,'esusado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'umedida'); ?>
		<?php echo $form->textField($model,'umedida',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'umedida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->