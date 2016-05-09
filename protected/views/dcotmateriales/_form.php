<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dcotmateriales-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'numcot'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disp'); ?>
		<?php echo $form->textField($model,'disp',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'disp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punit'); ?>
		<?php echo $form->textField($model,'punit'); ?>
		<?php echo $form->error($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descri'); ?>
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
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoitem'); ?>
		<?php echo $form->textField($model,'tipoitem',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipoitem'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadodetalle'); ?>
		<?php echo $form->textField($model,'estadodetalle',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'estadodetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidguia'); ?>
		<?php echo $form->textField($model,'hidguia'); ?>
		<?php echo $form->error($model,'hidguia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codservicio'); ?>
		<?php echo $form->textField($model,'codservicio',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codservicio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->