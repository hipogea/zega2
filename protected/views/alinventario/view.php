<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */

$this->breadcrumbs=array(
	'Alinventarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Create Alinventario', 'url'=>array('create')),
	array('label'=>'Update Alinventario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alinventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alinventario', 'url'=>array('admin')),
);
?>

<h1>View Alinventario #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codalm',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'fechainicio',
		'fechafin',
		'periodocontable',
		'codresponsable',
		'id',
		'codart',
		'codcen',
		'um',
		'cantlibre',
		'canttran',
		'cantres',
		'ubicacion',
		'lote',
		'siid',
		'ssiduser',
	),
)); ?>
