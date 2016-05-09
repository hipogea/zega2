<?php
/* @var $this OpcionesbarraController */
/* @var $model Opcionesbarra */

$this->breadcrumbs=array(
	'Opcionesbarras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Opcionesbarra', 'url'=>array('index')),
	array('label'=>'Create Opcionesbarra', 'url'=>array('create')),
	array('label'=>'Update Opcionesbarra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Opcionesbarra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opcionesbarra', 'url'=>array('admin')),
);
?>

<h1>View Opcionesbarra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idope',
		'codocu',
		'codestado',
		'activo',
	),
)); ?>
