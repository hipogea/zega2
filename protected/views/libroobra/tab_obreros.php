<?php
$proveedor=Asisobra::model()->search_por_libro($model->id);
//var_dump($model->tipoeventos);
//var_dump(Trabajosobra::model()->findByPk(1)->tipoeventos);
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'detalle-obreros-grid',
    'dataProvider' =>$proveedor ,
    //'filter'=>$model,
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'summaryText' => ' Total de Items : {count}',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 20,
            'value' => '$data->id',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajitaasistencia[]',
            ),
        ),
        array(
            'class' => 'CButtonColumn',
            'htmlOptions'=>array('width'=>80),
            'buttons' => array(
                'view' =>
                array(
                    'visible' => 'true',
                    'url' => '$this->grid->controller->createUrl("/Ocompra/Verdetoc/",
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
                    'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemagrid'] . 'find.png',
                    'label' => 'Visualizar Item',
                ),
                'update' =>
                array(
                    //'visible' => ($this->eseditable($model->{$this->campoestado})) ? 'false' : 'true',
                    'url' => '$this->grid->controller->createUrl("/Ot/Modificadetalle/",
										    array("id"=>$data->id,
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
        //array('name' => 'item', 'type' => 'raw', 'header' => 'Item', 'htmlOptions' => array('width' => 20)),
        //array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),
        //array('name'=>'codentro', 'type'=>'raw','header'=>'Centro','htmlOptions'=>array('width'=>20) ),
        //array('name'=>'cant', 'type'=>'raw','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant,4).Chtml::closeTag("span")','header'=>'Cant','htmlOptions'=>array('width'=>20) ),
        //array('htmlOptions'=>array('width'=>10),'name'=>'codigoalma','visible'=>(yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
        //array('htmlOptions'=>array('width'=>5),'header'=>'um','value'=>'$data->ums->desum'),
        //array('htmlOptions'=>array('width'=>5), 'type'=>'raw','name'=>'codart','value'=>'$data->codart','visible'=>(!yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
         array('name' => 'Codigo', 'value' => '$data->codtra'),
         array('name' => 'Nombres', 'value' => '$data->trabajadores->nombrecompleto'),
        array('name' => 'Calif', 'value' => '$data->trabajadores->oficio->oficio'),
         //array('name' => 'Califi', 'value' => '$data->trabajadores->oficio->oficio'),
        array('name' => 'hingreso', 'value' => '$data->hingreso'),
         array('name' => 'hsalida', 'value' => '$data->hsalida','footer'=>'Subtotales : '),
       array(
    'name'=>'hsalida',
    'header'=>'H. Salida',
    'type'=>'raw',
    'value'=>'CHtml::textField("dfkkdhfy",
        $data->hsalida,
        array(
            \'size\'=>\'3\',
            \'ajax\'=>array(
                    "type"=>"POST",
                    "data"=>array("dati"=>$data->hsalida),
                    )
            )
        );',
),
        
        array('type'=>'raw','name' => 'horas', 'value' => '$data->horastrabajadas()','footer'=>Asisobra::getTotalHoras($proveedor)["horas"]),
        array('name' => 'extras', 'value' => '$data->horasextras()','footer'=> Asisobra::getTotalHoras($proveedor)["horasextras"]),
        array('name' => 'montodiario', 'header'=>'Basi','value' => 'round($data->montodiario,2)'),
      array('name' => 'montoextras', 'header'=>'Extras','value' => 'round($data->montoextras,2)'),
        array('name' => 'montodominical', 'header'=>'Dom','value' => 'round($data->montodominical,2)'),
                //  g("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["reservado"],2).CHTml::CloseTag("span")),

        //  array('value'=>'MiFactoria::decimal($data->stockreservado)','footer'=>Chtml::openTa
        //  g("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["reservado"],2).CHTml::CloseTag("span")),
	//array('value'=>'MiFactoria::decimal($data->stocktransito)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["transito"],2).CHTml::CloseTag("span")),

       // array('name' => 'iudser', 'value' => 'Yii::app()->user->um->LoadUserById($data->iduser)->username'),
          //array('name' => 'codpro', 'value' => '$data->clipro->despro'),
             // array('name' => 'horafin', 'value' => '$data->horafin'),   ),
)));
?>

