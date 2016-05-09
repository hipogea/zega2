<?php
/* @var $this PlantasController */
/* @var $model Plantas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'plantas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Datos obligatorios <span class="required">*</span> .</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $model->isNewRecord ?"":$form->labelEx($model,'codplanta'); ?>
		<?php echo $model->isNewRecord ?"": $form->textField($model,'codplanta',array('disabled'=>'disabled','size'=>2,'maxlength'=>2)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desplanta'); ?>
		<?php echo $form->textField($model,'desplanta',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'desplanta'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codigozona'); ?>
		<?php echo $form->textField($model,'codigozona',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codigozona'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centrito'); 
	$datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
					echo $form->DropDownList($model,'centrito',$datos, array('empty'=>'--Llene el centro--'));
													   
		echo $form->error($model,'centrito');
		
		?>											         
					
	
	
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'capacidad'); ?>
		<?php echo $form->textField($model,'capacidad'); ?>
		<?php echo $form->error($model,'capacidad'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->