<div class="form">
    <?php 
       $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compra-form',
        'enableClientValidation'=>true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true
     ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="division">            
	<div class="wide form">
            <div class="row">
                <?php 
              var_dump(Yii::app()->controller->module->basePath);
                    $botones = array(
                        'go' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array('10'),
                        ),
                        'save' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array('10'),
                         ),

                        'ok' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 65)),//aprobar
                            'visiblex' => array('10'),
                           // 'visiblex' => array( true ),
                        ),


                        'undo' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 67)), //revertir aprobacion
                            'visiblex' => array('10'),

                        ),

                        'tacho' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 66)),
                            'visiblex' => array('10'),

                        ),
                        'pdf' => array(
                            'type' => 'D', //AJAX LINK
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/crearpdf', array('id' => $model->id)),
                            'opajax'=>array(
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/crearpdf', array('id' => $model->id)),
                                'success'=>"function(data) {
					$.growlUI('Growl Notification', data); 
                                    }",
                            ),                           
                            'visiblex' => array('10'),

                        ),
                        'mail' => array(
                            'type' => 'D', //AJAX LINK
                            'ruta' => array($this->id . '/enviarpdf', array('id' => $model->id)),
                            'opajax'=>array(
                                'url'=> array($this->id . '/enviarpdf', array('id' => $model->id)),
                                'success'=>"function(data) {
										$('#myDivision').html(data).fadeIn().animate({opacity: 1.0}, 900).fadeOut('slow');
                                        }",
                            ),

                            'visiblex' => array('10'),

                        ),


                        'camera' => array(
                            'type' => 'D', //AJAX LINK
                             'ruta' => array($this->id.'/reporte', array('id' => $model->id)),
                            'opajax'=>array(
                                'url'=> array($this->id.'/reporte', array('id' => $model->id)),
                                'success'=>"function(data) {
										$('#myDivision').html(data).fadeIn().animate({opacity: 1.0}, 900).fadeOut('slow');
                                        }",
                            ),
                         
                            'visiblex' => array('10'),

                        ),

                       
                        );
                    
                    
                    $this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>'10' ,

					)
				);
                   
              ?>
            

            </div>

            
	

	<?php  echo $form->errorSummary($model);

	?>
