<?php
/* @var $this CanalesController */
/* @var $model Canales */

$this->breadcrumbs=array(
	'Canales'=>array('index'),
	$model->codcanal,
);

$this->menu=array(
	array('label'=>'List Canales', 'url'=>array('index')),
	array('label'=>'Create Canales', 'url'=>array('create')),
	array('label'=>'Update Canales', 'url'=>array('update', 'id'=>$model->codcanal)),
	array('label'=>'Delete Canales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codcanal),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Canales', 'url'=>array('admin')),
);
?>

<h1>View Canales #<?php echo $model->codcanal; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codcanal',
		'canal',
	),
)); ?>
