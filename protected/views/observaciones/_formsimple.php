<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'observaciones-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
	
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>
	<div class="row">
		
		<?php echo $form->hiddenField($model,'hidinventario', array('value'=>$model->hidinventario)); ?>
		
	</div>

	
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'fecha',
				'value'=>$model->fecha,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					'defaultDate'=>$model->fecha)));
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobs'); ?>
		<?php echo $form->textArea($model,'mobs',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mobs'); ?>
	</div>

	
	
	 
	

<?php $this->endWidget(); ?>

</div><!-- form -->