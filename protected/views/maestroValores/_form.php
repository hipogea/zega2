<?php
/* @var $this MaestroValoresController */
/* @var $model MaestroValores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestro-valores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	

			<div class="row">	
		<?PHP
						
					   echo CHtml::Label('Grupo','3');
					  echo CHtml::DropDownList("lugarcitos",
															"",  // id_tipo_org es el nombre del campo en el modelo 
	CHtml::listData(MaestroGrupos::model()->findAll(),  // TipoOrgG es el modelo en el que se buscaran los datos  
							'id','descri'),  // id_tipo_org es el dato que se quiere guardar y  // descripción lo que se quiere mostrar  
	array('ajax' => array('type' => 'POST',  'url' => CController::createUrl('Maestrovalores/cargaatributos'), //  la acción que va a cargar el segundo div 
		'update' => '#MaestroValores_hidat' // el div que se va a actualizar
		),'prompt' => 'Seleccione un grupo' // Valor por defecto 
		)  ); 
					   
																	
?>	
	</div>
	
	
	<div class="row">
		 <?php 
		 echo $form->labelEx($model,'hidat'); 
		 echo $form->dropDownList($model,'hidat', array(), array(
																	'prompt' => 'Seleccione una organizacion' // Valor por defecto 
																	) 
									); 
		 ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'nombrevalor'); ?>
		<?php echo $form->textField($model,'nombrevalor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombrevalor'); ?>
	</div>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'resultado'); ?>
		<?php echo $form->textField($model,'resultado',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'resultado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo1'); ?>
		<?php echo $form->textField($model,'respaldo1',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'respaldo1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo2'); ?>
		<?php echo $form->textField($model,'respaldo2',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'respaldo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo3'); ?>
		<?php echo $form->textField($model,'respaldo3',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'respaldo3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->