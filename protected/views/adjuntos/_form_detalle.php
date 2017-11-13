<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>


<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'adjuntos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	


	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6,'columns'=>145)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enlace'); ?>
		<?php echo CHtml::image($model->rutaCorta($model->enlace),'',array('width'=>200,'height'=>200)); ?>
		<?php //echo $form->error($model,'c_tel'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
