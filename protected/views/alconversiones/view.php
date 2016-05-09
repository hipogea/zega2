<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */

$this->breadcrumbs=array(
	'Alconversiones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alconversiones', 'url'=>array('index')),
	array('label'=>'Create Alconversiones', 'url'=>array('create')),
	array('label'=>'Update Alconversiones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alconversiones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alconversiones', 'url'=>array('admin')),
);
?>

<h1>View Alconversiones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'um1',
		'um2',
		'numerador',
		'denominador',
		'codart',
	),
)); ?>
