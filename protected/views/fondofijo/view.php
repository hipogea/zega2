<?php
/* @var $this FondofijoController */
/* @var $model Fondofijo */

$this->breadcrumbs=array(
	'Fondofijos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Fondofijo', 'url'=>array('index')),
	array('label'=>'Create Fondofijo', 'url'=>array('create')),
	array('label'=>'Update Fondofijo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fondofijo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fondofijo', 'url'=>array('admin')),
);
?>

<h1>View Fondofijo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'desfondo',
		'codtra',
		'codcen',
		'iduser',
		'fondo',
		'codmon',
		'numerodias',
		'gastomax',
		'rojo',
		'naranja',
		'azul',
	),
)); ?>
