<?php
/* @var $this PuntodespachoController */
/* @var $model Puntodespacho */

$this->breadcrumbs=array(
	'Puntodespachos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Puntodespacho', 'url'=>array('index')),
	array('label'=>'Create Puntodespacho', 'url'=>array('create')),
	array('label'=>'Update Puntodespacho', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Puntodespacho', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Puntodespacho', 'url'=>array('admin')),
);
?>

<h1>View Puntodespacho #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hcodcanal',
		'nombrepunto',
		'pesaje',
		'codcen',
		'maxhorasespera',
	),
)); ?>
