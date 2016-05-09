<?php
/* @var $this LoginventarioController */
/* @var $model Loginventario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loginventario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidinventario'); ?>
		<?php echo $form->textField($model,'hidinventario'); ?>
		<?php echo $form->error($model,'hidinventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_estado'); ?>
		<?php echo $form->textField($model,'c_estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'c_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codlugar'); ?>
		<?php echo $form->textField($model,'codlugar',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codlugar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigopadre'); ?>
		<?php echo $form->textField($model,'codigopadre',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codigopadre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerodocumento'); ?>
		<?php echo $form->textField($model,'numerodocumento',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numerodocumento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adicional'); ?>
		<?php echo $form->textField($model,'adicional',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'adicional'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codepanterior'); ?>
		<?php echo $form->textField($model,'codepanterior',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codepanterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codlugarant'); ?>
		<?php echo $form->textField($model,'codlugarant',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codlugarant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iddocu'); ?>
		<?php echo $form->textField($model,'iddocu'); ?>
		<?php echo $form->error($model,'iddocu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->