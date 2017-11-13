<?php
/* @var $this RegimenController */
/* @var $model Regimen */

$this->breadcrumbs=array(
	'Regimens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Regimen', 'url'=>array('index')),
	array('label'=>'Manage Regimen', 'url'=>array('admin')),
);
?>

<h1>Create Regimen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>