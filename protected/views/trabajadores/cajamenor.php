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




<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'cc-caja-grid',
	'dataProvider'=>Dcajachica::model()->search_por_trabajador($codtrabajador),
	'mergeColumns' => array('ceco'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		//'id',
		'cabecera.descripcion',
		'fecha',
		array('name'=>'glosa','type'=>'raw','value'=>'CHtml::link($data->glosa,CController::createUrl("/trabajadores/rendicion/",array("id"=>$data->id)))'),
		'debe',
		'ceco',
		'documentos.desdocu',
		'flujos.destipo'

	),
)); ?>
