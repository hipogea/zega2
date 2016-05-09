<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */

$this->breadcrumbs=array(
	'Temporadases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Temporadas', 'url'=>array('index')),
	array('label'=>'Create Temporadas', 'url'=>array('create')),
	array('label'=>'Update Temporadas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Temporadas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Temporadas', 'url'=>array('admin')),
);
?>

<h1>View Temporadas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'destemporada',
		'inicio',
		'termino',
		'cuota_anchoveta',
		'cuota_jurel',
		'cuota_global_anchoveta',
		'zonalitoral',
	),
)); ?>
