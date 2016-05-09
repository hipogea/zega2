<?php
/* @var $this LoginventarioController */
/* @var $model Loginventario */

$this->breadcrumbs=array(
	'Loginventarios'=>array('index'),
	$model->idlog,
);

$this->menu=array(
	array('label'=>'List Loginventario', 'url'=>array('index')),
	array('label'=>'Create Loginventario', 'url'=>array('create')),
	array('label'=>'Update Loginventario', 'url'=>array('update', 'id'=>$model->idlog)),
	array('label'=>'Delete Loginventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idlog),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Loginventario', 'url'=>array('admin')),
);
?>

<h1>View Loginventario #<?php echo $model->idlog; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idlog',
		'hidinventario',
		'c_estado',
		'codep',
		'comentario',
		'fecha',
		'coddocu',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codlugar',
		'codigopadre',
		'numerodocumento',
		'adicional',
		'codestado',
		'codepanterior',
		'codlugarant',
		'iddocu',
	),
)); ?>
