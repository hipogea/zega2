<?php
/* @var $this SolcotController */
/* @var $model Solcot */

$this->breadcrumbs=array(
	'Solcots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Solcot', 'url'=>array('index')),
	array('label'=>'Manage Solcot', 'url'=>array('admin')),
);
?>

<h1>Create Solcot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>