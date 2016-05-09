
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugares-form',
	'enableAjaxValidation'=>false,
)); ?>


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


<?php $this->endWidget(); ?>




