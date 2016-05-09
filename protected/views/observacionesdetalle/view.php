<?php
/* @var $this ObservacionesdetalleController */
/* @var $model Observacionesdetalle */

$this->breadcrumbs=array(
	'Observacionesdetalles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Observacionesdetalle', 'url'=>array('index')),
	array('label'=>'Create Observacionesdetalle', 'url'=>array('create')),
	array('label'=>'Update Observacionesdetalle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Observacionesdetalle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Observacionesdetalle', 'url'=>array('admin')),
);
?>

<h1>View Observacionesdetalle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidobservaciones',
		'comentario',
		'usuario',
		'fecha',
	),
)); ?>
