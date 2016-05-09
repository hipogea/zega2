<?php
/* @var $this DespachoController */
/* @var $model Despacho */

$this->breadcrumbs=array(
	'Despachos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Despacho', 'url'=>array('index')),
	array('label'=>'Create Despacho', 'url'=>array('create')),
	array('label'=>'Update Despacho', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Despacho', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Despacho', 'url'=>array('admin')),
);
?>

<h1>View Despacho #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidpunto',
		'hidkardex',
		'fechacreac',
		'fechaprog',
		'descripcion',
		'responsable',
		'iduser',
		'vigente',
	),
)); ?>
