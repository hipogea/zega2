<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cmotivo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codmotivo'); ?>
		<?php echo $form->textField($model,'codmotivo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codmotivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desmotivo'); ?>
		<?php echo $form->textField($model,'desmotivo',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'desmotivo'); ?>
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