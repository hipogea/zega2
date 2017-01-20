<?php
/* @var $this PeriodosController */
/* @var $model Periodos */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="division">
		<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periodos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mes'); ?>
		<?php $datos=MiFactoria::meses(); ?>
		<?php echo $form->DropDownList($model,'mes',$datos, array('empty'=>'--Seleccione un mes--','disabled'=>'')  ); ?>
		<?php echo $form->error($model,'mes'); ?>
	</div>
                    
      

	<div class="row">
		<?php echo $form->labelEx($model,'anno'); ?>
		<?php $datos1=MiFactoria::anos(); ?>
		<?php echo $form->DropDownList($model,'anno',$datos1, array('empty'=>'--Seleccione un año--','disabled'=>'')  ); ?>
		<?php echo $form->error($model,'anno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'final'); ?>
		<?php echo $form->textField($model,'final',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'final'); ?>
	</div>
                    
        <div class="row">
		<?php echo $form->labelEx($model,'desperiodo'); ?>
		<?php echo $form->textField($model,'desperiodo',array()); ?>
		<?php echo $form->error($model,'desperiodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'toleranciaatras'); ?>
		<?php echo $form->textField($model,'toleranciaatras'); ?>
		<?php echo $form->error($model,'toleranciaatras'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'toleranciadelante'); ?>
		<?php echo $form->textField($model,'toleranciadelante'); ?>
		<?php echo $form->error($model,'toleranciadelante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>
		</div>

		</div>
</div><!-- form -->