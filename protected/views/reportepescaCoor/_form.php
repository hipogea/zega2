<?php
/* @var $this ReportepescaCoorController */
/* @var $model ReportepescaCoor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reportepesca-coor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidreporte'); ?>
		<?php echo $form->textField($model,'hidreporte'); ?>
		<?php echo $form->error($model,'hidreporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitud'); ?>
		<?php echo $form->textField($model,'latitud',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'latitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meridiano'); ?>
		<?php echo $form->textField($model,'meridiano',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'meridiano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aliaszona'); ?>
		<?php echo $form->textField($model,'aliaszona',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'aliaszona'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->