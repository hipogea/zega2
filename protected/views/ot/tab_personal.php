<?php
//$modelin=new Ottraba();
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'trabajadores-grid',
    'dataProvider' => $modelin->search_por_ot($model->id),
    'filter'=>$modelin,
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    //'summaryText' => ' Total de Items : {count}',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 20,
            'value' => '$data->id',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]',
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'htmlOptions'=>array('width'=>80),
            'buttons' => array(
                'view' =>
                array(
                    'visible' => 'true',
                    'url' => '$this->grid->controller->createUrl("/Ot/editatarifas/",
										    array("id"=>$data->id,"action"=>$this->grid->controller->action->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                    'click' => ('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
                    'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemagrid'] . 'Edit.png',
                    'label' => 'Editar Item',
                ),
                'update' =>
                array(
                    'visible' => ($this->eseditable($model->{$this->campoestado})) ? 'false' : 'true',
                    'url' => '$this->grid->controller->createUrl("/Ot/Modificadetalle/",
										    array("id"=>$data->idtemp,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                    'click' => ('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
                    'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemagrid'] . 'update.png',
                    'label' => 'Actualizar Item',
                ),
                'delete' =>
                array(
                    'visible' => 'false',
                ),
            ),
        ),
        array('name' => 'codtra', 'type' => 'raw', 'header' => 'Codigo', 'htmlOptions' => array('width' => 20)),
        array('name'=>'trabajadores_ap','header'=>'Ap','value'=>'$data->trabajadores->ap'),
	
		 array('type' => 'raw', 'header' => 'AM', 'value'=>'$data->trabajadores->am', 'htmlOptions' => array('width' => 200)),
         array('type' => 'raw', 'header' => 'Nombres', 'value'=>'$data->trabajadores->nombres', 'htmlOptions' => array('width' => 200)),
      array('type' => 'raw', 'header' => 'Regimen', 'value'=>'$data->regimen->desregimen', 'htmlOptions' => array('width' => 300)),
       array('type' => 'raw', 'header' => 'Cargo', 'value'=>'$data->oficios->oficio', 'htmlOptions' => array('width' => 300)),
       'tarifa'
                            ),
));
?>



<?php
//var_dump($this->estasEnsesion($model->id));

    $botones = array(
        'add' => array(
            'type' => 'C',
            'ruta' => array($this->id .'/AjaxAgregaTrabajadores', array(
                    'id' => $model->id,                   
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
            'ruta' => array($this->id . '/AgregaDetalleOtCompo', array(
                    'id' => $model->id,
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
        
        'minus' => array(
            'type' => 'D',
            'ruta' => array($this->id . '/ajaxborratrabajadores', array()),
            'opajax' => array(
                'type' => 'POST',
                'url' => Yii::app()->createUrl($this->id . '/ajaxborratrabajadores', array()),
                'success' => "function(data) {
					      $.fn.yiiGridView.update('trabajadores-grid');
                                              $.growlUI('Growl Notification', data,24000); 
                                              
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
                    'id' => $model->id,
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
            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 35)),
            'visiblex' => array(self::ESTADO_CREADO),
        ),
        'briefcase' => array(
            'type' => 'D',
            'ruta' => array($this->id . '/Agregardelmaletin', array()),
            'opajax' => array(
                'type' => 'GET',
                'data' => array('id' => $model->id),
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
                    'idguia' => $model->id,
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
                    'idguia' => $model->id,
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


    $this->widget('ext.toolbar.Barra', array(
        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
        'botones' => $botones,
        'size' => 24,
        'extension' => 'png',
        'status' => $model->{$this->campoestado},
            )
    );

?>



