<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */

$this->breadcrumbs=array(
	'Impuestosdocus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Impuestosdocu', 'url'=>array('index')),
	array('label'=>'Manage Impuestosdocu', 'url'=>array('admin')),
);
?>

<h1>Create Impuestosdocu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>