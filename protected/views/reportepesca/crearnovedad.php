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

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

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
		<?php echo $form->labelEx($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descridetalle'); ?>
		<?php echo $form->textArea($model,'descridetalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descridetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'criticidad'); ?>
		<?php //echo $form->labelEx($model,$model->advertencia); ?>
		<?php  $datos = array('A' => 'Muy grave','B'=> 'Urgente','C'=> 'Serio','D' => 'Necesario', 'E'=> 'No critico');
		  echo $form->DropDownList($model,'criticidad',$datos, array('empty'=>'--Indique prioridad--')  )  ;	?>
		<?php //echo $form->textField($model,'criticidad',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'criticidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear novedad' : 'Grabar novedad'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->