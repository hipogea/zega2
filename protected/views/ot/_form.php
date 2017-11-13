
<div class="division"> 
    <div class="wide form">
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
	           
	<div class="wide form">
            <div class="row">
                <?php 
              
                    $botones = array(
                        'go' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array('99'),
                        ),
                        'save' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array('10'),
                         ),
                            
                         'worker' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/cuadrilla', array(
                                'id' => $model->id,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array('10'),

                        ),
                      /*  'ok' => array(
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

                        'config' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 64)),
                            'visiblex' => array('10'),

                        ),
                        'print' => array(
                            'type' => 'B',
                            'ruta' => array('coordocs/hacereporte', array('id' => $model->id, 'idfiltrodocu' => $model->id, 'file' => 0)),
                            'visiblex' => array('10'),
                        ),

                        'money' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregaimpuesto', array(
                                'idguia' => $model->id,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array('10'),

                        ),
                            */
                        'out' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/salir', array('id' => $model->id)),
                            'visiblex' => array('10'),
                        )
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

            </div>

            
	

	<?php  echo $form->errorSummary($model);

	?>
<?php echo $form->hiddenField($model,'id'); ?>
			
		<div class="panelderecho">
                    
		<div class="row">
                    <?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'numero'); ?>

			<?php echo $form->textField($model,'numero',array('class'=>'numerodocumento','size'=>10,'maxlength'=>10,'Disabled'=>'Disabled')); ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php echo $form->labelEx($model,'textocorto'); ?>
                            <?php echo $form->textField($model,'textocorto',array('size'=>30,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'textocorto'); ?>
	         </div>
        <div class="row">
            <?php if(!$model->isNewRecord) { ?>
		<?php echo $form->labelEx($model,'codpro'); ?>

			<?php echo $form->textField($model,'codpro',array('size'=>6,'Disabled'=>'Disabled')); ?>
                        <?php echo CHTml::textField('despri',$model->clipro->despro,array('size'=>36,'Disabled'=>'Disabled')); ?>
			
            <?php }  ?>
	</div>
                    <div class="row">
            <?php if(!$model->isNewRecord) { ?>
		<?php echo $form->labelEx($model,'codpro1'); ?>

			<?php echo $form->textField($model,'codpro1',array('size'=>6,'Disabled'=>'Disabled')); ?>
                        <?php echo CHTml::textField('despri',$model->clipro1->despro,array('size'=>36,'Disabled'=>'Disabled')); ?>
			
            <?php }  ?>
	</div>
  

		<div class="row">
			<?php 
                         
                        echo $form->labelEx($model,'fechainiprog'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechainiprog',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
                                                         'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						//'buttonText'=>Yii::t('ui','...'),
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						'readonly'=>'readonly',
					),
				));
			} else{
				echo $form->textField($model,'fechainiprog',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php //echo $form->error($model,'fechainiprog'); ?>
		
			<?php //echo $form->labelEx($model,'fechafinprog'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechafinprog',
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
				));
			} else{
				echo $form->textField($model,'fechafinprog',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php echo $form->error($model,'fechafinprog'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechainicio'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechainicio',
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
				));
			} else{
				echo $form->textField($model,'fechainicio',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php //echo $form->error($model,'fechainicio'); ?>
		
			<?php // echo $form->labelEx($model,'fechafin'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
			{
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechafin',
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
				));
			} else{
				echo $form->textField($model,'fechafin',array('disabled'=>'disabled','size'=>10)) ;

			}
			?>
			<?php 
                        echo $form->error($model,'fechafin'); ?>
		</div>
       

		<div class="row">
			
			<?php

			if ($model->isNewRecord)

			{
				echo $form->labelEx($model,'codpro');
                            
                            $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codpro',
                                               // 'valor'=>$model->codpro,
						'ordencampo'=>1,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>3,
                                                //'nombreclase'=> get_class($model),                                                
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehdfj',                              
                                      
					)

				);
			} 
			?>
                  <?php echo $form->error($model,'codpro'); ?>
		</div>
                    
                    <div class="row">
			
			<?php

			if ($model->isNewRecord)

			{
			echo $form->labelEx($model,'codpro1');	
                            $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codpro1',
                                               // 'valor'=>$model->codpro1,
						'ordencampo'=>1,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>3,
                                               // 'nombreclase'=> get_class($model),                                                
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehT764GVdfj',
					)

				);
			} 
			?>
                   <?php echo $form->error($model,'codpro1'); ?>
		</div>
                 
                    <div class="row">

		<?php echo $form->labelEx($model,'idcontacto'); ?>
		<?php 
                if($model->isNewRecord){ 
		          $datos1=array();
                          echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl('Contactos/Contactosporprove'), array(
				'type' => 'POST',
				'url' => CController::createUrl('Contactos/Contactosporprove'), //  la acción que va a cargar el segundo div
				'update' => '#Ot_idcontacto', // el div que se va a actualizar
				'data'=>array('codigoprov'=>'js:Ot_codpro1.value'),
			)

		            );
                }else{
		$criterio=new CDbCriteria;
		$criterio->addcondition("c_hcod='".$model->codpro1."'");
		$datos1 = CHtml::listData(Contactos::model()->findAll($criterio),'id','c_nombre');
		
		    }
                        echo $form->DropDownList($model,'idcontacto',$datos1, array('empty'=>'--Seleccione Contacto--' ) ) ;
                

		?>
		<?php echo $form->error($model,'idcontacto'); ?>
		<?php 
                
		// ?>
                        <div class="row">            
                        <?php echo $form->labelEx($model,'serie'); ?>
			<?php echo $form->textField($model,'serie',array('size'=>16)); ?>
                        <?php echo $form->error($model,'serie'); ?>
                      </div>

	              <div class="row">            
                        <?php echo $form->labelEx($model,'identificador'); ?>
			<?php echo $form->textField($model,'identificador',array('size'=>16)); ?>
                        <?php echo $form->error($model,'identificador'); ?>
                      </div>

	           <div class="row">            
                        <?php echo $form->labelEx($model,'codsap'); ?>
			<?php echo $form->textField($model,'codsap',array('size'=>9)); ?>
                        <?php echo $form->error($model,'codsap'); ?>
                      </div>

	</div>
                    
                    
                    
                     
                </div>	
			<div class="panelizquierdo">


	

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		 <?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'textolargo',
                                )
                            );?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>

      <div class="row">
                         <?php
                         
                         if(!$model->isNewRecord){
                         echo $form->labelEx($model,'codobjeto'); ?>
                            <?php
                                
                                            $criterio=new CDbCriteria;
                                            $criterio->addcondition("codpro='".$model->clipro->codpro."'");
                                            $datos1 = CHtml::listData(ObjetosCliente::model()->findAll($criterio),'codobjeto','nombreobjeto');
		
                                
                                        
            


				
       
		echo $form->DropDownList($model,'codobjeto',$datos1, array('empty'=>'--Seleccione Emplazamiento--','disabled'=>($model->escampohabilitado('codobjeto'))?'':'disabled' ) ); 
                echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl($this->id.'/ajaxobjetosporclipro'), array(
				'type' => 'POST',
				'url' => CController::createUrl($this->id.'/ajaxobjetosporclipro'), //  la acción que va a cargar el segundo div
				'update' => '#Ot_codobjeto', // el div que se va a actualizar
				'data'=>array('identidad'=>'js:Ot_codpro.value'),
			) );

		?>
           
              
                <?php echo $form->error($model,'codobjeto'); }?>  
          
                    </div>   
            
	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php                
                            $datos1R = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		 			 echo $form->DropDownList($model,'codcen',$datos1R, array('empty'=>'--Seleccione un centro--',));  
		?>
                    <?php echo $form->error($model,'codcen'); ?>
	</div>

	
	<div class="row">
			<?php echo $form->labelEx($model,'codresponsable'); ?>
			<?php

			if ($this->eseditable($model->codestado)=='')

			{
				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codresponsable',
                                               // 'valor'=>$model->codresponsable,
                                                'nombreclase'=>get_class($model),
						'ordencampo'=>2,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>5,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehe367dfddj',
					) 

				);
			} else{
				echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

			}
			?>

		</div>
	

                <div class="row">
                    <?php echo $form->labelEx($model,'codcompo'); ?>
		<?php 	
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"codcompo",
                        'source'=>Yii::app()->createUrl('request/suggestcompo'),
                        'options'=>array(
				'showAnim'=>'fold',),
                            
                         'htmlOptions'=>array(
                                    'ajax'=>array( 
                                                'type'=>'POST', 
                                                'data'=>array('codigocompo'=>'js:'.get_class($model).'_codproyecto.value'),
                                                'url'=>Yii::app()->createUrl($this->id.'/ajaxot'),
						'success'=>'js:function(data){$("#'.get_class($model).'_desobjeto").val(data);}',
                         
                                                ) ,
                                            'size'=>'12',
                                              'disabled'=>($model->escampohabilitado('codcompo'))?'':'disabled',
                                                    ),   
                             		));?>
                    <?php echo $form->textField($model,'desobjeto',array('disabled'=>'disabled','value'=> Masterequipo::fndescripcioncompleta($model->codcompo))); ?>
                   <?php echo $form->error($model,'codcompo'); ?>
		</div>               
                            
                            
	<div class="row">
    <?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo CHtml::textField('modeldgdgd',$model->estado->estado,array('disabled'=>'disabled')); ?>
    <?php }   ?>	
	</div>

	
			</div>






