<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */

$this->breadcrumbs=array(
	'Ingfacturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ingfactura', 'url'=>array('index')),
	array('label'=>'Manage Ingfactura', 'url'=>array('admin')),
);
?>

<h1>Create Ingfactura</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>