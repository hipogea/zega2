<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipocambio-form',
	'enableClientValidation'=>true,
    
	'enableAjaxValidation'=>false,
)); ?>

	

	

	<div class="row">
	
		<?php 
		//echo $form->textField($model,'codmon1',array('disabled'=>'disabled','size'=>4,'maxlength'=>4,'value'=>'SOL')); 	
		?>
		<?php echo $form->errorSummary($model); ?>
		
	</div>

	<div class="row">
	
		<?php 
		echo $form->textField($model,'codmon2',array('disabled'=>'disabled','size'=>4,'maxlength'=>4,'value'=>Yii::app()->params['monedaalternativa'])); 	
		?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compra'); ?>
		<?php echo $form->textField($model,'compra'); ?>
		<?php echo $form->error($model,'compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venta'); ?>
		<?php echo $form->textField($model,'venta'); ?>
		<?php echo $form->error($model,'venta'); ?>
	</div>
	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>