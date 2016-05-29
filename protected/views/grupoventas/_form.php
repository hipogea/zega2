<?php
/* @var $this ChoferesController */
/* @var $model Choferes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupocompras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php echo $form->textField($model,'codgrupo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desgru'); ?>
		<?php echo $form->textField($model,'desgru',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'desgru'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codsociedad'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		echo $form->DropDownList($model,'codsociedad',$datos1, array('empty'=>'--Seleccione sociedad--')  )  ;
		?>
		<?php echo $form->error($model,'codsociedad'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->