<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */

$this->breadcrumbs=array(
	'Cajachicas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cajachica', 'url'=>array('index')),
	array('label'=>'Create Cajachica', 'url'=>array('create')),
	array('label'=>'Update Cajachica', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cajachica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cajachica', 'url'=>array('admin')),
);
?>

<h1>View Cajachica #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidperiodo',
		'fechaini',
		'fechafin',
		'codtra',
		'codcen',
		'iduser',
	),
)); ?>
