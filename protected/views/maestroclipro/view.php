<?php
/* @var $this MaestrocliproController */
/* @var $model Maestroclipro */

$this->breadcrumbs=array(
	'Maestroclipros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Maestroclipro', 'url'=>array('index')),
	array('label'=>'Create Maestroclipro', 'url'=>array('create')),
	array('label'=>'Update Maestroclipro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Maestroclipro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Maestroclipro', 'url'=>array('admin')),
);
?>

<h1>View Maestroclipro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codart',
		'codpro',
		'codmon',
		'precio',
	),
)); ?>
