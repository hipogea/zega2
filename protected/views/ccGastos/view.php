<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */

$this->breadcrumbs=array(
	'Cc Gastoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CcGastos', 'url'=>array('index')),
	array('label'=>'Create CcGastos', 'url'=>array('create')),
	array('label'=>'Update CcGastos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CcGastos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CcGastos', 'url'=>array('admin')),
);
?>

<h1>View CcGastos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ceco',
		'fechacontable',
		'monto',
		'codmoneda',
		'usuario',
		'idref',
		'tipo',
		'creadoel',
		'ano',
		'mes',
		'clasecolector',
		'iduser',
	),
)); ?>
