<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reportepesca-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php echo $form->textField($model,'embarcacion.nomep',array('size'=>23,'maxlength'=>23)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semana'); ?>
		<?php echo $form->textField($model,'semana'); ?>
		<?php echo $form->error($model,'semana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harribo'); ?>
		<?php echo $form->textField($model,'harribo'); ?>
		<?php echo $form->error($model,'harribo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hzarpe'); ?>
		<?php echo $form->textField($model,'hzarpe'); ?>
		<?php echo $form->error($model,'hzarpe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codplantadestino'); ?>
		<?php echo $form->textField($model,'codplantadestino',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codplantadestino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codplantazarpe'); ?>
		<?php echo $form->textField($model,'codplantazarpe',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codplantazarpe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'declarada'); ?>
		<?php echo $form->textField($model,'declarada'); ?>
		<?php echo $form->error($model,'declarada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descargada'); ?>
		<?php echo $form->textField($model,'descargada'); ?>
		<?php echo $form->error($model,'descargada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d2'); ?>
		<?php echo $form->textField($model,'d2'); ?>
		<?php echo $form->error($model,'d2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codzarpe'); ?>
		<?php echo $form->textField($model,'codzarpe',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codzarpe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->