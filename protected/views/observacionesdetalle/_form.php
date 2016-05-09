<?php
/* @var $this ObservacionesdetalleController */
/* @var $model Observacionesdetalle */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'observacionesdetalle-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php //echo $form->labelEx($model,'hidobservaciones'); ?>
		<?php echo $form->hiddenField($model,'hidobservaciones',array('value'=>$idobservacion)); ?>
		<?php //echo $form->error($model,'hidobservaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	

		

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear comentario' : 'Grabar Comentario'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->