<?php
/* @var $this SolcotController */
/* @var $model Solcot */

$this->breadcrumbs=array(
	'Solcots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Solcot', 'url'=>array('index')),
	array('label'=>'Create Solcot', 'url'=>array('create')),
	array('label'=>'Update Solcot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Solcot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solcot', 'url'=>array('admin')),
);
?>

<h1>View Solcot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codpro',
		'idcontacto',
		'numero',
		'fecha',
		'vigencia',
		'codmon',
		'codocu',
		'codestado',
		'iduser',
		'descripcion',
		'indicaciones',
		'id',
	),
)); ?>
