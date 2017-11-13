<?php
/* @var $this TipoproductoController */
/* @var $model VentasTipoproducto */

$this->breadcrumbs=array(
	'Ventas Tipoproductos'=>array('index'),
	$model->codtipo,
);

$this->menu=array(
	array('label'=>'List VentasTipoproducto', 'url'=>array('index')),
	array('label'=>'Create VentasTipoproducto', 'url'=>array('create')),
	array('label'=>'Update VentasTipoproducto', 'url'=>array('update', 'id'=>$model->codtipo)),
	array('label'=>'Delete VentasTipoproducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codtipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VentasTipoproducto', 'url'=>array('admin')),
);
?>

<h1>View VentasTipoproducto #<?php echo $model->codtipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codtipo',
		'destipo',
		'porcutilidad',
	),
)); ?>
