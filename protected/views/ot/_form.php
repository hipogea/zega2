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
            <div id="myDivision" style="display:block;float:right;" class="flash-regular">
.
            </div>

            </div>

            
	

	<?php  echo $form->errorSummary($model);

	?>
<?php echo $form->hiddenField($model,'id'); ?>
			
		<div class="panelderecho">
		<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>

			<?php echo $form->textField($model,'numero',array('class'=>'numerodocumento','size'=>10,'maxlength'=>10,'Disabled'=>'Disabled')); ?>
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
            <?php if(!$model->isNewRecord) { ?>
		<?php echo $form->labelEx($model,'idobjeto'); ?>

			<?php echo CHTml::textField('objetito',$model->idobjeto,array('size'=>3,'Disabled'=>'Disabled')); ?>
                        <?php echo CHTml::textField('despriobjeto',$model->objetosmaster->objetoscliente->nombreobjeto,array('size'=>36,'Disabled'=>'Disabled')); ?>
			
            <?php }  ?>
	</div>
                    
                    <div class="row">
            <?php if(!$model->isNewRecord) { ?>
		
                    <?php echo $form->labelEx($model,'idobjeto'); ?>
			<?php echo CHTml::textField('objetito42',$model->objetosmaster->masterequipo->codigo,array('size'=>8,'Disabled'=>'Disabled')); ?>
                        <?php echo CHTml::textField('despriobjeto2',$model->objetosmaster->masterequipo->descripcion,array('size'=>36,'Disabled'=>'Disabled')); ?>
			
            <?php }  ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'fechainiprog'); ?>
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
						'dateFormat'=>'dd-mm-yy',
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
						'dateFormat'=>'yy-mm-dd',
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
						'dateFormat'=>'yy-mm-dd',
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
						'dateFormat'=>'yy-mm-dd',
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
			<?php echo $form->error($model,'fechafin'); ?>
		</div>
<div class="row">
		<?php echo $form->labelEx($model,'fechacre'); ?>
		<?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'fechacre'); ?>
	</div>

		<div class="row">
			
			<?php

			if ($model->isNewRecord)

			{
				echo $form->labelEx($model,'codpro');
                            
                            $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codpro',
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
			} 
			?>

		</div>
                    
                    <div class="row">
			
			<?php

			if ($model->isNewRecord)

			{
			echo $form->labelEx($model,'codpro1');	
                            $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codpro1',
						'ordencampo'=>1,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>6,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'feh34dfgyfj',
					)

				);
			} 
			?>

		</div>
                    
                    
		<div class="row">
			
			<?php  
 
			if ($model->isNewRecord)

			{
				echo $form->labelEx($model,'idobjeto');
                            $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'idobjeto',
						'ordencampo'=>5,
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>6,
						'model'=>$model,
						'form'=>$form,
                                'filtro'=>'codpro@js:Ot_codpro.value',
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'feh77dfddj',
					)

				);
			} 
			?>
			<?php echo $form->error($model,'idobjeto'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codresponsable'); ?>
			<?php

			if ($this->eseditable($model->codestado)=='')

			{
				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codresponsable',
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

		</div>
			<div class="panelizquierdo">


	

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>3, 'cols'=>40)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
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
    <?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo CHtml::textField('modeldgdgd',$model->estado->estado,array('disabled'=>($editable)?'':'disabled')); ?>
    <?php } ?>	
	</div>

	

	

			</div>



</div><!-- form -->

	</div>





<?php
 if(!$model->isNewRecord){
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'Labores'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('tab_labores', array('form'=>$form,'model'=>$model),TRUE)
			),
			'Recursos'=>array('id'=>'tab_ui',
				'content'=>$this->renderPartial('tab_recursos', array('form'=>$form,'model'=>$model,'modelolabor'=>$modelolabor),TRUE)
			),
                    
                    'Rec externos'=>array('id'=>'tab_uifre4',
				'content'=>$this->renderPartial('tab_consignaciones', array('modeloconsi'=>$modeloconsi,'form'=>$form,'model'=>$model,'modeloconsi'=>$modeloconsi),TRUE)
			),
                    
                    'Componentes rotativos'=>array('id'=>'tab_uifre5',
				'content'=>$this->renderPartial('tab_neot', array('modeloconsi'=>$modeloconsi),TRUE)
			),
                     'Imputaciones Caja Menor'=>array('id'=>'tab_imgghty454',
				'content'=>$this->renderPartial('tab_cajachica', array('modelopadre'=>$model),TRUE)
			),
                    
                    'Registro visual'=>array('id'=>'tab_img',
				'content'=>$this->renderPartial('tab_images', array('modelopadre'=>$model),TRUE)
			),
                    
                    
                    
                    
			'Auditoria'=>array('id'=>'tab____..__',
				'content'=>$this->renderPartial('//site/tab_auditoria', array('form'=>$form,'model'=>$model),TRUE)
			),



		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabi',)
);

 }
?>



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