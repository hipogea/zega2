<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cc-gastos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'ceco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacontable'); ?>
		<?php echo $form->textField($model,'fechacontable'); ?>
		<?php echo $form->error($model,'fechacontable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmoneda'); ?>
		<?php echo $form->textField($model,'codmoneda',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codmoneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idref'); ?>
		<?php echo $form->textField($model,'idref',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'idref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'creadoel',array('size'=>19,'maxlength'=>19)); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model,'ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mes'); ?>
		<?php echo $form->textField($model,'mes',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'mes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clasecolector'); ?>
		<?php echo $form->textField($model,'clasecolector',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'clasecolector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->