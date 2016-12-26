<div class="division">
<div class="wide form">
<?php 

$form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
  
   
	<div class="row">
		<?php
		$botones=array(
			'search'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
			'clear'=>array(
				'type'=>'E',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
		);
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		); ?>

	</div>
    
     <div class="panelizquierdo">
         
        
      
         
         
         <div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'id',												
												//'ordencampo'=>1,
												'controlador'=>'Docingresados',
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'nombremodelo'=>'Docingresados',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>
	
         
         <div class="row">
		<?php echo $form->labelEx($model,'tipodoc'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'tipodoc',												
												//'ordencampo'=>1,
												'controlador'=>'Docingresados',
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'nombremodelo'=>'Documentos',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>
         
	 
	<div class="row">
		<?php echo $form->labelEx($model,'codepv'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codepv',												
												//'ordencampo'=>1,
												'controlador'=>'VwDoci',
												'relaciones'=>$model->relations(),
												'tamano'=>3,
												'model'=>$model,
												'nombremodelo'=>'Embarcaciones',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>
	
	
         
         
         
      
        	
		
	
	  <div class="row">
		<?php echo $form->label($model,'docref'); ?>
		
		
		<?php echo $form->textField($model,'docref',array('size'=>30,'maxlength'=>14)); ?>
	
	   
	


	  </div>
	  
    </div>
      <div class="panelderecho">
	  
	

	<div class="row">
		<?php echo $form->label($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>8,'maxlength'=>8)); ?>
	</div>
  
  	<div class="row">
		<?php echo $form->label($model,'diasfaltan'); ?>
		<?php echo $form->textField($model,'diasfaltan',array('size'=>6,'maxlength'=>6)); ?>
	</div>
  
         
	
	

	
	
	
      </div>
	
	
 
<?php $this->endWidget(); ?>



        </div>
</div>













