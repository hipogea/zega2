<?php
/* @var $this MaestroserviciosController */
/* @var $model Maestroservicios */

$this->breadcrumbs=array(
	'Maestroservicioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Maestroservicios', 'url'=>array('index')),
	array('label'=>'Create Maestroservicios', 'url'=>array('create')),
	array('label'=>'Update Maestroservicios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Maestroservicios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Maestroservicios', 'url'=>array('admin')),
);
?>

<h1>View Maestroservicios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codserv',
		'catval',
		'DECRIPCION',
		'descripcion',
	),
)); ?>
