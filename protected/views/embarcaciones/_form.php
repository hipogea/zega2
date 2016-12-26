<?php
/* @var $this EmbarcacionesController */
/* @var $model Embarcaciones */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="wide form">
    <div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'embarcaciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Datos <span class="required">*</span> obligatorios.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('disabled'=>($model->isNewRecord )?'':'disabled','size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomep'); ?>
		<?php echo $form->textField($model,'nomep',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nomep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'matricula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cbodega'); ?>
		<?php echo $form->textField($model,'cbodega'); ?>
		<?php echo $form->error($model,'cbodega'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'eslora'); ?>
		<?php echo $form->textField($model,'eslora'); ?>
		<?php echo $form->error($model,'eslora'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'manga'); ?>
		<?php echo $form->textField($model,'manga'); ?>
		<?php echo $form->error($model,'manga'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'puntal'); ?>
		<?php echo $form->textField($model,'puntal'); ?>
		<?php echo $form->error($model,'puntal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activa'); ?>
	<?php echo $form->checkBox($model,'activa');?>
		<?php echo $form->error($model,'activa'); ?>
	</div>

	
	
	
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>
        </div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->