<?php echo $form->hiddenField($model,'id'); ?>
	
        

    
     <fieldset>
                <legend>Comprobante</legend>
                
                 <div class="row"> 
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'socio',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
		?>
                     
                 <div class="row"> 
		<?php echo $form->labelEx($model,'hidperiodo'); ?>
		<?php  $datos1d =yii::app()->periodo->periodosActivos() ;
		  echo $form->DropDownList($model,'hidperiodo',$datos1d, array('empty'=>'--Seleccione un Periodo--')  )  ;
		?>    
                     
		<?php echo $form->error($model,'hidperiodo'); ?>
	         </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'numerocomprobante'); ?>
                     <?php $opajax=array(
                              'type'=>'POST',
                         'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/rellena"),
                           'data'=>array('numero'=>'js:Registrocompras_numerocomprobante.value'),
                         'success'=>'js:function(data){$("#Registrocompras_numerocomprobante").val(data);}',
                          //'update'=>'#Registrocompras_numerocomprobante',
                         ); ?>
                    
			<?php echo $form->textField($model,'numerocomprobante',array('ajax'=>$opajax,'class'=>'numerodocumento','size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'numerocomprobante'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->DropDownList($model,'tipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			<?php echo $form->error($model,'tipo'); ?>
                </div>
     
                
     <div class="row">
                        <?php echo $form->labelEx($model,'femision'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'femision',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'femision'); ?>
                </div>
     
     <div class="row">
                        <?php echo $form->labelEx($model,'fvencimiento'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fvencimiento',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'fvencimiento'); ?>
                </div>
     
                <div class="row">
            <?php if($model->isAttributeSafe('codaduana')) { ?>
		<?php echo $form->labelEx($model,'codaduana'); ?>
			<?php echo $form->DropDownList($model,'codaduana', Sunatmaster::datoslista('011'), array('empty'=>'--Seleccione centro aduana--')); ?>
                 <?php echo $form->error($model,'codaduana'); ?>  
            <?php }  ?>
                </div>
         
     </fieldset>
     
        <fieldset>
                <legend>Datos del Proveedor</legend>	
     
                 <div class="row">
           
		<?php echo $form->labelEx($model,'tipodocid'); ?>
			<?php echo $form->DropDownList($model,'tipodocid', Sunatmaster::datoslista('002'), array('empty'=>'--Seleccione tipo Doc Identidad--')); ?>
                 <?php echo $form->error($model,'tipodocid'); ?>  
           
                </div>
                
                 <div class="row">
                        <?php echo $form->labelEx($model,'numerodocid'); ?>
                      <?php $opajax1=array(
                          'type'=>'POST',
                           'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/ajaxmuestraproveedor"),
                           'data'=>array(
                               'ruc'=>'js:Registrocompras_numerodocid.value',
                                'tipo'=>'js:Registrocompras_tipodocid.value',
                                           ),
                               'success'=>'js:function(data){ $("#Registrocompras_razpronombre").val(data); }',                           
                               );
                       ?>
			<?php echo $form->textField($model,'numerodocid',array('ajax'=>$opajax1,'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'numerodocid'); ?>
                   </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'razpronombre'); ?>
			<?php echo $form->textField($model,'razpronombre',array('size'=>100,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'razpronombre'); ?>
                </div>
                
        </fieldset>        
     
                
         <fieldset>
                <legend>Dest Op Gravadas </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'expobaseimpgrav'); ?>
			<?php echo $form->textField($model,'expobaseimpgrav',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'expobaseimpgrav'); ?>
                </div>
           </fieldset>  
           <fieldset>  
            <legend> Dest Op Gravadas y No Gravadas </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'expbaseimpnograv'); ?>
			<?php echo $form->textField($model,'expbaseimpnograv',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'expbaseimpnograv'); ?>
                </div>
            </fieldset>     
           
                
            <fieldset>
                <legend>Dest Op No grabadas</legend>  
               
                <div class="row">
                        <?php echo $form->labelEx($model,'baseimpnograv'); ?>
			<?php echo $form->textField($model,'baseimpnograv',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'baseimpnograv'); ?>
                </div>
                
           </fieldset>      
                 <div class="row">
                        <?php echo $form->labelEx($model,'otrostributos'); ?>
			<?php echo $form->textField($model,'otrostributos',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'otrostributos'); ?>
                </div>
               <div class="row">
                        <?php echo $form->labelEx($model,'numerodocnodomiciliado'); ?>
			<?php echo $form->textField($model,'numerodocnodomiciliado',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'numerodocnodomiciliado'); ?>
                </div>
              <fieldset>
                <legend>Detraccion </legend>  
                
                <div class="row">
                        <?php echo $form->labelEx($model,'numconstdetraccion'); ?>
			<?php echo $form->textField($model,'numconstdetraccion',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'numconstdetraccion'); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'fechaemidetra'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechaemidetra',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'fechaemidetra'); ?>
                </div>
     
                
           </fieldset>      
                
               
            
            <div class="row">
                        <?php echo $form->labelEx($model,'tipocambio'); ?>
			<?php echo $form->textField($model,'tipocambio',array('value'=>1/yii::app()->tipocambio->getventa($this::MONEDA_REPORTE),'size'=>4,'disabled'=>'disabled')); ?>
			
             
                            <?php echo CHtml::textField(uniqid(),$this::MONEDA_REPORTE,array('size'=>4, 'disabled'=>'disabled')); ?>
                </div>
                
	<fieldset>
                <legend>Ajuste de precios </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'reftipo'); ?>
			<?php echo $form->DropDownList($model,'reftipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			<?php echo $form->error($model,'reftipo'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'refserie'); ?>
			<?php echo $form->textField($model,'refserie',array('size'=>4,'maxlength'=>4)); ?>
			<?php echo $form->error($model,'refserie'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'refnumero'); ?>
			<?php echo $form->textField($model,'refnumero',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'refnumero'); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'reffechaorigen'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'reffechaorigen',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'reffechaorigen'); ?>
                </div>
                 <div class="row">
                        <?php 
                        if(!$model->isNewRecord){
                        echo $form->labelEx($model,'fechacre'); ?>
			<?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'fechacre'); 
                        }
                        ?>
                </div>
                 
                
           </fieldset>     	
		
                
		
		
		
		  
        


</div><!-- form -->

	</div>

<?php $this->endWidget(); ?>

</div>

<?php
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
$this->endWidget();?>

