<?php
/* @var $this CuentasController */
/* @var $model Cuentas */
/* @var $form CActiveForm */
?>
<div class="division">
    
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuentas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codcuenta'); ?>
		<?php echo $form->textField($model,'codcuenta',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'codcuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descuenta'); ?>
		<?php echo $form->textField($model,'descuenta',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'descuenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clase'); ?>
		<?php echo $form->textField($model,'clase',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contrapartida'); ?>
		<?php echo $form->textField($model,'contrapartida',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'contrapartida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n2'); ?>
		<?php echo $form->textField($model,'n2',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'n2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n3'); ?>
		<?php echo $form->textField($model,'n3',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'n3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro'); ?>
		<?php echo $form->checkBox($model,'registro'); ?>
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
    </div><!-- form -->