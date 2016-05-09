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
	<?php echo $form->labelEx($model,'codpro');?>
	<?php   echo $form->textField($modeloclipro,'codpro',array('size'=>10,'disabled'=>'disabled')); ?>
    <?php   echo $form->textField($modeloclipro,'despro',array('size'=>40,'disabled'=>'disabled')); ?>
	<?php echo $form->error($model,'codpro'); ?>

	<?php   echo $form->hiddenField($model,'codpro',array('value'=>$modeloclipro->codpro)); ?>

</div> 
	
	<div class="row">
		 <?php 
		 echo $form->labelEx($model,'n_direc'); 
	

		     $criterial = new CDbCriteria;
		      $criterial->condition='c_hcod=:prove';
		      $criterial->params=array(':prove'=>$modeloclipro->codpro);
		      $datos = CHtml::listData(Direcciones::model()->findAll( $criterial),'n_direc','c_direc');

		 echo $form->dropDownList($model,'n_direc', $datos, array('ajax' => array(
																		'type' => 'POST',  
																		'url' => CController::createUrl('Lugares/Verlugares'), //  la acción que va a cargar el segundo div 
																		'update' => '#primo' // el div que se va a actualizar
																		),
																	'prompt' => 'Seleccione una direccion' // Valor por defecto
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


