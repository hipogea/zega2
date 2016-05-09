<?php
/* @var $this SolcotizacionController */
/* @var $model Solcotizacion */

$this->breadcrumbs=array(
	'Solcotizacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Solcotizacion', 'url'=>array('index')),
	array('label'=>'Create Solcotizacion', 'url'=>array('create')),
	array('label'=>'Update Solcotizacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Solcotizacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solcotizacion', 'url'=>array('admin')),
);
?>

<h1>View Solcotizacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidesolpe',
		'codpro',
		'preciounit',
		'dispo',
		'iduser',
		'fechacrea',
		'codmon',
		'um',
		'comentario',
		'frespuesta',
	),
)); ?>
