<?php
/* @var $this LugaresController */
/* @var $model Lugares */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugares-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> Son obligatorios</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php //echo $form->hiddenField($model,'codlugar',array('value'=>$codpro)); ?>
		
	</div>
<div class="row">
	<?php echo $form->labelEx($model,'codpro');  
	// Nombre de la etiqueta a mostrar ej: Tipo Organización 
	$departamento = new CDbCriteria;  // Preparamos los parámetros de búsqueda  
	$departamento->order = 'despro ASC';  // ordenamos alfabéticamente  
	echo $form->dropDownList($model,'codpro',  // id_tipo_org es el nombre del campo en el modelo 
	CHtml::listData(Clipro::model()->findAll(/*$departamento*/),  // TipoOrgG es el modelo en el que se buscaran los datos  
	'codpro','despro'),  // id_tipo_org es el dato que se quiere guardar y  // descripción lo que se quiere mostrar  
	array('ajax' => array('type' => 'POST',  'url' => CController::createUrl('Lugares/cargadirecciones'), //  la acción que va a cargar el segundo div 
	'update' => '#Lugares_n_direc' // el div que se va a actualizar
		),'prompt' => 'Seleccione una organizacion' // Valor por defecto 
		,'disabled'=>($model->isNewRecord)?'':'disabled')  ); 

		echo $form->error($model,'codpro'); ?>  
</div> 
	
	<div class="row">
		 <?php 
		 echo $form->labelEx($model,'n_direc'); 
	
		  if (!$model->isNewRecord) {
		     $criterial = new CDbCriteria;
		      $criterial->condition='c_hcod=:prove';
		      $criterial->params=array(':prove'=>$model->codpro);
		      $datos = CHtml::listData(Direcciones::model()->findAll( $criterial),'n_direc','c_direc');
		      }
		 echo $form->dropDownList($model,'n_direc', ($model->isNewRecord)?array():$datos, array('ajax' => array(
																		'type' => 'POST',  
																		'url' => CController::createUrl('Lugares/Verlugares'), //  la acción que va a cargar el segundo div 
																		'update' => '#primo' // el div que se va a actualizar
																		),
																	'prompt' => 'Seleccione una organizacion' // Valor por defecto 
																	,'disabled'=>($model->isNewRecord)?'':'disabled') 
									); 
		 
		 
		 
		 
		 ?>
	</div>
        <div  id="primo" style ="width:250px">
		</div>
	<div class="row">
		<?php echo $form->labelEx($model,'deslugar'); ?>
		<?php echo $form->textField($model,'deslugar',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'deslugar'); ?>
	</div>

	

	<div class="row">
		
		<?php //echo $form->hiddenField($model,'codpro',array('value'=>$codpro)); ?>
		
	</div>

	<div class="row">
	     
		<?php 
		//$documento='032';
		$criterial = new CDbCriteria;
		$criterial->condition='c_hcod=:docu';
		$criterial->params=array(':docu'=>'R00001');
		
		
		?>
	
		<?php echo $form->error($model,'n_direc'); ?>
	</div>





	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


