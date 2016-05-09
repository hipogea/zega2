<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Liberacion masiva', 'url'=>array('libmasiva')),
	array('label'=>'Crear Oc', 'url'=>array('CreaDocumento')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grid1').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Administrar Compras','basket1');?>






<div class="search-form" >
	<div class="division">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</DIV>


<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider'=>$model->search(),
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
		  ARRAY('name'=>'numcot','header'=>'Numero','type'=>'raw','value'=>'CHTml::link($data->numcot,Yii::app()->createurl("ocompra/editadocumento", array("id"=> $data->idguia )) ,ARRAY("target"=>"_blank"))'),
		 ARRAY('name'=>'numcot','header'=>'Numero','type'=>'raw','value'=>'CHTml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),Yii::app()->createurl("ocompra/verdocumento", array("id"=> $data->idguia)) ,array("target"=>"_blank") )','htmlOptions'=>array('width'=>'10')),

		  array(
			  'name'=>'fechanominal',
			  'header'=>'Fec',
			  'value'=>'date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>'50')
		  ),
		  array('name'=>'despro','value'=>'$data->despro','htmlOptions'=>array('width'=>'40')),
        array('name'=>'codart','value'=>'($data->codart==yii::app()->settings->get("materiales","materiales_codigoservicio"))?"":$data->codart'),
        'cant',
		  array('name'=>'desum','value'=>'$data->desum','htmlOptions'=>array('width'=>10)),
        'descri',
		  array('name'=>'numsolpe','value'=>'$data->numsolpe','htmlOptions'=>array('width'=>10)),
		  ARRAY('name'=>'entregado','type'=>'html','header'=>'Entr.','value'=>'($data->entregado>0)?round($data->entregado,3).CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"):""','htmlOptions'=>array("width"=>25)),
        ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		  ARRAY('name'=>'punit','header'=>'P.unit','value'=>'MiFactoria::decimal($data->punit,2)'),
		  ARRAY('name'=>'subto','header'=>'Subtotal','value'=>'MiFactoria::decimal($data->subto,2)'),
		  ARRAY('name'=>'descontado','header'=>'Dcto','value'=>'MiFactoria::decimal($data->descontado,2)'),
		  ARRAY('name'=>'totalneto','header'=>'Neto','value'=>'MiFactoria::decimal($data->totalneto,2)'),
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