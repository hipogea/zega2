<?php
/* @var $this RegimenController */
/* @var $model Regimen */

$this->breadcrumbs=array(
	'Regimens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Regimen', 'url'=>array('index')),
	array('label'=>'Create Regimen', 'url'=>array('create')),
	array('label'=>'Update Regimen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Regimen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Regimen', 'url'=>array('admin')),
);
?>

<h1>View Regimen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'desregimen',
		'dias',
		'porcextras',
		'porcdom',
		'porcfer',
		'horasdia',
		'facdominical',
		'frecpago',
		'turno',
		'acumuladomingo',
		'tarifamensual',
	),
)); ?>
