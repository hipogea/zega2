<?php
/* @var $this ValoracionController */
/* @var $model Catvaloracion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catvaloracion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codcatval'); ?>
		<?php echo $form->textField($model,'codcatval',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codcatval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descat'); ?>
		<?php echo $form->textField($model,'descat',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'descat'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->