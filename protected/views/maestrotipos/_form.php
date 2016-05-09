<?php
/* @var $this MaestrotiposController */
/* @var $model Maestrotipos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'maestrotipos-form',
		'enableClientValidation'=>TRUE,
		'clientOptions' => array(
			'validateOnSubmit'=>TRUE,
			'validateOnChange'=>TRUE  ,
		),
		'enableAjaxValidation'=>FALSE,




	)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php echo $form->textField($model,'codtipo',array('disabled'=>(!$model->isNewRecord)?'disabled':'','size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destipo'); ?>
		<?php echo $form->textField($model,'destipo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'destipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esrotativo'); ?>
		<?php echo $form->checkBox($model,'esrotativo'); ?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'esservicio'); ?>
		<?php echo $form->checkBox($model,'esservicio'); ?>

	</div>

		<?php echo CHtml::label('Este dato es de suam importancia, favor de confirmar con mucho cuidado','5656'); ?>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>