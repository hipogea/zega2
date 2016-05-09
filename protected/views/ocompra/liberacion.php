<?php

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Manage',
);
$this->menu=array(
	//array('label'=>'Liberacion masiva', 'url'=>array('libmasiva')),
	array('label'=>'Crear Oc', 'url'=>array('CreaDocumento')),
	array('label'=>'Listado', 'url'=>array('admin')),

);

?>

<?php
MiFactoria::titulo('Firmar Compras','check')
?>






	<div id="AjFlash" class="flash-regular"></div>
<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider'=>$proveedor,
      'mergeColumns' => array('numcot','despro'),
      'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'extraRowColumns' => array('numcot'),
	'extraRowTotals' => function($data, $row, &$totals) {
		if(!isset($totals['sum_totalneto'])) $totals['sum_totalneto'] = 0;
		$totals['sum_totalneto']+=$data['totalneto'];

	},
	'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Oc : ".MiFactoria::decimal($totals["sum_totalneto"],2)." </span>"',
	'extraRowPos'=>'below',
      
      

      'columns' => array(
		  ARRAY('name'=>'numcot','header'=>'Numero','type'=>'raw','value'=>'CHTml::link($data->numcot,Yii::app()->createurl("ocompra/editadocumento", array("id"=> $data->idguia ) ))'),
		    /*ARRAY('name'=>'numcot','header'=>'','type'=>'raw','value'=>'CHTml::AjaxLink(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"),
		    Yii::app()->createurl("ocompra/procesardocumento", array("id"=> $data->idguia,"ev"=>65) ),
		    array(
        "data" => array(),
        "type"     => "GET",
        "success"   => "js:function(data) {
                                              $.fn.yiiGridView.update(\"grid1\");  $(\"#AjFlash\").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut(\"slow\");
                                        }"
    				) 
		    )'),*/
		  array(
			  'name'=>'fechanominal',
			  'header'=>'Fec',
			  'value'=>'date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>'50')
		  ),
		  'despro',
        'codart',
        'cant',
        'desum',
        'descri',
		  ARRAY('name'=>'entregado','type'=>'html','header'=>'Entr.','value'=>'($data->entregado>0)?$data->entregado.CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"):""','htmlOptions'=>array("width"=>35)),
        ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		  ARRAY('name'=>'punit','header'=>'P.unit','value'=>'MiFactoria::decimal($data->punit,2)'),
		  ARRAY('name'=>'subto','header'=>'Subtotal','value'=>'MiFactoria::decimal($data->subto,2)'),
		  ARRAY('name'=>'descontado','header'=>'Dcto','value'=>'MiFactoria::decimal($data->descontado,2)'),
		  ARRAY('name'=>'totalneto','header'=>'Neto','value'=>'MiFactoria::decimal($data->totalneto,2)'),
		  array(
			  'class'=>'CButtonColumn',

			  'template'=>'{aprobar}',
			  'htmlOptions'=>array('width'=>20),
			  'buttons'=>array(


				  'aprobar'=>
					  array(
						  'url'=>'$this->grid->controller->createUrl("/ocompra/procesardocumento",
																					array("id"=>$data->idguia,	"ev"=>65


																							)
																				)',
						  'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("grid1"); $("#AjFlash").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");}')) ,
						  // 'options' => array( 'ajax' => array('type' => 'GET', 'success' => "js:function() { $.fn.yiiGridView.update('detalle-grid'); }" ,'url'=>'js:$(this).attr("href")')) ,
						  'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'check.png',
						  'label'=>'Aprobar',
					  ),

			  ),
		  ),
		       ),
    ));

?>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		ARRAY('name'=>'numcot','header'=>'OC','type'=>'raw','value'=>'CHtml::link($data->numcot,array("ocompra/update/".$data->idguia))'),
		'despro',
		'fecdoc',
		'texto',
		ARRAY('name'=>'tipoimputacion','header'=>'.','value'=>'$data->tipoimputacion'),
		'codart',
		'cant',
		'um',
		'descri',
		ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		'punit',
		'subto',
        //'docompra_estado.estadeedeo',
		//'codestado',
		//'texto',s
		/*
		'textolargo',
		'tipologia',
		'moneda',
		'orcli',
		'descuento',
		'usuario',
		'coddocu',
		'creado',
		'modificado',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codtipofac',
		'codsociedad',
		'codgrupoventas',
		'codtipocotizacion',
		'validez',
		'codcentro',
		'nigv',
		'codobjeto',
		'fechapresentacion',
		'fechanominal',
		'idguia',
		'tenorsup',
		'tenorinf',
		'montototal',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
	/*),
)); */ ?>