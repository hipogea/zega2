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
	<?php echo $form->label($model,'final'); ?>
	<?php  
        $datos = array('1' => 'Archivados ','0'=> 'En proceso');
	//$datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');

	echo $form->DropDownList($model,'final',$datos, array('empty'=>'--Indique el status--')  )  ;	?>
	</div>
         
         <div class="row">
	<?php echo $form->label($model,'espeabieto'); ?>
	<?php  
        $datos = array('1' => 'Pedido Abierto ','0'=> 'Pedido normal');
	//$datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');

	echo $form->DropDownList($model,'espeabierto',$datos, array('empty'=>'--Indique el tipo de pedido--')  )  ;	?>
	</div>
         
        
         
         
         <div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'id',												
												//'ordencampo'=>1,
												'controlador'=>'VwDocuIngresados',
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
		<?php echo $form->labelEx($model,'codprov'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codprov',												
												//'ordencampo'=>1,
												'controlador'=>'VwDocuIngresados',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'nombremodelo'=>'Clipro',
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
												'controlador'=>'VwDocuIngresados',
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
		<?php echo $form->labelEx($model,'codtenencia'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codtenencia',												
												//'ordencampo'=>1,
												'controlador'=>'VwDocuIngresados',
												'relaciones'=>$model->relations(),
												'tamano'=>3,
												'model'=>$model,
												'nombremodelo'=>'Tenencias',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>	
         
         
         <div class="row">
		<?php echo $form->labelEx($model,'codigotra'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codigotra',												
												//'ordencampo'=>1,
												'controlador'=>'VwDocuIngresados',
												'relaciones'=>$model->relations(),
												'tamano'=>3,
												'model'=>$model,
												'nombremodelo'=>'VwTrabajadores',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>	
		
          <div class="row">
		<?php echo $form->labelEx($model,'idproceso'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'idproceso',												
												//'ordencampo'=>1,
												'controlador'=>'VwDocuIngresados',
												'relaciones'=>$model->relations(),
												'tamano'=>3,
												'model'=>$model,
												'nombremodelo'=>'Tenenciasproc',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>	
         
         
         
         
	<div class="row">
		<?php echo $form->label($model,'descorta'); ?>
		
		<?php echo $form->textField($model,'descorta',array('size'=>20,'maxlength'=>40)); ?>
		</div>

	
		
	

	
   
		<div class="row">
			
		<?php echo $form->label($model,'numero'); ?>
		
	
		<?php echo $form->textField($model,'numero',array('size'=>20,'maxlength'=>20)); ?>
	   
            </div>
	  <div class="row">
		<?php echo $form->label($model,'numdocref'); ?>
		
		
		<?php echo $form->textField($model,'numdocref',array('size'=>30,'maxlength'=>14)); ?>
	
	   
	


	  </div>
	  
    </div>
      <div class="panelderecho">
	  
	

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
 'attribute'=>'fechain1',
 'value'=>$model->fechain1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fechain1,
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
		<?php echo $form->labelEx($model,'fechanominal'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'fechanominal',
 'value'=>$model->fechanominal,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fechanominal,
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
 'attribute'=>'fechanominal1',
 'value'=>$model->fechanominal1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fechanominal1,
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
			<?php echo $form->label($model,'codocuref'); ?>
			<?php  $datos = CHtml::listData(Documentos::model()->findAll(array("condition"=>"clase='D' ",'order'=>'coddocu')),'coddocu','referencia');
					echo $form->DropDownList($model,'codocuref',$datos, array('empty'=>'--Seleccione un documento --')  );
					//ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
			?>
													
	</div>
          <div class="row">
		<?php echo $form->label($model,'numdocref'); ?>
		
		
		<?php echo $form->textField($model,'numdocref',array('size'=>30,'maxlength'=>14)); ?>
	
	   
	


	  </div>
	  
	 <div class="row">
		<?php echo $form->labelEx($model,'tipoactivo'); ?>
		<?php  
                //$criterio=
                $datosp = CHtml::listData(Tipoactivos::model()->
                        findAll("activo='1'"),
                        'codtipo','destipo');
		echo $form->DropDownList($model,'tipoactivo',$datosp, array('empty'=>'--Llene el tipo activo--',
                  ));
					?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'subproceso'); ?>
		<?php  
                //$criterio=
                $datospx = array('1'=>'Con subproceso');
		echo $form->DropDownList($model,'subproceso',$datospx, array('empty'=>'--Llene el subproceso--',
                  ));
					?>
		<?php echo $form->error($model,'subproceso'); ?>
	</div>
	
      </div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'hidproc'); ?>
		<?php  $datos = CHtml::listData(Tenenciasproc::model()->findAll(array("order"=>"codocu")),'id','eventos.descripcioncompleta');
					echo $form->DropDownList($model,'hidproc',$datos, array('empty'=>'--Seleccione un proceso --')  )
					?>
	</div>
 
<?php $this->endWidget(); ?>



        </div>
</div>













