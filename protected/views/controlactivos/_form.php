<?php
/* @var $this ControlActivosController */
/* @var $model ControlActivos */
/* @var $form CActiveForm */
?>
<div class="division">	
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'control-activos-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	
	<?php  $botones=array(
					
					'go'=>array(
					     'type'=>'A',						
						   'visiblex'=>array('10','99' ),
						 'url'=>array(),
					      ) ,
					
						
            
            'ok' => array(
                            'type' => 'D', //AJAX LINK
                             'visiblex'=>array('10' ),
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/AjaxAprobar', array('id' => $model->idformato)),
                            'opajax'=>array(
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/AjaxAprobar', array('id' => $model->idformato)),
                                'success' => 'js:function(data) {
                                                        $.growlUI("Aviso", data, 0, 0, 0); return false;
                            
                                    }',
                            ),),
				
            
             'tacho' => array(
                            'type' => 'D', //AJAX LINK
                             'visiblex'=>array('20'),
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/AjaxAnular', array('id' => $model->idformato)),
                            'opajax'=>array(
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/AjaxAnular', array('id' => $model->idformato)),
                                'success' => 'js:function(data) {
                                                        $.growlUI("Aviso", data, 0, 0, 0); return false;
                            
                                    }',
                            ),)
            
            
						  );
	
	?>
	
		<div class="row">
     <?php

	$this->widget('ext.toolbar.Barra',
				array(
					'status'=>trim($model->codestado),
					'botones'=>$botones,
					'size'=>24,
					'extension'=>'png',

				)
	);?>
		
  </div>
	
	
	<div class="panelizquierdo">
	
		<div class="row">
		<?php echo $form->labelEx($model,'numformato'); ?>
		<?php echo $form->textField($model,'numformato',array('style'=>'font-size:12px; color:red; font-weight:bold; ','size'=>17,'maxlength'=>17,'disabled'=>'disabled')); ?>		<?php echo $form->error($model,'numformato'); ?>
	</div>
	<div class="row">
		<?php IF(!$model->isNewRecord) { 
		      
			  echo $form->labelEx($model,'codestado'); 
			?>
		    
			<?php  echo CHtml::textField('hola',
			  '( '.$model->codestado.' ) '.Estado::model()->find('codestado=:miestado and codocu=:midocumento',
			  array(':midocumento'=>'017',':miestado'=>$model->codestado))->estado,
			  array('id'=>'pepin','disabled'=>'disabled','size'=>20));
			 ?>
			  <?php echo CHtml::ajaxLink('Finalizar',
									$this->createUrl('/controlactivos/cambiaestado',array('id'=>$model->idformato)	),
									array(
											'replace'=>'#pepin',
			  
										 )
			  
									) ;
			  }
		?>
		
	</div>
			
			
		
	
	<div class="row">
	<div style="display:table-cell">
	<?php echo $form->labelEx($model,'codtipoop'); ?>
	<?php if(is_null($model->codtipoop) or empty($model->codtipoop)) { ?>
	
	  <?php  $datos =CHtml::listData(Tipoop::model()->findAll(array('order'=>'desop')),'codop','desop');
		 
		  
		
	   echo $form->dropDownList($model,'codtipoop',$datos,array(
													'prompt'=>'Seleccione una operacion',
													'onChange'=>'window.location.href="'.Yii::app()->getRequest()->getUrl().'?micodigomov="+this.value;Loading.show();Loading.hide(); ',
													
																)
							);
	      ?>

	<?php echo $form->error($model,'codtipoop'); ?>

		<?php  } else { ?>
			<?php echo Chtml::textField(Tipoop::model()->findByPk($model->codtipoop)->desop,Tipoop::model()->findByPk($model->codtipoop)->desop,array('disabled'=>'disabled','size'=>20)); ?>
			<?php $form->hiddenField($model,'codtipoop'); ?>
		<?php  }  ?>

	</div>
	  <div style="display:table-cell">
	     <?php echo $form->labelEx($model,'operando'); ?>
				
		  <?php echo $form->checkBox($model,'operando' )  ;	?>
		<?php echo $form->error($model,'operando'); ?>
	  </div>
	
	
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'codpropietario'); ?>
		<?php  $datos =CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'codpropietario',$datos, array('empty'=>'--Indique el propietario--')  )  ;	?>
		<?php echo $form->error($model,'codpropietario'); ?>
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
	   <div style="display:table-cell;">
		<?php echo $form->labelEx($model,'ccanterior'); ?>
		<?php echo $form->textField($model,'ccanterior',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'ccanterior'); ?>
		</div>
	
	   <div style="display:table-cell;">
		<?php echo $form->labelEx($model,'ccactual'); ?>
		<?php echo $form->textField($model,'ccactual',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'ccactual'); ?>
		</div>
	</div>
	
	<?php
		/*$this->renderpartial('viewsimple',array(
							'inventario'=>$inventario,
							//'foto'=>array($inventario->codigosap.".JPG"),
							'ruta'=>Yii::app()->params['rutafotosinventario_'],							
								));*/
								
	
	?>

	</div>

	
	
	
	
	 
	<div class="panelderecho">
   
	 <div class="row">
		<?php echo $form->labelEx($model,'codepanterior'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codepanterior',$datos1, array('empty'=>'--Seleccione --', 'options'=>array($inventario->codep=>array('selected'=>true))))  ;
		?>
		<?php echo $form->error($model,'codepanterior'); ?>
	</div>
	
    
	<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codep',$datos1, array('empty'=>'--Seleccione --')  )  ;
		?>
		<?php echo $form->error($model,'codep'); ?>
	</div>
	
	
	 
	 
	 
   
	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'= >3)); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
		  echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione--')  )  ;
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solicitante'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'= >3)); ?>
		<?php  $datos1 = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'nombrecompleto')),'codigotra','nombrecompleto');
		  echo $form->DropDownList($model,'solicitante',$datos1, array('empty'=>'--Seleccione--')  )  ;
		?>
	
			
		<?php echo $form->error($model,'solicitante'); ?>
	  </div>

	<div class="row">
		<?php echo $form->labelEx($model,'documento'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(" clase='D'",array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'documento',$datos, array('empty'=>'--Seleccione un documento--')  )  ;
		?>
		<?php echo $form->error($model,'documento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeroref'); ?>
		<?php echo $form->textField($model,'numeroref',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'numeroref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>9, 'cols'=>40)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>
	
	
   
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar modificaciones'); ?>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>

<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>