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
		<?php echo $form->label($model,'despro'); ?>
		<?php echo $form->textField($model,'despro',array('size'=>40,'maxlength'=>40)); ?>
	</div>
	
	
	
	
		
		
	<div class="row">
		<?php echo $form->label($model,'descorta'); ?>
		
		<?php echo $form->textField($model,'descorta',array('size'=>20,'maxlength'=>40)); ?>
		</div>

	
		<div class="row">
		<?php echo $form->label($model,'codep'); ?>
		
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codepv',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
					?>
		</div>
	
	

	
   
		<div class="row">
			
		<?php echo $form->label($model,'numero'); ?>
		
	
		<?php echo $form->textField($model,'numero',array('size'=>20,'maxlength'=>20)); ?>
	   
            </div>
	  <div class="row">
		<?php echo $form->label($model,'docref'); ?>
		
		
		<?php echo $form->textField($model,'docref',array('size'=>30,'maxlength'=>14)); ?>
	
	   
	


	  </div>
	  <div class="row">
		<?php echo $form->label($model,'responsable'); ?>
	
          
        
	
		<?php echo $form->textField($model,'responsable',array('size'=>15,'maxlength'=>15)); ?>
	</div>
    </div>
      <div class="panelderecho">
	  <div class="row">
			<?php echo $form->label($model,'rucpro'); ?>
			
				<?php echo $form->textField($model,'rucpro',array('size'=>11,'maxlength'=>11)); ?>
	
            </div>
	

	<div class="row">
		<?php echo $form->label($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>8,'maxlength'=>8)); ?>
	</div>
  
  	<div class="row">
		<?php echo $form->labelEx($model,'fechain'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'fechain',
 'value'=>$model->fechain,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fechain,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
 //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 //'buttonImageOnly'=>true,
 //'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>
	
	
	
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'d_fectra1',
 'value'=>$model->d_fectra1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->d_fectra1,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold', 
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>


		
	</div>
  
	
	<div class="row">
	<?php echo $form->label($model,'moneda'); ?>
	<?php  $datos = array('D' => 'Dolares ','S'=> 'Soles');
		  
	echo $form->DropDownList($model,'moneda',$datos, array('empty'=>'--Indique la moneda--')  )  ;	?>
	</div>

	
	<div class="row">
			<?php //echo $form->label($model,'lugares_lugar'); ?>
			<?php //echo $form->textField($model,'lugares_lugar',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>
	
	<div class="row">
			<?php echo $form->label($model,'tipodoc'); ?>
			<?php  $datos = CHtml::listData(Documentos::model()->findAll(array("condition"=>"clase='D' ",'order'=>'desDOCU')),'coddocu','desdocu');
					echo $form->DropDownList($model,'tipodoc',$datos, array('empty'=>'--Seleccione un documento --')  );
					//ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
			?>
													
	</div>
	
	
      </div>
	
	
 
<?php $this->endWidget(); ?>



        </div>
</div>













