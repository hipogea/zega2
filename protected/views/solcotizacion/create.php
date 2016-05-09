<?php
/* @var $this SolcotizacionController */
/* @var $model Solcotizacion */

$this->breadcrumbs=array(
	'Solcotizacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solcotizacion', 'url'=>array('index')),
	array('label'=>'Manage Solcotizacion', 'url'=>array('admin')),
);
?>

<h1>Create Solcotizacion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>