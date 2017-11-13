<?PHP MiFactoria::titulo('Nota de Ingreso','arrow_down'); ?>
<div class="division">
	<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'guia-form',
			'enableClientValidation'=>false,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>true,

		)); ?>

	   	


		<?php  echo $form->errorSummary($model); ?>

		<div class="row">

			<div class="row">
				<?php
				$botones=array(
					'go'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array($this::ESTADO_PREVIO,NUll),
					),
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array($this::ESTADO_CREADO,$this::ESTADO_ANULADO,$this::ESTADO_CONFIRMADO),
					),


					'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>83)),//apreuba guia
						'visiblex'=>array($this::ESTADO_CREADO),
					),
					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>84)),//anula guia
						'visiblex'=>array($this::ESTADO_CREADO),

					),
					'undo'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>85)),//reveiree liberacion
						'visiblex'=>array($this::ESTADO_CONFIRMADO),

					),
					

					'pack1'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>37)), //confirma entrega
						'visiblex'=>array($this::ESTADO_CONFIRMADO),

					),
					/*'pack'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>69)), //revertir  entrega
						'visiblex'=>array($this::ESTADO_ENTREGADO),

					),*/
					'print'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/imprimirsolo',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_CONFIRMADO),
					),
					'add'=>array(
						'type'=>'C',
						'ruta'=>array($this->id.'/creadetalle',array(
							'idcabeza'=>$model->id,"cest"=>'01',
							//"id"=>$model->n_direc,
							"asDialog"=>1,
							"gridId"=>'detalle-grid',
						)
						),
						'dialog'=>'cru-dialogdetalle',
						'frame'=>'cru-detalle',
						'visiblex'=>array($this::ESTADO_CREADO),

					),
					'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
						'visiblex'=>array($this::ESTADO_PREVIO,$this::ESTADO_CREADO,$this::ESTADO_CONFIRMADO,$this::ESTADO_ANULADO),
					),

				);





				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>$model->{$this->campoestado},

					)
				);?>

			</div>


		</div>






		<div  class="panelderecho">








			<?php  echo $form->hiddenField($model,'id'); ?>

		  <div class="row">
		  <?php echo $form->labelEx($model,'c_rsguia'); ?>
		  <?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'c_rsguia',$datos1, array('empty'=>'-- Receptor--','disabled'=>$this->eseditable($model->c_estgui))  )  ;
		  ?>
		  <?php echo $form->error($model,'c_rsguia'); ?>
		  </div>
      <div class="row">
	  
		
		<?php echo $form->labelEx($model,'cod_cen'); ?>
		<?php
		     $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
echo $form->DropDownList($model,'cod_cen',$datos, array('empty'=>'--Llene el centro --','disabled'=>$this->eseditable($model->c_estgui)));

		?>
		<?php echo $form->error($model,'cod_cen'); ?>
	</div>
     
     
     
     
     

						    
     <div class="row">
		<?php echo $form->labelEx($model,'n_dirsoc'); ?>
		<?php if ($this->eseditable($model->c_estgui)=='')
		
		{
			
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'n_dirsoc',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fhdfj',
													));
													
		} else{
						echo CHtml::textField('a',$model->dirsoc->c_direc,array('disabled'=>'disabled','size'=>40)) ;
				
		}
								
			   ?>
	
			
			<div style='float: left;'>
					<?php echo $form->error($model,'n_dirsoc'); ?>
			</div>

		
		<div class="row">
		            <?php echo $form->labelEx($model,'c_coclig'); ?>
					<?php
					
					if ($this->eseditable($model->c_estgui)=='')
		
						{
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'c_coclig',												
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfj',
													)
													
								);
							} else{
						echo CHtml::textField('Sa',$model->destinatario->despro,array('disabled'=>'disabled','size'=>40)) ;
				
								}	
			   ?>
			   
	</div>
	
			</div>
			<div style='float: left;'>
					<?php echo $form->error($model,'c_coclig'); ?>
			</div>
	<div class="row">
		<?php echo $form->labelEx($model,'n_direc'); ?>
		   <?php
		   if ($this->eseditable($model->c_estgui)=='')
		
						{
		   $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'n_direc',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'c89',
													)
													
								);
		   } else{
						echo CHtml::textField('erSa',$model->direccionesllegada->c_direc,array('disabled'=>'disabled','size'=>40)) ;
				
								}
								
			   ?>
	</div>
			
			
			<div style='float: left;'>
					<?php echo $form->error($model,'n_direc'); ?>
			</div>


			
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'c_motivo'); ?>
		<?php  $datos1 = CHtml::listData(CMotivo::model()->findAll(array('order'=>'desmotivo')),'codmotivo','desmotivo');
		  echo $form->DropDownList($model,'c_motivo',$datos1, array('empty'=>'--Seleccione un motivo--','disabled'=>$this->eseditable($model->c_estgui))  )  ;
		?>
		<?php echo $form->error($model,'c_motivo'); ?>
	</div>
	<div class="row">
		<?php  echo $form->labelEx($model,'c_desgui'); ?>
		<?php echo $form->textField($model,'c_desgui',array('size'=>40,'maxlength'=>40,'disabled'=>$this->eseditable($model->c_estgui))); ?>
		<?php echo $form->error($model,'c_desgui'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'c_texto'); ?>
		<?php echo $form->textArea($model,'c_texto',array('rows'=>3, 'cols'=>30,'disabled'=>$this->eseditable($model->c_estgui))); ?>
		<?php echo $form->error($model,'c_texto'); ?>
	</div>
	
	
  <div>

  </div>

 </div>
 
