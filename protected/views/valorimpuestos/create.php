<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */

$this->breadcrumbs=array(
	'Valorimpuestoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Valorimpuestos', 'url'=>array('index')),
	array('label'=>'Manage Valorimpuestos', 'url'=>array('admin')),
);
?>

<h1>Create Valorimpuestos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>