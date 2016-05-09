<?php
/* @var $this GrupoccController */
/* @var $model Grupocc */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="division">
	<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupocc-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php echo $form->textField($model,'codgrupo',array('disabled'=>(!$model->isnewRecord)?'disabled':'','size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codclase'); ?>
		<?php  $datos1 = CHtml::listData(Clasecc::model()->findAll(array('order'=>'desclasecolector')),'codclasecolector','desclasecolector');
		echo $form->DropDownList($model,'codclase',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>'',
		) ) ;
		?><?php echo $form->error($model,'codclase'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'desgrupo'); ?>
		<?php echo $form->textField($model,'desgrupo',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'desgrupo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Editar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div></div>