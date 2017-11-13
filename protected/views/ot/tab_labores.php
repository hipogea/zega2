<?php
if($this->action->id=='editadocumento'){
   $provedor= Tempdetot::model()->search_por_ot($model->id);
    
}else{
     $provedor= Detot::model()->search_por_ot($model->id);
}
?>
<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>"CGridview - Row hovering",
		));
		
	?>
    
    <?php
   
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'detalle-grid',
    'dataProvider' => $provedor,
    //'filter'=>$model,
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
    'summaryText' => ' Total de Items : {count}',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'selectableRows' => 20,
            'value' => '$data->idtemp',
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
        array('name' => 'item', 'type' => 'raw', 'header' => 'Item', 'htmlOptions' => array('width' => 20)),
        //array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),
        //array('name'=>'codentro', 'type'=>'raw','header'=>'Centro','htmlOptions'=>array('width'=>20) ),
        //array('name'=>'cant', 'type'=>'raw','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant,4).Chtml::closeTag("span")','header'=>'Cant','htmlOptions'=>array('width'=>20) ),
        //array('htmlOptions'=>array('width'=>10),'name'=>'codigoalma','visible'=>(yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
        //array('htmlOptions'=>array('width'=>5),'header'=>'um','value'=>'$data->ums->desum'),
        //array('htmlOptions'=>array('width'=>5), 'type'=>'raw','name'=>'codart','value'=>'$data->codart','visible'=>(!yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
        array('name' => 'textoactividad', 'value' => 'ucfirst(strtolower($data->textoactividad))'),
        ARRAY('name'=>'avance','type'=>'raw','header'=>'%Av','value' => 'CHtml::openTag("span",array("class"=>"label badge-error")).$data->avance." % ".CHtml::closeTag("span")'),
        ARRAY('name'=>'cc','type'=>'raw','header'=>'Comp','value' => '(!empty($data->codmaster))?CHtml::image(Yii::app()->getTheme()->baseUrl."/img/bricks.png"):""'),
        
        'grupoplan.desgrupo',
        'nhoras',
        'nhombres',
        'codmon',
        'monto',
        'estado.estado'

    // array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->detalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),
    //array('name'=>'punit', 'type'=>'raw','header'=>'Pu','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->punit,3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>20)),
    //array('name'=>'Subt', 'type'=>'raw','header'=>'Subt','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant*($data->punit),3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>68)),
    ),
));

               
                    ?>



<?php
//var_dump($this->estasEnsesion($model->id));
if ($this->estasEnsesion($model->id)) {
      
    
    $botones = array(
        'add' => array(
            'type' => 'C',
            'ruta' => array($this->id . '/creadetalle', array(
                    'idcabeza' => $model->id,
                    'cest' => $model->{$this->campoestado},
                    //"id"=>$model->n_direc,
                    "asDialog" => 1,
                    "gridId" => 'detalle-grid',
                )
            ),
            'dialog' => 'cru-dialogdetalle',
            'frame' => 'cru-detalle',
            'visiblex' => array('10'),
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
            'visiblex' => array('10'),
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
            'visiblex' => array('10'),
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
            'visiblex' => array('10'),
        ),
        'pack2' => array(
            'type' => 'B',
            'ruta' => array($this->id . '/procesardocumento', array('id' => $model->id, 'ev' => 35)),
            'visiblex' => array('10'),
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
           // 'visiblex' => array($this::ESTADO_CREADO, $this::ESTADO_AUTORIZADO, $this::ESTADO_ANULADO, $this::ESTADO_CONFIRMADO, $this::ESTADO_FACTURADO),
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
            'visiblex' => array('10'),
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
           'visiblex' => array($this::ESTADO_CREADO),
        ),
    );

   //print_r($botones);die();
    $this->widget('ext.toolbar.Barra', array(
        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
        'botones' => $botones,
        'size' => 24,
        'extension' => 'png',
        'status' => $model->{$this->campoestado},
            )
    );
        //ECHO "BOtOTNE<BR>";VAR_DUMP($this::ESTADO_PREVIO);die(); 
}
?>
<?php $this->endWidget();?>


