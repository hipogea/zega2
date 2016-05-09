<?php
/* @var $this AlreservaController */
/* @var $model Alreserva */

$this->breadcrumbs=array(
	'Alreservas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alreserva', 'url'=>array('index')),
	array('label'=>'Create Alreserva', 'url'=>array('create')),
	array('label'=>'Update Alreserva', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alreserva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alreserva', 'url'=>array('admin')),
);
?>

<h1>View Alreserva #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidesolpe',
		'estadoreserva',
		'fechares',
		'usuario',
		'cant',
		'codocu',
		'numreserva',
		'flag',
	),
)); ?>
