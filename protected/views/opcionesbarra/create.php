<?php
/* @var $this OpcionesbarraController */
/* @var $model Opcionesbarra */

$this->breadcrumbs=array(
	'Opcionesbarras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opcionesbarra', 'url'=>array('index')),
	array('label'=>'Manage Opcionesbarra', 'url'=>array('admin')),
);
?>

<h1>Create Opcionesbarra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>