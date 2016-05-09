<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */

$this->breadcrumbs=array(
	'Ingfacturas'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Ingresos', 'url'=>array('index')),
	array('label'=>'Nuevo Ingreso', 'url'=>array('crearingreso')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ingfactura-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?PHP MiFactoria::titulo('Recepcion de Facturas','package'); ?>




<?php echo CHtml::link('Filtro','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id' => 'ingfactura-grid',
	'dataProvider'=>$model->search(),
	'mergeColumns' => array('numerodoc','numocompra','item','despro'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'extraRowColumns' => array('numerodoc'),
	'extraRowTotals' => function($data, $row, &$totals) {
		if(!isset($totals['sum_montofacturado'])) $totals['sum_montofacturado'] = 0;
		$totals['sum_montofacturado']+=$data['montofacturado'];

	},
	'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Factura : ".MiFactoria::decimal($totals["sum_montofacturado"],2)." </span>"',
	'extraRowPos'=>'below',
	'columns'=>array(
		'numrecepcion',
		'seriedoc',
		'numerodoc',
		'codpro',
		'despro',
		'numocompra',
		'item',
		'descri',
		'desum',
		'codpro',
		'fecha',
		'fechadoc',
		//'numerodoc',
		'seriedoc',
		array('name'=>'montofacturado','header'=>'monto','value'=>'round($data->montofacturado,2)'),
		'moneda',
		/*
		'numrecepcion',
		'descripcion',
		'iduser',
		'frechacrea',
		'codcentro',
		'numocompra',
		'idgarita',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
