<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */
/* @var $form CActiveForm */
?>

<?php MiFactoria::titulo("Cambio de ".$model->monedaref."  a   ".$model->codmon2,"package"); ?>
<div class="division">
<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmoneda-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'compra'); ?>
		<?php echo $form->textField($model,'compra',array('size'=>3,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venta'); ?>
		<?php echo $form->textField($model,'venta',array('size'=>3,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monedaref'); ?>
		<?php echo $form->DropDownList($model,'monedaref',$monedas,array('empty'=>'--Seleccione moneda --')); ?>
		<?php echo $form->error($model,'monedaref'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>