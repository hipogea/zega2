<?php
/* @var $this MaestrosolicitudesController */
/* @var $model Maestrosolicitudes */

$this->breadcrumbs=array(
	'Maestrosolicitudes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Maestrosolicitudes', 'url'=>array('index')),
	array('label'=>'Create Maestrosolicitudes', 'url'=>array('create')),
	array('label'=>'Update Maestrosolicitudes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Maestrosolicitudes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Maestrosolicitudes', 'url'=>array('admin')),
);
?>

<h1>View Maestrosolicitudes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcioncorta',
		'marca',
		'modelo',
		'numeroparte',
		'descripcion',
		'um',
		'codclase',
		'codgrupo',
		'codsector',
		'textolargo',
		'codigoestado',
		'codigodoc',
		'codigocreado',
		'descripcionfinal',
	),
)); ?>
