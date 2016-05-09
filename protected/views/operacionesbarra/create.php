<?php
/* @var $this OperacionesbarraController */
/* @var $model Operacionesbarra */

$this->breadcrumbs=array(
	'Operacionesbarras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Operacionesbarra', 'url'=>array('index')),
	array('label'=>'Manage Operacionesbarra', 'url'=>array('admin')),
);
?>

<h1>Create Operacionesbarra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>