<div class="row">
<?php  
 if(!$model->isNewRecord){
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'Labores'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('tab_labores', array('form'=>$form,'model'=>$model),TRUE)
			), 
			/*'Recursos'=>array('id'=>'tab_ui',
				'content'=>$this->renderPartial('tab_recursos', array('form'=>$form,'model'=>$model,'modelolabor'=>$modelolabor),TRUE)
			),
                    
                    'Rec externos'=>array('id'=>'tab_uifre4',
				'content'=>$this->renderPartial('tab_consignaciones', array('form'=>$form,'model'=>$model,'modeloconsi'=>$modeloconsi),TRUE)
			),
                    /*
                    'Componentes rotativos'=>array('id'=>'tab_uifre5',
				'content'=>$this->renderPartial('tab_neot', array('model'=>$model,'modeloconsi'=>$modeloconsi),TRUE)
			),
                     'Imputaciones Caja Menor'=>array('id'=>'tab_imgghty454',
				'content'=>$this->renderPartial('tab_cajachica', array('modelopadre'=>$model),TRUE)
			),
                    
                    'Registro visual'=>array('id'=>'tab_img',
				'content'=>$this->renderPartial('tab_images', array('modelopadre'=>$model),TRUE)
			),
                    
                    
                     'Registro visual'=>array('id'=>'tab_img',
				'content'=>$this->renderPartial('tab_images', array('modelopadre'=>$model),TRUE)
			),
                    
                    
                    
                    
                    
			'Auditoria'=>array('id'=>'tab____..__',
				'content'=>$this->renderPartial('//site/tab_auditoria', array('form'=>$form,'model'=>$model),TRUE)
			),
                    
                    
                    'Costos'=>array('id'=>'tab__n__..__',
				'content'=>$this->renderPartial('tab_resumencostos', array('proveedorceco'=>$model->resumenCostosPorCeCo(false),'proveedordef'=>$model->resumenCostosPorTipo(true),'model'=>$model),TRUE)
			),
*/

		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabi',)
);

 }
?>
</div>


<?php $this->endWidget(); ?>
</div>
</div>

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


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php
$this->endWidget();?>