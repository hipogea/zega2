<?php
/* @var $this OpcionesbarraController */
/* @var $model Opcionesbarra */

$this->breadcrumbs=array(
	'Opcionesbarras'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opcionesbarra', 'url'=>array('index')),
	array('label'=>'Create Opcionesbarra', 'url'=>array('create')),
	array('label'=>'View Opcionesbarra', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Opcionesbarra', 'url'=>array('admin')),
);
?>

<h1>Update Opcionesbarra <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>