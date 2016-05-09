<?php
/* @var $this PeriodosController */
/* @var $model Periodos */

$this->breadcrumbs=array(
	'Periodoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Periodos', 'url'=>array('index')),
	array('label'=>'Create Periodos', 'url'=>array('create')),
	array('label'=>'Update Periodos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Periodos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Periodos', 'url'=>array('admin')),
);
?>

<h1>View Periodos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'mes',
		'anno',
		'inicio',
		'final',
		'activo',
		'toleranciaatras',
		'toleranciadelante',
	),
)); ?>
