<?php
/* @var $this CliproController */
/* @var $model Clipro */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'destinatario-form',	
	'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
	
)); ?>

	

	

	<div class="row">
		<?php echo $form->labelEx($model,'correodestinatario'); ?>
		<?php echo $form->textField($model,'correodestinatario',array('size'=>46,'maxlength'=>46)); ?>
		<?php echo $form->error($model,'correodestinatario'); ?>
	</div>
<div class="row">
		
		<?php echo $form->hiddenField($model,'hidevento',array('value'=>$id)); ?>
		
</div>
		
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->