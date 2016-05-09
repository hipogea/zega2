<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>


<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,

	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>


	
 <div class="row">
		<?php echo $form->labelEx($model,'nombrelista'); ?>
		<?php echo $form->textField($model,'nombrelista',array('size'=>60,'maxlength'=>60, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'nombrelista'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array( 'disabled'=>$habilitado,'rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compartida'); ?>
		<?php echo $form->checkBox($model,'compartida',array( 'disabled'=>''));?>
		<?php echo $form->error($model,'compartida'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton(($model->isNewRecord)?'Agregar' : 'Actualizar'); ?>
	</div>





<?php $this->endWidget(); ?>

</div><!-- form -->



