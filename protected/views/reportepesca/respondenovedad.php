<?php
/* @var $this NovedadesController */
/* @var $model Novedades */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'novedades-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php //echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php //echo $form->labelEx($model,'hidparte'); ?>
		<?php //echo $form->textField($model,'hidparte',array('value'=>$codigodelparte)); ?>
		<?php echo ($model->isNewRecord )?$form->hiddenField($model,'idpartepesca',array('value'=>$identidadparte,'border'=>0)):""; ?>
		<?php //echo $form->error($model,'hidparte'); ?>
	</div>

		
	
	
	
	<div class="row">
		<?php //echo $form->labelEx($model,'codsistema'); ?>
		<?php // $datos = CHtml::listData(Sistemas::model()->findAll(),'codsistema','sistema');
		  //echo //$form->DropDownList($model,'codsistema',$datos, array('empty'=>'--Seleccione un ssitema--')  )  ;
		?>
		
		<?php //echo //$form->error($model,'codsistema'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->textField($model,'descri',array('disabled'=>'disabled','size'=>30,'maxlength'=>30)); ?>
		
	</div>
	

	

	<div class="row">
		<?php echo $form->labelEx($model,'ultimares'); ?>
		<?php echo $form->textArea($model,'ultimares',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ultimares'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear novedad' : 'Grabar respuesta'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->