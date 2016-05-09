<?php
/* @var $this CarteresController */
/* @var $model Carteres */

$this->breadcrumbs=array(
	'Carteres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Carteres', 'url'=>array('index')),
	array('label'=>'Create Carteres', 'url'=>array('create')),
	array('label'=>'Update Carteres', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Carteres', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carteres', 'url'=>array('admin')),
);
?>

<h1>View Carteres #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idequipo',
		'capacidad',
		'tipoaceite',
		'horascambio',
		'tipocarter',
		'haceite',
		'hmuestra',
		'nummuestras',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'fulectura',
		'fumuestra',
		'fucambio',
		'horometro',
		'codigo',
		'activo',
		'hucambio',
		'casco',
	),
)); ?>
