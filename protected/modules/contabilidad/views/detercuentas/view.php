<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */

$this->breadcrumbs=array(
	'Detercuentases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Detercuentas', 'url'=>array('index')),
	array('label'=>'Create Detercuentas', 'url'=>array('create')),
	array('label'=>'Update Detercuentas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Detercuentas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Detercuentas', 'url'=>array('admin')),
);
?>

<h1>View Detercuentas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codcatval',
		'codop',
		'cuentadebe',
		'cuentahaber',
		'hcodmov',
	),
)); ?>
