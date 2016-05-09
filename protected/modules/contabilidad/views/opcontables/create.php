<?php
/* @var $this OpcontablesController */
/* @var $model Opcontables */

$this->breadcrumbs=array(
	'Opcontables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opcontables', 'url'=>array('index')),
	array('label'=>'Manage Opcontables', 'url'=>array('admin')),
);
?>

<h1>Create Opcontables</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>