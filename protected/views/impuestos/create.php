<?php
/* @var $this ImpuestosController */
/* @var $model Impuestos */

$this->breadcrumbs=array(
	'Impuestoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Impuestos', 'url'=>array('index')),
	array('label'=>'Manage Impuestos', 'url'=>array('admin')),
);
?>

<h1>Create Impuestos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>