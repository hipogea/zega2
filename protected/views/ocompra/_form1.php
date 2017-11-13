   <div class="division">
        <div class="wide form">
            <div class="barrasup barrasup-simple">

                <?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'compra.png',"hola",array('width'=>'15','height'=>'8')); ?>
                <span class="badge badge-notice">Orden de compra
                </span>
            </div>

                <?php $form=$this->beginWidget('CActiveForm', array(
	                                            'id'=>'Ocompra-form',
	                                            'enableClientValidation'=>FALSE,
                                                'clientOptions' => array(
                                                'validateOnSubmit'=>TRUE,
                                                'validateOnChange'=>TRUE  ,
                                                                     ),
	                                            'enableAjaxValidation'=>TRUE,
		                                                    )); ?>

            <div class="row">
                <?php

                if($editable) {

                    $botones = array(
                        'go' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array(null, self::ESTADO_PREVIO),
                        ),
                        'save' => array(
                            'type' => 'A',
                            'ruta' => array(),
                            'visiblex' => array(self::ESTADO_CREADO, self::ESTADO_AUTORIZADO, self::ESTADO_MODIFICADO,
                                self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),
                        ),


                        'ok' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->idguia, 'ev' => 65)),//aprobar
                            'visiblex' => array( self::ESTADO_CREADO, (
                                (integer)$model->numeroitems >0 and
                                Ocompra::puedeautorizar()

                            ) ),
                           // 'visiblex' => array( true ),
                        ),


                        'undo' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->idguia, 'ev' => 67)), //revertir aprobacion
                            'visiblex' => array(self::ESTADO_ACEPTADO),

                        ),

                        'tacho' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->idguia, 'ev' => 66)),
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),
                        'pdf' => array(
                            'type' => 'D', //AJAX LINK
                          //  'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                            'ruta' => array($this->id . '/crearpdf', array('id' => $model->idguia)),
                            'opajax'=>array(
                               // 'url'=>array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 1)),
                                'ruta' => array($this->id . '/crearpdf', array('id' => $model->idguia)),
                                'success'=>"function(data) {
										$('#myDivision').html(data).fadeIn().animate({opacity: 1.0}, 900).fadeOut('slow');
                                        }",
                            ),

                            /*'success'=>'function(data) {
                                             $("#myDivision").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                            }'
                                            ),*/
                            'visiblex' => array(self::ESTADO_ACEPTADO),

                        ),
                        'mail' => array(
                            'type' => 'D', //AJAX LINK
                            'ruta' => array($this->id . '/enviarpdf', array('id' => $model->idguia)),
                            'opajax'=>array(
                                'url'=> array($this->id . '/enviarpdf', array('id' => $model->idguia)),
                                    'success'=>"function(data) {
                                     $.growlUI('Growl Notification', data,24000);
                                     alert(data);
                                        }",
                            ),

                            'visiblex' => array(self::ESTADO_ACEPTADO),

                        ),

                    'camera' => array(
                            'type' => 'C',
                            'ruta' => array('coordocs/hacereporte', array(
                                'id' => $model->idreporte,
                                     'idfiltrodocu' => $model->idguia,
                                'file' => 0,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_MODIFICADO,
                               self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),

                        ),
                        
                        
                        'config' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->idguia, 'ev' => 64)),
                            'visiblex' => array(self::ESTADO_CREADO, self::ESTADO_MODIFICADO,
                                self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),

                        ),
                        'print' => array(
                            'type' => 'B',
                            'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 0)),
                            'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),
                        ),

                        'money' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregaimpuesto', array(
                                'idguia' => $model->idguia,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),
                        
                        
                       


                        'out' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/salir', array('id' => $model->idguia)),
                           'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),
                        ),
                    );
                } else {
                    $botones = array(




                        'edit' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/editadocumento', array('id' => $model->idguia, 'ev' => 65)),//aprobar
                            'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),
                        ),



                       /* 'camera' => array(
                            'type' => 'D', //AJAX LINK
                            'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte,
                                'idfiltrodocu' => $model->idguia, 'file' => 0)),

                            'opajax' => array(
                                'type' => 'POST',
                                'ruta' => array('coordocs/hacereporte', array('id' => $model->idreporte, 'idfiltrodocu' => $model->idguia, 'file' => 0)),
                                'update' => '#zona_pdf',
                            ),

                            'visiblex' => array(ESTADO_ACEPTADO, ESTADO_MODIFICADO,
                                ESTADO_CONFIRMADO, ESTADO_FACTURADO_PARCIAL, ESTADO_ACEPTADO,
                                ESTADO_CON_ENTREGAS, ESTADO_FACTURADO_TOTAL),

                        ),*/
                        
                         'camera' => array(
                            'type' => 'C',
                            'ruta' => array('coordocs/hacereporte', array(
                                'id' => $model->idreporte,
                                     'idfiltrodocu' => $model->idguia,
                                'file' => 0,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),

                        ),
                        
                        
                        
                        'out' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/admin',array()),
                             'visiblex' => array(self::ESTADO_ACEPTADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO_PARCIAL, self::ESTADO_ACEPTADO,
                                self::ESTADO_CON_ENTREGAS, self::ESTADO_FACTURADO_TOTAL),
                        ),
                    );
                }
 /*VAR_DUMP($model->{$this->campoestado});
                YII::APP()->END();*/
                $this->widget('ext.toolbar.Barra',
                    array(
                        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                        'botones'=>$botones,
                        'size'=>24,
                        'extension'=>'png',
                        'status'=>$model->{$this->campoestado},

                    )
                );
               // var_dump($model->{$this->campoestado}); var_dump(ESTADO_CREADO);var_dump($model->numeroitems+0);die();

                ?>
            <div id="myDivision" style="display:block;float:right;" class="flash-regular">
