<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */

$this->breadcrumbs=array(
	'Pescaterceroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Pescaterceros', 'url'=>array('index')),
	array('label'=>'Create Pescaterceros', 'url'=>array('create')),
	array('label'=>'Update Pescaterceros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Pescaterceros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pescaterceros', 'url'=>array('admin')),
);
?>

<h1>View Pescaterceros #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codplanta',
		'pesca',
		'numeroep',
		'fecha',
		'factor',
	),
)); ?>
