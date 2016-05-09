<?php
/* @var $this TipoactivosController */
/* @var $model Tipoactivos */

$this->breadcrumbs=array(
	'Tipoactivoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipoactivos', 'url'=>array('index')),
	array('label'=>'Manage Tipoactivos', 'url'=>array('admin')),
);
?>

<h1>Create Tipoactivos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>