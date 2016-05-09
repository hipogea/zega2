<?php
/* @var $this OperacionesbarraController */
/* @var $model Operacionesbarra */

$this->breadcrumbs=array(
	'Operacionesbarras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Operacionesbarra', 'url'=>array('index')),
	array('label'=>'Create Operacionesbarra', 'url'=>array('create')),
	array('label'=>'Update Operacionesbarra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Operacionesbarra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Operacionesbarra', 'url'=>array('admin')),
);
?>

<h1>View Operacionesbarra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nameop',
		'action',
		'paramid',
	),
)); ?>
