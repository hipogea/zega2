<?php if (strtolower($this->action->id)=='verdocumento'){
	   $proveedor=Docompra::model()->search_por_compra($filtro);
	$mod='Docompra';
	$CLAVE="id";

      } else {
	   $proveedor=Docompratemp::model()->search_por_compra($filtro);
	$mod='Docompratemp';

	$CLAVE="idtemp";

     }
$descuento=$model->descuento+0;
//var_dump($descuento);yii::app()->end();
	?>
<div id="AjFlash" class="flash-regular"></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
   'summaryText'=>' Total de Items : {count}',
	'columns'=>array(
		array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->idtemp',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
		   ),
                ),

		// array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->estadodetalle=="04")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
	     array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),
		'codentro',
		'codigoalma',
		'item',

		'cant',
		'ums.desum',
		'codart',
		'descri',
		 array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->detalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		//'disp',
		'punit',
		array('name'=>'Bruto','header'=>'Bruto','value'=>'Mifactoria::decimal($data->cant*($data->punit),2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["bruto"],2).CHTml::CloseTag("span")),
		array('name'=>'Descuento','visible'=>($descuento > 0)?true:false,'header'=>'Dcto','value'=>'Mifactoria::decimal($data->cant * ($data->punit - $data->punitdes),2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["descuento"],2).CHTml::CloseTag("span")),
		array('name'=>'potal','value'=>'Mifactoria::decimal(($data->punit*(1-$data->ocompra->descuento/100))*$data->cant,2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["total"],2).CHTml::CloseTag("span")),
		//array('name'=>'stockreservado','value'=>'MiFactoria::decimal($data->stockreservado)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["reservado"],2).CHTml::CloseTag("span")),
		//array('name'=>'stocktransito','value'=>'MiFactoria::decimal($data->stocktransito)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["transito"],2).CHTml::CloseTag("span")),



		// 'docompra_estado.estado',
		//array('name'=>'potal','header'=>'P. to','value'=>'$data->punitdes*$data->cant'),
			array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
				  array(
					  'visible'=>'true',
					  'url'=>'$this->grid->controller->createUrl("/Ocompra/Verdetoc/",
										    array("id"=>$data->'.$CLAVE.',"action"=>$this->grid->controller->action->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
					  'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
					  'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'find.png',
					  'label'=>'Visualizar Item',
				  ),
						 
                        'update'=>
                            array(
                            	   'visible'=>($this->eseditable($model->{$this->campoestado}))?'false':'true',
                                    'url'=>'$this->grid->controller->createUrl("/Ocompra/Modificadetalle/",
										    array("id"=>$data->idtemp,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png', 
								'label'=>'Actualizar Item', 
                                ),
								
								'delete'=>
                             array(
								 'visible'=>'false',

                                ),	
							

                            ),
		),
	),
)); ?>


<?php echo "subtotal :".$model->subtotal."<br>"; ?>
<?php echo "Descontado :".$model->totaldescuento()."<br>"; ?>
<?php echo "Neto :".$model->neto()."<br>"; ?>
<?php echo "impùestos :".$model->valorimpuestos."<br>"; ?>
<?php echo "total :".$model->total()."<br>"; ?>
