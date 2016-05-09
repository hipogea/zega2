<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacenes-form',
'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true
     ),

)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codalm'); ?>
		<?php echo $form->textField($model,'codalm',array('size'=>3,'maxlength'=>3,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codalm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomal'); ?>
		<?php echo $form->textField($model,'nomal',array('size'=>35,'maxlength'=>35,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'nomal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desalm'); ?>
		<?php echo $form->textArea($model,'desalm',array('rows'=>6, 'cols'=>50,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'desalm'); ?>
	</div>

	

	 <div class="row">
	  
		
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php echo Chtml::textField('nomal',$model->centros->nomcen,array('value'=>$model->centros->nomcen,'size'=>35,'maxlength'=>35,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipovaloracion'); ?>
		<?php echo $form->textField($model,'tipovaloracion',array('size'=>2,'maxlength'=>2,'disabled'=>'disabled')); ?>



		<?php echo $form->error($model,'tipovaloracion'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codsoc'); ?>
		<?php echo $form->textField($model,'codsoc',array('size'=>1,'maxlength'=>1,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codsoc'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'estructura'); ?>
		<?php echo $form->textField($model,'estructura',array('size'=>15,'maxlength'=>15,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'estructura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'verprecios'); ?>
		<?php echo $form->checkBox($model,'verprecios',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'verprecios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'novalorado'); ?>
		<?php echo $form->checkBox($model,'novalorado',array('disabled'=>'disabled')); ?>

	</div>





<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

