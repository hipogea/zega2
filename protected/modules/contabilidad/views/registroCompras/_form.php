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
	
        
 <?php
        $this->widget('zii.widgets.jui.CJuiTabs', array(
            'theme' => 'default',
		'tabs' => array(
			'Comprobante'=>array('id'=>'tab_',
                                                'content'=>$this->renderPartial('_tab_comprobante', array('form'=>$form,'model'=>$model),TRUE)
					), 
			'Proveedor'=>array('id'=>'tab__','content'=>$this->renderPartial('_tab_proveedor', array('form'=>$form,'model'=>$model),TRUE)
					),
			'Op. gravadas'=>array('id'=>'tab___',
						'content'=>$this->renderPartial('_tab_gravadas', array('form'=>$form,'model'=>$model),TRUE)
					),
			'Detraccion'=>array('id'=>'tab____',
                                                'content'=>$this->renderPartial('_tab_detraccion', array('form'=>$form,'model'=>$model),TRUE)
						),
                         'Ajuste de precios'=>array('id'=>'tab__.___',
                            'content'=>$this->renderPartial('_tab_ajuste', array('form'=>$form,'model'=>$model),TRUE)
                        ),
                    'Asientos'=>array('id'=>'tab__.___.',
                            'content'=>$this->renderPartial('_tab_cuentas', array('form'=>$form,'model'=>$model,'proveedor'=>$proveedor),TRUE)
                        ),
                    ),
		'options' => array('overflow'=>'auto','collapsible' => false,),
                    'id'=>'MyTabi',)
			                );
                            ?>
    
		
		
		
		  
        


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

<?php

//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog4',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
<iframe id="cru-frame4" width="100%" height="100%"></iframe>
<?php

$this->endWidget();

//--------------------- end new code --------------------------
?>