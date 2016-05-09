<?php
/* @var $this ArchivadorController */
/* @var $model Archivador */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'archivador-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
	 'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Campos con  <span class="required">*</span> son obligatorios.</p>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(" coddocupadre in ('999','000') "),'coddocu','desdocu');
					echo $form->DropDownList($model,'codocu',$datos, array('empty'=>'--Seleccione un clase --')  )
		?>
		
		
		<?php //echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desarchivo'); ?>
		<?php echo $form->textField($model,'desarchivo',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'desarchivo'); ?>
	</div>

	<div class="row">
		<?php 	echo $form->labelEx($model, 'archivo');
		echo $form->fileField($model, 'archivo');
		echo $form->error($model, 'archivo');
	?>
	</div>
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'obsarchivo'); ?>
		<?php echo $form->textArea($model,'obsarchivo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'obsarchivo'); ?>
	</div>

	

	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Subir' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->