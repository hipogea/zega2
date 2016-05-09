<?php
/* @var $this TrabajadoresController */
/* @var $model Trabajadores */

$this->breadcrumbs=array(
	'Trabajadores'=>array('index'),
	$model->codigotra,
);

$this->menu=array(
	array('label'=>'List Trabajadores', 'url'=>array('index')),
	array('label'=>'Create Trabajadores', 'url'=>array('create')),
	array('label'=>'Update Trabajadores', 'url'=>array('update', 'id'=>$model->codigotra)),
	array('label'=>'Delete Trabajadores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigotra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Trabajadores', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->codigotra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigotra',
		'ap',
		'am',
		'nombres',
		'dni',
		'codpuesto',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
