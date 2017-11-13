<?php
/* @var $this DailyworkController */
/* @var $model Dailywork */

$this->breadcrumbs=array(
	'Dailyworks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dailywork', 'url'=>array('index')),
	array('label'=>'Create Dailywork', 'url'=>array('create')),
	array('label'=>'Update Dailywork', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dailywork', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dailywork', 'url'=>array('admin')),
);
?>

<h1>View Dailywork #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codresponsable',
		'fecha',
		'codturno',
		'horacierre',
		'codproyecto',
		'codocu',
		'codestado',
	),
)); ?>