<div class="panelizquierdo" >


     <div class="row">
		<?php echo $form->labelEx($model,'c_numgui'); ?>

		<?php echo $form->textField($model,'c_serie',array('disabled'=>'disabled','class'=>'numerodocumento','size'=>3,'maxlength'=>3)); ?>

				<?php echo $form->textField($model,'c_numgui',array('class'=>'numerodocumento','size'=>8,'maxlength'=>8,'disabled'=>'disabled'));
				?>

	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'d_fecgui'); ?>
		<?php if ($this->eseditable($model->c_estgui)=='')
		
		{
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'d_fecgui',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
												'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

					 } else{
						echo $form->textField($model,'d_fecgui',array('disabled'=>'disabled','size'=>10)) ;
				
								}										
															
		?>		
		<?php echo $form->error($model,'d_fecgui'); ?>
	</div>
      
	<div class="row">
		<?php echo $form->labelEx($model,'c_estgui'); ?>
		<?php IF(!$model->isNewRecord) { 
		       
		     echo CHtml::textField('hola',
			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>$this->documento,':miestado'=>$model->c_estgui))->estado,
			  array('disabled'=>'disabled','size'=>20));
			  }
			  echo $form->hiddenField($model,'c_estgui');
		?>
		
	</div>

	





     
     <div class="row">
		<?php echo $form->labelEx($model,'c_codtra'); ?>






		<?php
		if ($this->eseditable($model->c_estgui)=='')
		
						{
		$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'c_codtra',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'c8349',
													)
													
								);
					  } else{
						echo CHtml::textField('erdddSa',$model->transportistas->despro,array('disabled'=>'disabled','size'=>40)) ;
				
								}			
			   ?>
	</div>
     
			<div style='float: left;'>
					<?php echo $form->error($model,'c_codtra'); ?>
			</div>
	<div class="row">
		<?php echo $form->labelEx($model,'d_fectra'); ?>
		<?php
				if ($this->eseditable($model->c_estgui)=='')
		
						{			  
							  
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'d_fectra',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															'disabled'=>$this->eseditable($model->c_estgui)
															),
															));
					} else{
						echo $form->textField($model,'d_fectra',array('disabled'=>'disabled','size'=>10)) ;
				
								}
								?>		
		<?php echo $form->error($model,'d_fectra'); ?>
	</div>


	<div class="row">
		<?php //echo $form->labelEx($model,'c_trans'); ?>
		<?php //echo $form->textField($model,'c_trans',array('size'=>20,'maxlength'=>20,'disabled'=>$this->eseditable($model->c_estgui))); ?>
		
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'c_licon'); ?>
		<?php
		if ($this->eseditable($model->c_estgui)=='')
		
						{
		

		/*$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'c_licon',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'cwerue3',
													)
													
								);*/
										$this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'c_licon',
											    'campoex'=>'brevete',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>0,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'miffuufu',
											'nombrecampoareemplazar'=>'c_trans',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));

										 echo $form->error($model,'c_trans');

							} else{
								echo $form->textField($model,'c_licon',array('disabled'=>'disabled','size'=>10)) ;
						echo $form->textField($model,'c_trans',array('disabled'=>'disabled','size'=>20)) ;
				
								}	
			   ?>
	</div>
			<div style='float: left; background-color :#CEF6F5;'>	
			
			</div>
			<div style='float: left;'>
					<?php echo $form->error($model,'c_licon'); ?>
			</div>
			
			<div class="row">
		<?php echo $form->labelEx($model,'c_placa'); ?>
		<?php echo $form->textField($model,'c_placa',array('size'=>15,'maxlength'=>15,'disabled'=>$this->eseditable($model->c_estgui))); ?>
		<?php echo $form->error($model,'c_placa'); ?>
	  </div>
	</div>
	
    <div style="float:left; width:100%; clear :right ; background : #eee "> 

	<?php

 if ( !$model->isNewRecord )  {
				  
				$this->renderpartial('vw_detalle_guia',array('modelcabecera'=>$model,'eseditable'=>$this->eseditable($model->c_estgui)));  
				  
				}



 ?>
 </div>



 
  





<?php $this->endWidget(); ?>

</div><!-- form -->

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
        'width'=>800,
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();

//--------------------- end new code --------------------------
?>