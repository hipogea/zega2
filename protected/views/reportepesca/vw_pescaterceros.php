<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pescaterceros-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Datos <span class="required">*</span> Obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codplanta'); ?>
		<?php  $datos = CHtml::listData(Plantas::model()->findAll(),'codplanta','desplanta');?>
		<?php echo $form->HiddenField($model,'codplanta',array('value'=>$model->isNewRecord ?$codplanta:$model->codplanta)); ?>
		<?php  echo $model->isNewRecord ? CHtml::textField('HOLA',$desplanta,array('disabled'=>'disabled')):$form->DropDownList($model,'codplanta',$datos, array('codplanta'=>'--Seleccione una Especie--','disabled'=>'disabled')  ) ; //echo $form->DropDownList($model,'codplanta',$datos, array('empty'=>$model->isNewRecord ?$codplanta:$model->codplanta,'disabled'=>'disabled')  )  ;	?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pesca'); ?>
		<?php echo $form->textField($model,'pesca'); ?>
		<?php echo $form->error($model,'pesca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroep'); ?>
		<?php echo $form->textField($model,'numeroep'); ?>
		<?php echo $form->error($model,'numeroep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('value'=>$model->isNewRecord ?$fecha:$model->fecha,'disabled'=>'disabled')); ?>
		<?php echo $form->HiddenField($model,'fecha',array('value'=>$model->isNewRecord ?$fecha:$model->fecha)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'factor'); ?>
		<?php echo $form->textField($model,'factor'); ?>
		<?php echo $form->error($model,'factor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->