<?php
/* @var $this OtController */
/* @var $model Ot */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ot-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacre'); ?>
		<?php echo $form->textField($model,'fechacre'); ?>
		<?php echo $form->error($model,'fechacre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechafinprog'); ?>
		<?php echo $form->textField($model,'fechafinprog'); ?>
		<?php echo $form->error($model,'fechafinprog'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idobjeto'); ?>
		<?php echo $form->textField($model,'idobjeto'); ?>
		<?php echo $form->error($model,'idobjeto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php echo $form->textField($model,'codresponsable',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textocorto'); ?>
		<?php echo $form->textField($model,'textocorto',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'textocorto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupoplan'); ?>
		<?php echo $form->textField($model,'grupoplan',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'grupoplan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php echo $form->textField($model,'codcen',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codcen'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clase'); ?>
		<?php echo $form->textField($model,'clase',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidoferta'); ?>
		<?php echo $form->textField($model,'hidoferta',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'hidoferta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->