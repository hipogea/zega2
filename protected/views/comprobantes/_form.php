<div class="form">
    <?php 
       $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ot-form',
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
              //var_dump(Yii::app()->controller->module->basePath);
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
                     
		<?php echo $form->error($model,'socio'); ?>
	         </div>
                
                 <div class="row"> 
		<?php echo $form->labelEx($model,'esservicio'); ?>
		<?php  $datos1 = array('M'=>'Materiales','S'=>'Servicios');
		  echo $form->DropDownList($model,'esservicio',$datos1, array('empty'=>'--Seleccione el tipo de compra--')  )  ;
		?>
                     
		<?php echo $form->error($model,'esservicio'); ?>
	         </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'numero'); ?>
                    <?php $opajax=array(
                              'type'=>'POST',
                         'url'=>yii::app()->createUrl($this->id."/rellena"),
                           'data'=>array('numero'=>'js:Comprobantes_serie.value'),
                         'success'=>'js:function(data){$("#Comprobantes_serie").val(data);}',
                          //'update'=>'#Registrocompras_numerocomprobante',
                         ); ?>
                    <?php echo $form->textField($model,'serie',array('ajax'=>$opajax,'class'=>'numerodocumento','size'=>10,'maxlength'=>10)); ?>
			 <?php $opajax=array(
                              'type'=>'POST',
                         'url'=>yii::app()->createUrl($this->id."/rellena"),
                           'data'=>array('numero'=>'js:Comprobantes_numero.value'),
                         'success'=>'js:function(data){$("#Comprobantes_numero").val(data);}',
                          //'update'=>'#Registrocompras_numerocomprobante',
                         ); ?>
			<?php echo $form->textField($model,'numero',array('ajax'=>$opajax,'class'=>'numerodocumento','size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'serie'); ?>
                            <?php echo $form->error($model,'numero'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->DropDownList($model,'tipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			<?php echo $form->error($model,'tipo'); ?>
                </div>
     <div class="row">
                        <?php echo $form->labelEx($model,'monto'); ?>
			<?php echo $form->textField($model,'monto',array('class'=>'numerodocumento','size'=>13,'maxlength'=>13)); ?>
			<?php echo $form->error($model,'monto'); ?>
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
						'dateFormat'=>'dd/mm/yy',
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
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'fvencimiento'); ?>
                </div>
     
         <div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>

		<?php echo $form->DropdownList($model,'codmon',$datos,array('empty'=>'--Seleccione moneda--')); ?>
		<?php echo $form->error($model,'codmon'); ?>
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
                      <?php $opajax=array(
                          'type'=>'POST',
                           'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/ajaxmuestraproveedor"),
                           'data'=>array(
                               'ruc'=>'js:Registrocompras_numerodocid.value',
                                'tipo'=>'js:Registrocompras_tipodocid.value',
                               'campo'=>'tipodoci',
                               'modelo'=>get_class($model),
                               'update'=>'#'.get_class($model).'_razon'
                               ),
                               //'success'=>'js:function(data){ $("#Registrocompras_razpronombre").value=data; alert(data); }',                           
                               
                      ); ?>
			<?php echo $form->textField($model,'numdocid',array('ajax'=>$opajax,'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'numdocid'); ?>
                   </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'razon'); ?>
			<?php echo $form->textField($model,'razon',array('size'=>100,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'razon'); ?>
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

