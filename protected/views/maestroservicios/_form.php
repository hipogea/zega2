<?php
/* @var $this MaestroserviciosController */
/* @var $model Maestroservicios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestroservicios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codserv'); ?>
		<?php echo $form->textField($model,'codserv',array('disabled'=>'disabled','size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'codserv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'catval'); ?>
		<?php
		$datos = CHtml::listData(Catvaloracion::model()->findAll("tipo='S'"),'codcatval','descat');
		echo $form->DropDownList($model,'catval',$datos, array('empty'=>'--Llene el grupo de valoracion--'));

		?>
		<?php echo $form->error($model,'catval'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Editar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->