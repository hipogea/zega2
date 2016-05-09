<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */

$this->breadcrumbs=array(
	'Reportepescas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reportepesca', 'url'=>array('index')),
	array('label'=>'Create Reportepesca', 'url'=>array('create')),
	array('label'=>'Update Reportepesca', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reportepesca', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reportepesca', 'url'=>array('admin')),
);
?>

<h1>View Reportepesca #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codep',
		'id',
		'semana',
		'fecha',
		'harribo',
		'hzarpe',
		'codplantadestino',
		'codplantazarpe',
		'declarada',
		'descargada',
		'd2',
		'codzarpe',
	),
)); ?>
