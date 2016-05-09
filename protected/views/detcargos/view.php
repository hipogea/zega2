<?php
/* @var $this DetcargosController */
/* @var $model Detcargos */

$this->breadcrumbs=array(
	'Detcargoses'=>array('index'),
	$model->iddetcargo,
);

$this->menu=array(
	array('label'=>'List Detcargos', 'url'=>array('index')),
	array('label'=>'Create Detcargos', 'url'=>array('create')),
	array('label'=>'Update Detcargos', 'url'=>array('update', 'id'=>$model->iddetcargo)),
	array('label'=>'Delete Detcargos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->iddetcargo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Detcargos', 'url'=>array('admin')),
);
?>

<h1>View Detcargos #<?php echo $model->iddetcargo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'hidcargo',
		'coditem',
		'codmaterial',
		'm_detcargo',
		'c_esdetcargo',
		'iddetcargo',
		'descrip',
		'coddocudetallecargo',
		'cantcargo',
		'esactivo',
		'esusado',
		'umedida',
	),
)); ?>
