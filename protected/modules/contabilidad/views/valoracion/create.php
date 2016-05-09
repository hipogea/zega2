<?php
/* @var $this ValoracionController */
/* @var $model Catvaloracion */

$this->breadcrumbs=array(
	'Catvaloracions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catvaloracion', 'url'=>array('index')),
	array('label'=>'Manage Catvaloracion', 'url'=>array('admin')),
);
?>

<h1>Create Catvaloracion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>