<?php
//var_dump($this->estasEnsesion($model->id));
    $botones = array(
        'add' => array(
            'type' => 'C',
            'ruta' => array($this->id . '/creadetalle', array(
                    'idcabeza' => $model->id,
                  'cest' => $model->campoestado,
                    //"id"=>$model->n_direc,
                    "asDialog" => 1,
                    "gridId" => 'detalle-grid',
                )
            ),
            'dialog' => 'cru-dialogdetalle',
            'frame' => 'cru-detalle',
            'visiblex' => array(ESTADO_CREADO),
        ),
             'tool' => array(
            'type' => 'C',
            'ruta' => array($this->id . '/AgregaDetalleOtCompo', array(
                    'id' => $model->id,
                    'cest' => $model->campoestado,
                    //"id"=>$model->n_direc,
                    "asDialog" => 1,
                    "gridId" => 'detalle-grid',
                )
            ),
            'dialog' => 'cru-dialogdetalle',
            'frame' => 'cru-detalle',
            'visiblex' => array(ESTADO_CREADO),
        ),                
        
        'minus' => array(
            'type' => 'D',
            'ruta' => array($this->id . '/borraitems', array()),
            'opajax' => array(
                'type' => 'POST',
                'url' => Yii::app()->createUrl($this->id . '/borraitems', array()),
                'success' => "function(data) {
					      $.fn.yiiGridView.update('detalle-grid');
                                              $.growlUI('Growl Notification', data,24000); 
                                              
                                        }",
                'beforeSend' => 'js:function(){
                                  var r = confirm("Esta seguro de Eliminar estos Items?");
                          	 if(!r){return false;}
                               	}
                               ',
            ),
            'visiblex' => array(ESTADO_CREADO, ESTADO_AUTORIZADO, ESTADO_ANULADO, ESTADO_CONFIRMADO, ESTADO_FACTURADO),
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
            'visiblex' => array(ESTADO_CREADO),
        ),
        'pack2' => array(
            'type' => 'B',
            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 35)),
            'visiblex' => array(ESTADO_CREADO),
        ),
        'add' => array(
            'type' => 'D',
            'ruta' => array($this->id . '/ajaxagregatrabajadores', array()),
            'opajax' => array(
                'type' => 'GET',
                'data' => array('id' => $model->id),
                'url' => Yii::app()->createUrl($this->id . '/ajaxagregatrabajadores', array()),
                'success' => 'js:function(data) {
                            $.fn.yiiGridView.update("detalle-obreros-grid");
                            $.growlUI("Aviso", data, 0, 0, 0); return false;
                            
                                    }',
                'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de agregar los trabajadores ?");
                          						 if(!r){return false;}
                               							 }
                               					',
            ),
            'visiblex' => array('10'),
        ),
        'undo' => array(
            'type' => 'D',
            'ruta' => array($this->id . '/AjaxRefrescaJornal', array()),
            'opajax' => array(
                'type' => 'GET',
                'data' => array('id' => $model->id),
                'url' => Yii::app()->createUrl($this->id . '/AjaxRefrescaJornal', array()),
                'success' => 'js:function(data) {
                            $.fn.yiiGridView.update("detalle-obreros-grid");
                            $.growlUI("Aviso", data, 0, 0, 0); return false;
                            
                                    }',
                'beforeSend' => 'js:
                               					 function(){
                                  				 var r = confirm("¿Esta seguro de actualizar las twrifas ?");
                          						 if(!r){return false;}
                               							 }
                               					',
            ),
            'visiblex' => array('10'),
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
            'visiblex' => array(ESTADO_CREADO),
        ),
        'pack' => array(
            'type' => 'C',
            'ruta' => array($this->id . '/creaevento', array(
                    'id' => $model->id,
                    //"id"=>$model->n_direc,
                    "asDialog" => 1,
                    "gridId" => 'detalle-eventos-grid',
                )
            ),
            'dialog' => 'cru-dialog3',
            'frame' => 'cru-frame3',
            'visiblex' => array('10'),
        ),
    );


    $this->widget('ext.toolbar.Barra', array(
        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
        'botones' => $botones,
        'size' => 24,
        'extension' => 'png',
        'status' => '10',
            )
    );

?>
