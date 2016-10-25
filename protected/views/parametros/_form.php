<?php
/* @var $this ParametrosController */
/* @var $model Parametros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametros-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codparam'); ?>
		<?php echo $form->textField($model,'codparam',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codparam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desparam'); ?>
		<?php echo $form->textField($model,'desparam',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'desparam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'explicacion'); ?>
		<?php echo $form->textArea($model,'explicacion'); ?>
		<?php echo $form->error($model,'explicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipodato'); ?>
		<?php echo $form->textField($model,'tipodato',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipodato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitud'); ?>
		<?php echo $form->textField($model,'longitud'); ?>
		<?php echo $form->error($model,'longitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lista'); ?>
		<?php echo $form->textArea($model,'lista',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'lista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->