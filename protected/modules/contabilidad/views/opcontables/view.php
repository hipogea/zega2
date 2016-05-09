<?php
/* @var $this OpcontablesController */
/* @var $model Opcontables */

$this->breadcrumbs=array(
	'Opcontables'=>array('index'),
	$model->codop,
);

$this->menu=array(
	array('label'=>'List Opcontables', 'url'=>array('index')),
	array('label'=>'Create Opcontables', 'url'=>array('create')),
	array('label'=>'Update Opcontables', 'url'=>array('update', 'id'=>$model->codop)),
	array('label'=>'Delete Opcontables', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codop),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opcontables', 'url'=>array('admin')),
);
?>

<h1>View Opcontables #<?php echo $model->codop; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codop',
		'desop',
		'hcodmov',
		'texto',
	),
)); ?>
