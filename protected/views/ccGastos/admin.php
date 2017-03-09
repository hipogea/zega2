<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */

$this->breadcrumbs=array(
	'Cc Gastoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CcGastos', 'url'=>array('index')),
	array('label'=>'Create CcGastos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cc-gastos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."coins.png");?>Gastos</h1>



<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'cc-gastos-grid',
	'dataProvider'=>$model->search(),
	'mergeColumns' => array('ceco','desdocu','movimiento','ano','mes'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'extraRowColumns' => array('ceco'),
	'extraRowTotals' => function($data, $row, &$totals) {
		if(!isset($totals['sum_monto'])) $totals['sum_monto'] = 0;
		$totals['sum_monto']+=$data['monto'];

	},
	'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Ceco : ".MiFactoria::decimal($totals["sum_monto"],2)." </span>"',
	'extraRowPos'=>'below',
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'ano',
		'mes',
		'ceco',
		'fechacontable',
		array('name'=>'monto','type'=>'raw','value'=>'CHTml::openTag("span",array("style"=>"font-size:11px;color:orange; font-weight:bold;")).MiFactoria::decimal($data->monto).CHTml::CloseTag("span")'),
		//'creadoel',

		//'codmoneda',
		'usuario',
		'desum',
		'cant',
		'codart',
		'descripcion',
		'desdocu',
		'numdocref',
		'movimiento',

		/*
		'idref',
		'tipo',
		'creadoel',
		'ano',
		'mes',
		'clasecolector',
		'iduser',
		*/

	),
)); ?>


