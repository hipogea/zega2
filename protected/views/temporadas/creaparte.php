<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temporadas-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php echo $form->textField($model,'termino',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idespecie'); ?>
		<?php  $datos = CHtml::listData(Especies::model()->findAll(),'id','nomespecie');?>
		<?php    echo $form->DropDownList($model,'id',$datos, array('empty'=>'--Seleccione una Especie--')  )  ;	?>
		
		
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton( 'Crear parte' ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->