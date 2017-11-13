<?php
/* @var $this OperaPlanesController */
/* @var $model OperaPlanes */

$this->breadcrumbs=array(
	'Opera Planes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OperaPlanes', 'url'=>array('index')),
	array('label'=>'Manage OperaPlanes', 'url'=>array('admin')),
);
?>

<h1>Create OperaPlanes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>