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
		array('name'=>'item', 'type'=>'raw','header'=>'Item','htmlOptions'=>array('width'=>20) ),
		array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),
		array('name'=>'codentro', 'type'=>'raw','header'=>'Centro','htmlOptions'=>array('width'=>20) ),
		array('name'=>'cant', 'type'=>'raw','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant,4).Chtml::closeTag("span")','header'=>'Cant','htmlOptions'=>array('width'=>20) ),
		array('htmlOptions'=>array('width'=>10),'name'=>'codigoalma','visible'=>(yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
		array('htmlOptions'=>array('width'=>5),'header'=>'um','value'=>'$data->ums->desum'),
		array('htmlOptions'=>array('width'=>5), 'type'=>'raw','name'=>'codart','value'=>'$data->codart','visible'=>(!yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
		'descri',
		 array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->detalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		//'disp',
		array('name'=>'punit', 'type'=>'raw','header'=>'Pu','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->punit,3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>20)),
		array('name'=>'Subt', 'type'=>'raw','header'=>'Subt','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant*($data->punit),3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>68)),

		//array('name'=>'Bruto','header'=>'Bruto','value'=>'Mifactoria::decimal($data->cant*($data->punit),2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["total"],2).CHTml::CloseTag("span")),
		//array('name'=>'Descuento','visible'=>($descuento > 0)?true:false,'header'=>'Dcto','value'=>'Mifactoria::decimal($data->cant * ($data->punit - $data->punitdes),2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["descuento"],2).CHTml::CloseTag("span")),
		//array('name'=>'potal','value'=>'Mifactoria::decimal(($data->punit*(1-$data->ocompra->descuento/100))*$data->cant,2)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($mod::getTotal($proveedor)["total"],2).CHTml::CloseTag("span")),
		//array('name'=>'stockreservado','value'=>'MiFactoria::decimal($data->stockreservado)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["reservado"],2).CHTml::CloseTag("span")),
		//array('name'=>'stocktransito','value'=>'MiFactoria::decimal($data->stocktransito)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["transito"],2).CHTml::CloseTag("span")),



		// 'docompra_estado.estado',
		//array('name'=>'potal','header'=>'P. to','value'=>'$data->punitdes*$data->cant'),

	),
)); ?>


<div style="display: block; float:right; width:170px;">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resumenoc-grid',
	'dataProvider'=>$model->proveedorresumen($this),
	//'filter'=>$model,
	'summaryText'=>'',
	'hideHeader'=>true,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'summaryText'=>' Total de Items : {count}',
	'columns'=>array(

			'param',
			array('name'=>'valor','type'=>'raw','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).MiFactoria::decimal($data["valor"],2).Chtml::closeTag("span")'),

				)))
			; ?>

</div>