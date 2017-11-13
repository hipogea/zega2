<?php
/* @var $this TipoproductoController */
/* @var $model VentasTipoproducto */

$this->breadcrumbs=array(
	'Ventas Tipoproductos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VentasTipoproducto', 'url'=>array('index')),
	array('label'=>'Manage VentasTipoproducto', 'url'=>array('admin')),
);
?>

<h1>Create VentasTipoproducto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>