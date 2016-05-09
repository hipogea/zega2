<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'impuestosdocu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">


			<?php echo $form->labelEx($model,'codocu'); ?>
			<?php  $datos1 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
			echo $form->DropDownList($model,'codocu',$datos1, array('empty'=>'--Seleccione un documento--')  )  ;
			?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codimpuesto'); ?>
		<?php  $datos1 = CHtml::listData(Impuestos::model()->findAll(array('order'=>'descripcion')),'codimpuesto','descripcion');
		echo $form->DropDownList($model,'codimpuesto',$datos1, array('empty'=>'--Seleccione un impuesto--')  )  ;
		?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'obligatorio'); ?>
		<?php 
		echo $form->checkBox($model,'obligatorio' )  ;
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>