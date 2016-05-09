<?php
/* @var $this MaestroValoresController */
/* @var $model MaestroValores */

$this->breadcrumbs=array(
	'Maestro Valores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaestroValores', 'url'=>array('index')),
	array('label'=>'Create MaestroValores', 'url'=>array('create')),
	array('label'=>'Update MaestroValores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MaestroValores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaestroValores', 'url'=>array('admin')),
);
?>

<h1>View MaestroValores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombrevalor',
		'hidat',
		'abreviatura',
		'texto',
		'respaldo1',
		'respaldo2',
		'respaldo3',
	),
)); ?>
