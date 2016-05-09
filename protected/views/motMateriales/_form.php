<?php
/* @var $this MotMaterialesController */
/* @var $model MotMateriales */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mot-materiales-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codplanta'); ?>
		<?php echo $form->textField($model,'codplanta',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codplanta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtraba'); ?>
		<?php echo $form->textField($model,'codtraba',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codtraba'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'creadoel',array('size'=>25,'maxlength'=>25)); ?>

	</div>

	<div class="row">

		<?php echo $form->textField($model,'creadopor',array('size'=>20,'maxlength'=>20)); ?>

	</div>

	<div class="row">

		<?php echo $form->textField($model,'modificadoel',array('size'=>25,'maxlength'=>25)); ?>

	</div>

	<div class="row">

		<?php echo $form->textField($model,'modificadopor'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->