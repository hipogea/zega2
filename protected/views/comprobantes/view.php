<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Comprobantes', 'url'=>array('index')),
	array('label'=>'Create Comprobantes', 'url'=>array('create')),
	array('label'=>'Update Comprobantes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Comprobantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comprobantes', 'url'=>array('admin')),
);
?>

<h1>View Comprobantes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'femision',
		'fvencimiento',
		'tipo',
		'serie',
		'numero',
		'tipodocid',
		'numdocid',
		'razon',
		'monto',
		'codmon',
		'flag',
		'iduser',
		'esservicio',
		'internacional',
	),
)); ?>
