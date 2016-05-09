<?php
/* @var $this DcajachicaController */
/* @var $model Dcajachica */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dcajachica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidcaja'); ?>
		<?php echo $form->textField($model,'hidcaja'); ?>
		<?php echo $form->error($model,'hidcaja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'glosa'); ?>
		<?php echo $form->textField($model,'glosa',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'glosa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debe'); ?>
		<?php echo $form->textField($model,'debe',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'debe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'haber'); ?>
		<?php echo $form->textField($model,'haber',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'haber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monedahaber'); ?>
		<?php echo $form->textField($model,'monedahaber',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'monedahaber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldo'); ?>
		<?php echo $form->textField($model,'saldo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'saldo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php echo $form->textField($model,'codtra',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codtra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'ceco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacre'); ?>
		<?php echo $form->textField($model,'fechacre'); ?>
		<?php echo $form->error($model,'fechacre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo $form->textField($model,'iduser'); ?>
		<?php echo $form->error($model,'iduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->