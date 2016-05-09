<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ot', 'url'=>array('index')),
	array('label'=>'Manage Ot', 'url'=>array('admin')),
);
?>

<h1>Create Ot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>