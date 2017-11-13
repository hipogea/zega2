<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */

$this->breadcrumbs=array(
	'Libroobras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Libroobra', 'url'=>array('index')),
	array('label'=>'Manage Libroobra', 'url'=>array('admin')),
);
?>

<h1>Create Libroobra</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>