<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sociedades-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="division">
		<div class="wide form">

	<div class="row">
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php echo $form->textField($model,'socio',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'socio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dsocio'); ?>
		<?php echo $form->textField($model,'dsocio',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'dsocio'); ?>
	</div>

			<div class="row">
				<?php echo $form->labelEx($model,'activo'); ?>
				<?php echo $form->checkBox($model,'activo'); ?>

			</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rucsoc'); ?>
		<?php echo $form->textField($model,'rucsoc',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'rucsoc'); ?>
	</div>

			<div class="row">
				<?php echo $form->labelEx($model,'direccionfiscal'); ?>
				<?php echo $form->textField($model,'direccionfiscal',array('size'=>60,'maxlength'=>60)); ?>
				<?php echo $form->error($model,'direccionfiscal'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'telefono'); ?>
				<?php echo $form->textField($model,'telefono',array('size'=>22,'maxlength'=>22)); ?>
				<?php echo $form->error($model,'telefono'); ?>
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'web'); ?>
				<?php echo $form->textField($model,'web',array('size'=>30,'maxlength'=>30)); ?>
				<?php echo $form->error($model,'web'); ?>
			</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>


		</div><!-- form -->

	</div><!-- form -->

</div><!-- form -->