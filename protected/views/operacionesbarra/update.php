<?php
/* @var $this OperacionesbarraController */
/* @var $model Operacionesbarra */

$this->breadcrumbs=array(
	'Operacionesbarras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Operacionesbarra', 'url'=>array('index')),
	array('label'=>'Create Operacionesbarra', 'url'=>array('create')),
	array('label'=>'View Operacionesbarra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Operacionesbarra', 'url'=>array('admin')),
);
?>

<h1>Update Operacionesbarra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>