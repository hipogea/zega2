<?php
/* @var $this OperaPlanesController */
/* @var $model OperaPlanes */

$this->breadcrumbs=array(
	'Opera Planes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OperaPlanes', 'url'=>array('index')),
	array('label'=>'Create OperaPlanes', 'url'=>array('create')),
	array('label'=>'View OperaPlanes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OperaPlanes', 'url'=>array('admin')),
);
?>

<h1>Usted no  pertenece a esta seccion <?php echo $model->id; ?></h1>

