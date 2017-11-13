<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	

	<div class="row">
	
		<?php 
		if($model->isNewRecord )
		    {
													
												echo $form->hiddenField($model,'hiduser',array('size'=>6,'maxlength'=>6,'value'=>Yii::app()->user->id)); 	
													//echo "el contacto es : ".$codpro;
												} else  {
													
												echo $form->textField($model,'hiduser',array('disabled'=>'disabled','size'=>6,'maxlength'=>6,'value'=>Yii::app()->user->id)); 	
												}
			
			
			?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('value'=>$url,'size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'chapa'); ?>
		<?php echo $form->textField($model,'chapa',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'chapa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valido'); ?>
		<?php echo $form->checkBox($model,'valido'); ?>
		
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>