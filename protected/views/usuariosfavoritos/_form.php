<?php
/* @var $this UsuariosfavoritosController */
/* @var $model Usuariosfavoritos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuariosfavoritos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hiduser'); ?>
		<?php echo $form->textField($model,'hiduser'); ?>
		<?php echo $form->error($model,'hiduser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecharegistro'); ?>
		<?php echo $form->textField($model,'fecharegistro'); ?>
		<?php echo $form->error($model,'fecharegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valido'); ?>
		<?php echo $form->textField($model,'valido',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'valido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapa'); ?>
		<?php echo $form->textField($model,'chapa',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'chapa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->