.
            </div>

            </div>

            <?php  echo $form->errorSummary($model); ?>


   
                <?php
                    $this->widget('zii.widgets.jui.CJuiTabs', array(
                     'theme' => 'default',
					'tabs' => array(
									'Inicio'=>array('id'=>'tab_',
														'content'=>$this->renderPartial('tab_uno', array('form'=>$form,'model'=>$model),TRUE)
																			), 
									'Comerciales'=>array('id'=>'tab__',
														'content'=>$this->renderPartial('tab_dos', array('form'=>$form,'model'=>$model),TRUE)
																			),
									'Adicionales'=>array('id'=>'tab___',
														'content'=>$this->renderPartial('tab_tres', array('form'=>$form,'model'=>$model),TRUE)
																			),
									'Mensajes'=>array('id'=>'tab____',
														'content'=>$this->renderPartial('tab_cuatro', array('form'=>$form,'model'=>$model),TRUE)
																			),

                                    'Historial'=>array('id'=>'tab_____',
                            'content'=>$this->renderPartial('tab_cinco', array('form'=>$form,'model'=>$model),TRUE)
                        ),

                        'Impuestos'=>array('id'=>'tab______',
                            'content'=>$this->renderPartial('tab_impuestos', array('form'=>$form,'model'=>$model),TRUE)
                        ),

                        'Auditoria'=>array('id'=>'tab____..__',
                            'content'=>$this->renderPartial('//site/tab_auditoria', array('form'=>$form,'model'=>$model),TRUE)
                        ),



									),
					'options' => array('overflow'=>'auto','collapsible' => false,),
                    'id'=>'MyTabi',)
			                );
                            ?>
            <?php // $this->endWidget(); ?>

            <?php // yii::app()->end();?>
            <?php /* $form=$this->beginWidget('CActiveForm', array(
                'id'=>'Ocompradetalle-form',
                'enableClientValidation'=>true,

                'enableAjaxValidation'=>false,
            )); */?>
         <?php
            if ( !$model->isNewRecord )  {
				$this->renderpartial('vw_detalle',array('model'=>$model,'eseditable'=>$this->eseditable($model->codestado),'filtro'=>$model->idguia));
				}
            ?>



            <?php /*if (strtolower($this->action->id)=='verdocumento'){
                $proveedor=Impuestosdocuaplicado::model()->search_por_id($model->idguia);
                $clave='id';
            } else {
                $proveedor=Tempimpuestosdocuaplicados::model()->search_por_id($model->idguia);
                $clave='idtemp';
            }
            $descuento=$model->descuento+0;*/
            //var_dump($descuento);yii::app()->end();
            ?>
            <?php  //$valorneto=$model->neto(); ?>


	<?php
	   //$this->renderpartial('vw_resumen',array('id'=>($model->isNewRecord)?0:$model->idguia,'monedas'=>'$','descuento'=>($model->isNewRecord)?0:$model->descuento));
	 ?>

            <div class="row">

                <?php
                if($this->estasEnsesion($model->idguia)) {
                    $botones = array(
                        'add' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/creadetalle', array(
                                'idcabeza' => $model->idguia,
                                'cest' => $model->{$this->campoestado},
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),

                        'tool' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregaritemsolpe', array(
                                'idguia' => $model->idguia,
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),

                        'minus' => array(
                            'type' => 'D',
                            'ruta' => array($this->id . '/borraitems', array()),

                            'opajax' => array(
                                'type' => 'POST',
                                'url' => Yii::app()->createUrl($this->id . '/borraitems', array()),
                                'success' => "function(data) {
										$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
                                              $.fn.yiiGridView.update('detalle-grid');
                                               $.fn.yiiGridView.update('resumenoc-grid');
                                               return false;
                                        }",
                                'beforeSend' => 'js:function(){
                                  				 var r = confirm("Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',

                            ),
                            'visiblex' => array(self::ESTADO_CREADO, self::ESTADO_AUTORIZADO, self::ESTADO_ANULADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO),

                        ),


                        'checklist' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregardespacho', array(
                                'id' => $model->idguia,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),
                        ),
                        'pack2' => array(
                            'type' => 'B',
                            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->idguia, 'ev' => 35)),
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),


                        'briefcase' => array(
                            'type' => 'D',
                            'ruta' => array($this->id . '/Agregardelmaletin', array()),
                            'opajax' => array(
                                'type' => 'GET',
                                'data' => array('id' => $model->idguia),
                                'url' => Yii::app()->createUrl($this->id . '/Agregardelmaletin', array()),
                                'success' => 'js:function(data) {
                            $("#AjFlash").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
                            $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
                                'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de agregar los items del maletin ?");
                          						 if(!r){return false;}
                               							 }
                               					',
                            ),
                            'visiblex' => array(self::ESTADO_CREADO, self::ESTADO_AUTORIZADO, self::ESTADO_ANULADO, self::ESTADO_CONFIRMADO, self::ESTADO_FACTURADO),

                        ),


                        'join' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregaritemsolpe', array(
                                'idguia' => $model->idguia,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),

                        'pack' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/agregarmasivamente', array(
                                'idguia' => $model->idguia,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialogdetalle',
                            'frame' => 'cru-detalle',
                            'visiblex' => array(self::ESTADO_CREADO),

                        ),


                    );


                    $this->widget('ext.toolbar.Barra',
                        array(
                            //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                            'botones' => $botones,
                            'size' => 24,
                            'extension' => 'png',
                            'status' => $model->{$this->campoestado},


                        )
                    );
                }
                ?>
            </div>





                    <?php $this->endWidget(); ?>

        </div> <!--div class wide form !-->
   </div> <!--div class division !-->

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
        'show'=>'Transform',
    ),
));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

















<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>850,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

