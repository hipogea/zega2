<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'direcciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'c_hcod'); ?>
		<?php echo $form->textField($model,'c_hcod',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'c_hcod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_direc'); ?>
		<?php echo $form->textField($model,'c_direc',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'c_direc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_vale'); ?>
		<?php echo $form->checkBox($model,'l_vale'); ?>
		<?php echo $form->error($model,'l_vale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_nomlug'); ?>
		<?php echo $form->textField($model,'c_nomlug',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'c_nomlug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_valor'); ?>
		<?php echo $form->textField($model,'n_valor'); ?>
		<?php echo $form->error($model,'n_valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_distrito'); ?>
		<?php echo $form->textField($model,'c_distrito',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'c_distrito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_prov'); ?>
		<?php echo $form->textField($model,'c_prov',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'c_prov'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_departam'); ?>
		<?php echo $form->textField($model,'c_departam',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'c_departam'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_direc'); ?>
		<?php echo $form->textField($model,'n_direc'); ?>
		<?php echo $form->error($model,'n_direc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php echo $form->textField($model,'socio',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'socio'); ?>
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