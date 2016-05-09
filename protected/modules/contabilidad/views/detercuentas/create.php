<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */

$this->breadcrumbs=array(
	'Detercuentases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Detercuentas', 'url'=>array('index')),
	array('label'=>'Manage Detercuentas', 'url'=>array('admin')),
);
?>

<h1>Create Detercuentas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>