<?php
/* @var $this ObrasController */
/* @var $model Obras */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'obras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descriobra'); ?>
		<?php echo $form->textField($model,'descriobra',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'descriobra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oi'); ?>
		<?php echo $form->textField($model,'oi',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'oi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idinventario'); ?>
		<?php echo $form->textField($model,'idinventario'); ?>
		<?php echo $form->error($model,'idinventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechasol'); ?>
		<?php echo $form->textField($model,'fechasol'); ?>
		<?php echo $form->error($model,'fechasol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacierre'); ?>
		<?php echo $form->textField($model,'fechacierre'); ?>
		<?php echo $form->error($model,'fechacierre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cc'); ?>
		<?php echo $form->textField($model,'cc',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'cc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'om'); ?>
		<?php echo $form->textField($model,'om',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'om'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obs'); ?>
		<?php echo $form->textArea($model,'obs',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'obs'); ?>
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
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php echo $form->textField($model,'centro',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'centro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefijo'); ?>
		<?php echo $form->textField($model,'prefijo',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'prefijo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->